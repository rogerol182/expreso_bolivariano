<?php


namespace Drupal\expreso_bolivariano_forms\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

// Use for Ajax.
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

/**
 * Form GPS Shipping Build
 * @author Roger Rodriguez
 */
class ShippingGpsForm extends FormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'shipping_gps_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        
        $form['ticketGps'] = [
            '#type'          => 'textfield',
            '#title'         => $this->t('Número Guia'),
            'description' => $this->t('Número Guia'),
            '#minlength' => 7,
            '#maxlength' => 10,
        ];  
        $form['actions'] = [
          '#type' => 'actions',
        ];  
        $form['submitTicket'] = [
            '#type'  => 'submit',
            '#value' => $this->t('Consultar'),
            '#ajax' => [
                'callback' => '::setMessagePacket',
            ], 
        ];
        // Placeholder to put the result of Ajax call, setMessage().
        $form['messagePacket'] = [
            '#type' => 'markup',
            '#markup' => '<div class="result_message_packet" style="font-size: 25px; text-align: center;">¡ Busca tus Envios Facilmente !.</div>',
        ];
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        parent::validateForm($form, $form_state);
        
        if(!is_numeric($form_state->getValue('ticketGps')))
        {
          $form_state->setErrorByName('ticketGps', t('Número de Guía debe ser solo numeros', ['%ticketGps' => $form_state->getValue('ticketGps')]));
        }
    } 
    
     public function setMessagePacket(array $form, FormStateInterface $form_state) {
        $response = new AjaxResponse();
        if(trim($form_state->getValue('ticketGps'))=='')
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message_packet',
                '<div class="my_message">Número de Guía debe ser solo numeros</div>')
            );
        }
        else if(!is_numeric($form_state->getValue('ticketGps')))
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message_packet',
                '<div class="my_message">Número de Guía debe ser solo numeros</div>')
            );
        }
        else
        {
            $field = $form_state->getValues();
            $ticket = (integer) $field['ticketGps'];
            
            $validate = \Drupal::service('expreso_bolivariano_services.custom');
            $responseToken = $validate->getToken();
            if($responseToken['statusName']=='OK')
            {
                $tokenId = $responseToken['data']['token'];
                $dateExpires = $responseToken['data']['expires'];
            }
            $responseDelivery = $validate->getDeliveryDocument($tokenId,$ticket);
            if($responseDelivery['statusName']=='OK')
            {
                //get the State
                $origin = trim(ucwords(strtolower($responseDelivery['data']['agencyOriginName'])));
                $destination = trim(ucwords(strtolower($responseDelivery['data']['agencyDestinationName'])));
                $nameSender = ucwords(strtolower($responseDelivery['data']['senderClientName']));
                $nameReceiver = ucwords(strtolower($responseDelivery['data']['addresseeClientName']));
                $addressSender = ucwords(strtolower($responseDelivery['data']['senderClientLocationAddress']));
                $addressReceiver = ucwords(strtolower($responseDelivery['data']['addresseeClientLocationAddress']));
                $state = $responseDelivery['data']['deliveryStateId'];
                if($state==1){ $classBox = 'admitida'; } if($state==2){ $classBox = 'despachada'; } if($state==3){ $classBox = 'recibida'; } if($state==4){ $classBox = 'entregada'; }
                $date = $responseDelivery['data']['deliveryDate'];
                $dateFinal = explode('T',$date);
                $dateShow = $dateFinal[0];
                $weight = $responseDelivery['data']['realWeight'];
                $unity = $responseDelivery['data']['merchandiseCount'];
                $type = ucwords(strtolower($responseDelivery['data']['merchandiseType']));
                //get the data for the box
                global $base_url;
                $theme = \Drupal::theme()->getActiveTheme();
                $host = $base_url.'/'. $theme->getPath();

                $html = "<div class='row'>
    <div class='col col-lg-6 bg-dark-blue text-orange'>
        <div><strong>ENVIA: </strong></div>
        <div><span>".$nameSender."</span></div>
        <div>Origen: <span>".$origin."</span></div>
        <div>Dirección: <span>".$addressSender."</span></div>
    </div>
    <div class='col col-lg-6 bg-dark-blue text-orange' style='text-align: right;'>
        <div><strong>RECIBE: </strong></div>
        <div><span>".$nameReceiver."</span></div>
        <div>Destino: <span>".$destination."</span></div>
        <div>Dirección: <span>".$addressReceiver."</span></div>
    </div>
</div>
<div class='row'>
    <div class='col col-lg-12 bg-dark-blue text-orange'>
        <div id='seguimiento-timeline' class='".$classBox."'>
            <hr>
            <hr>
            <div>
                <div><span>
                    <img src='".$host."/images/misc/ser-caja.png'>
                </span>ADMITIDA</div>
                <div><span>
                    <img src='".$host."/images/misc/ser-caja.png'>
                </span>DESPACHADA</div>
                <div><span>
                    <img src='".$host."/images/misc/ser-caja.png'>
                </span>RECIBIDA</div>
                <div><span>
                    <img src='".$host."/images/misc/ser-caja.png'>
                </span>ENTREGADA</div>
            </div>
        </div>
    </div>
</div>
<!-- 
    clases de acuerdo a la ubicación
    .admitida
    .despachada
    .recibida
    .entregada
    -->
<div class='row' style='padding-top:40px;'>
    <div class='col col-lg-6 bg-dark-blue text-orange'>
        <div>Radicado: <span>".$dateShow."</span></div>
        <div>Peso: <span>".$weight." Kg.</span></div>
    </div>
    <div class='col col-lg-6 bg-dark-blue text-orange' style='text-align: right;'>
        <div>Unidades: <span>".$unity."</span></div>
        <div>Texto Guía: <span>".$type."</span></div>
    </div>
</div>";

                $response->addCommand(
                new HtmlCommand(
                    '.result_message_packet',
                    '<div class="my_message">'.$html.'</div>')
                );
            }
            else
            {
                $response->addCommand(
                new HtmlCommand(
                    '.result_message_packet',
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