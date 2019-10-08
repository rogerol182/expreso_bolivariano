<?php


namespace Drupal\expreso_bolivariano_forms\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

// Use for Ajax.
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

/**
 * Form GPS Build
 * @author Roger Rodriguez
 */
class GpsForm extends FormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'gps_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['documentGps'] = [
            '#type'     => 'textfield',
            '#title'    => $this->t('Documento o Cédula'),
            'description' => $this->t('Documento o Cédula'),
            '#maxlength' => 11,
            '#minlength' => 4,
        ];
        $form['ticketGps'] = [
            '#type'          => 'textfield',
            '#title'         => $this->t('Número Tiquete'),
            'description' => $this->t('Número Tiquete'),
            '#minlength' => 7,
            '#maxlength' => 13,
        ];  
        $form['actions'] = [
          '#type' => 'actions',
        ];  
        $form['submit'] = [
            '#type'  => 'submit',
            '#value' => $this->t('Consultar'),
            '#ajax' => [
                'callback' => '::setMessage',
            ], 
        ];
        // Placeholder to put the result of Ajax call, setMessage().
        $form['message'] = [
            '#type' => 'markup',
            '#markup' => '<div class="result_message"></div>',
        ];
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        parent::validateForm($form, $form_state);
        if(!is_numeric($form_state->getValue('documentGps')))
        {
          $form_state->setErrorByName('documentGps', t('Documento o Cédula debe ser solo numeros', ['%documentGps' => $form_state->getValue('documentGps')]));
        }
        if(!is_numeric($form_state->getValue('ticketGps')))
        {
          $form_state->setErrorByName('ticketGps', t('Número de Tiquete debe ser solo numeros', ['%ticketGps' => $form_state->getValue('ticketGps')]));
        }
    } 
    
     public function setMessage(array $form, FormStateInterface $form_state) {
        $response = new AjaxResponse();
        if(trim($form_state->getValue('documentGps'))=='')
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message',
                '<div class="my_message">Documento o Cédula debe ser solo numeros.</div>')
            );
        }
        else if(trim($form_state->getValue('ticketGps'))=='')
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message',
                '<div class="my_message">Número de Tiquete debe ser solo numeros</div>')
            );
        }
        else if(!is_numeric($form_state->getValue('documentGps')))
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message',
                '<div class="my_message">Documento o Cédula debe ser solo numeros.</div>')
            );
        }
        else if(!is_numeric($form_state->getValue('ticketGps')))
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message',
                '<div class="my_message">Número de Tiquete debe ser solo numeros</div>')
            );
        }
        else
        {
            $field = $form_state->getValues();
            $document = (integer) $field['documentGps'];
            $ticket = (integer) $field['ticketGps'];
            
            $validate = \Drupal::service('expreso_bolivariano_services.custom');
            $responseToken = $validate->getToken();
            if($responseToken['statusName']=='OK')
            {
                $tokenId = $responseToken['data']['token'];
                $dateExpires = $responseToken['data']['expires'];
            }
            $responseVehicle = $validate->getTicketPlate($tokenId,$ticket,$document);
            if($responseVehicle['statusName']=='OK')
            {
                //get the Plate
                $vehicle = $responseVehicle['data']['vehicle'];
                //Connect to the SOAP Client in Wizens
                $soapclient = new \SoapClient('http://naviwebsvc.cloudapp.net/NaviMonitoringService.svc?wsdl');
                //First Get the Token
                $params = array('userName' => 'ebolweb', 'password' => 'ew2b0l1no4cf*');
                $responseTokenWizens = $soapclient->Authenticate($params);
                $token = $responseTokenWizens->AuthenticateResult;
                //Then Get the Location
                $paramsGeolocation = array('vehicleName' => $vehicle, 'userName' => 'ebolweb', 'userToken' => $token);
                $responseGeolocation = $soapclient->GetVehicleInfoDetail($paramsGeolocation);
                //get the data to draw the Map
                $latitude = $responseGeolocation->GetVehicleInfoDetailResult->latitude;
                $longitude = $responseGeolocation->GetVehicleInfoDetailResult->longitude;
                $address = $responseGeolocation->GetVehicleInfoDetailResult->address;
                $plate = $responseGeolocation->GetVehicleInfoDetailResult->plate;
                $companyId = (integer) $responseGeolocation->GetVehicleInfoDetailResult->companyId;
                //get the data for the marker
                $responseTicket = $validate->getQueryTicket($tokenId,$companyId,$document,$ticket);
                if($responseTicket['statusName']=='OK')
                {
                    $clientName = $responseTicket['data']['clientName'];
                    $clientLastName = $responseTicket['data']['clientLastName'];
                }
                global $base_url;
                $theme = \Drupal::theme()->getActiveTheme();
                $host = $base_url.'/'. $theme->getPath();
                $content = '<div class="row" style="margin-left: 0; margin-right: 0;"><div class="col-md-2 text-right" style="padding: 0;"><img src="'.$host.'/images/misc/map-icon-info.svg" style="width: 70%;"></div><div class="col-md-10 text-center" style="padding: 0;"><span style="color: #1B1464; font-size: 15px;"><strong>Placa:</strong> '.$plate.'</span><br><span style="color: #1B1464; font-size: 15px;"><strong>Cliente:</strong> '.$clientName.' '.$clientLastName.' </span><br><span style="color: #1B1464; font-size: 15px;"><strong>Cliente:</strong> '.$address.'</span><br></div></div>';

                $html = "<div id='map' class='map_route' style='height: 400px;''></div>
                        <script>
                      var map;
                      function initMap() {
                        var myLatlng = new google.maps.LatLng(".$latitude.",".$longitude.");
                      // The map, centered at Uluru
                        var map = new google.maps.Map(document.getElementById('map'), {zoom: 15, center: myLatlng, disableDefaultUI: true});
                      // The marker, positioned at Uluru
                        var marker = new google.maps.Marker({position: myLatlng, map: map, icon: '".$host."/images/misc/pin_map.png'});
                      // The InfoWindow
                      var infowindow = new google.maps.InfoWindow({ content: '".$content."' });  
                      marker.addListener('click', function() { infowindow.open(map, marker); });
                    }
                </script>
                <!-- Replace the value of the key parameter with your own API key. -->
                <script async defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAyWmzmaeGyLXQpJmbE_oUHxSwOxdS1Xtk&callback=initMap'>
                </script>";

                $response->addCommand(
                new HtmlCommand(
                    '.result_message',
                    '<div class="my_message">'.$html.'</div>')
                );
            }
            else
            {
                $response->addCommand(
                new HtmlCommand(
                    '.result_message',
                    '<div class="my_message">No existen Datos.</div>')
                );
            }
        }
        return $response;   
    }
    /**
    * Implements a form submit handler.
    */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        
    }
    /**
     * {@inheritdoc}
     
    public function submitForm(array &$form, FormStateInterface $form_state) {
        
        $field = $form_state->getValues();
        $document = (integer) $field['documentGps'];
        $ticket = (integer) $field['ticketGps'];
        
        $validate = \Drupal::service('expreso_bolivariano_services.custom');
        $response = $validate->getToken();
        if($response['statusName']=='OK')
        {
            $tokenId = $response['data']['token'];
            $dateExpires = $response['data']['expires'];
        }
        $responseVehicle = $validate->getTicketPlate($tokenId,$ticket,$document);
        if($responseVehicle['statusName']=='OK')
        {
            $vehicle = $responseVehicle['data']['vehicle'];
            //Connect to the SOAP Client in Wizens
            $soapclient = new \SoapClient('http://naviwebsvc.cloudapp.net/NaviMonitoringService.svc?wsdl');
            //First Get the Token
            $params = array('userName' => 'ebolweb', 'password' => 'ew2b0l1no4cf*');
            $responseToken = $soapclient->Authenticate($params);
            $token = $responseToken->AuthenticateResult;
            //Then Get the Location
            $paramsGeolocation = array('vehicleName' => $vehicle, 'userName' => 'ebolweb', 'userToken' => $token);
            $responseGeolocation = $soapclient->GetVehicleInfoDetail($paramsGeolocation);
            var_dump($responseGeolocation);
        }
        else
        {
            \Drupal::messenger()->addStatus(t('No existen datos.'));
        }
    }*/
}  