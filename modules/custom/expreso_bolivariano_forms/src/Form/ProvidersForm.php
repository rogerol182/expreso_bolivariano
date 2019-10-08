<?php


namespace Drupal\expreso_bolivariano_forms\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

// Use for Ajax.
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

/**
 * Form Provider Build
 * @author Roger Rodriguez
 */
class ProvidersForm extends FormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'providers_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['providerEnterprise'] = [
            '#type'          => 'select',
            '#title'         => $this->t('Empresa'),
            'description' => $this->t('Empresa'),
            '#required'      => TRUE,
            '#options' => array('0' => t('Seleccionar'), '1' => t('Bolivariano'), '2' => t('Continental Bus'), '3' => t('CB&S')),
            '#default_value' => '0',
        ];
        $form['providerDocument'] = [
            '#type'     => 'textfield',
            '#title'    => $this->t('Documento o Cédula'),
            'description' => $this->t('Documento o Cédula'),
            '#maxlength' => 11,
            '#minlength' => 4,
        ];
        $form['providerYear'] = [
            '#type'          => 'select',
            '#title'         => $this->t('Empresa'),
            'description' => $this->t('Empresa'),
            '#required'      => TRUE,
            '#options' => array('0' => t('Seleccionar'), /*'2020' => t('2020'),*/ '2019' => t('2019'), '2018' => t('2018'), '2017' => t('2017'), '2016' => t('2016'), '2015' => t('2015'), '2014' => t('2014')),
            '#default_value' => '0',
        ];
        $form['providerMonth'] = [
            '#type'          => 'select',
            '#title'         => $this->t('Mes Inicial'),
            'description' => $this->t('Mes Inicial'),
            '#required'      => TRUE,
            '#options' => array('0' => t('Seleccionar'), '01' => t('Enero'), '02' => t('Febrero'), '03' => t('Marzo'), '04' => t('Abril'), '05' => t('Mayo'), '06' => t('Junio'), '07' => t('Julio'), '08' => t('Agosto'), '09' => t('Septiembre'), '10' => t('Octubre'), '11' => t('Noviembre'), '12' => t('Diciembre')),
            '#default_value' => '0',
        ];
        $form['providerMonthEnd'] = [
            '#type'          => 'select',
            '#title'         => $this->t('Mes Final'),
            'description' => $this->t('Mes Final'),
            '#required'      => TRUE,
            '#options' => array('0' => t('Seleccionar'), '01' => t('Enero'), '02' => t('Febrero'), '03' => t('Marzo'), '04' => t('Abril'), '05' => t('Mayo'), '06' => t('Junio'), '07' => t('Julio'), '08' => t('Agosto'), '09' => t('Septiembre'), '10' => t('Octubre'), '11' => t('Noviembre'), '12' => t('Diciembre')),
            '#default_value' => '0',
        ];
        $form['providerType'] = [
            '#type'          => 'select',
            '#title'         => $this->t('Tipo de Certificado'),
            'description' => $this->t('Tipo de Certificado'),
            '#required'      => TRUE,
            '#options' => array('0' => t('Seleccionar'), 'R' => t('Certificado de Retención en la Fuente'), 'I' => t('Certificado de IVA'), 'C' => t('Certificado de ICA'), 'T' => t('Certificado de Timbre'), 'N' => t('Certificado de Cinematografia'), 'O' => t('Certificado de Retención y Timbre'), 'A' => t('Todas las Retenciones generadas al Proveedor')),
            '#default_value' => '0',
        ];
        $form['actions'] = [
          '#type' => 'actions',
        ];  
        $form['submit'] = [
            '#type'  => 'submit',
            '#value' => $this->t('Solicitar'),
            '#ajax' => [
                'callback' => '::setCertificateProvider',
            ], 
        ];
        // Placeholder to put the result of Ajax call, setMessage().
        $form['message'] = [
            '#type' => 'markup',
            '#markup' => '<div class="result_message_provider"></div>',
        ];
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        parent::validateForm($form, $form_state);
    } 
    
     public function setCertificateProvider(array $form, FormStateInterface $form_state) {
        $response = new AjaxResponse();

        if($form_state->getValue('providerEnterprise')=='0')
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message_provider',
                '<div class="my_message" style="text-align:center; font-size: 100%; color: #fff; ">Seleccione la empresa a la cual va a solicitar el certificado</div>')
            );
        }
        else if(trim($form_state->getValue('providerDocument'))=='')
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message_provider',
                '<div class="my_message" style="text-align:center; font-size: 100%; color: #fff; ">Ingrese el número de identificación del proveedor</div>')
            );
        }
        else if($form_state->getValue('providerYear')=='0')
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message_provider',
                '<div class="my_message" style="text-align:center; font-size: 100%; color: #fff; ">Seleccione el año del cual va a solicitar el certificado</div>')
            );
        }
        else if($form_state->getValue('providerMonth')=='0')
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message_provider',
                '<div class="my_message" style="text-align:center; font-size: 100%; color: #fff; ">Seleccione el mes inicial del cual va a solicitar el certificado</div>')
            );
        }
        else if($form_state->getValue('providerMonthEnd')=='0')
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message_provider',
                '<div class="my_message" style="text-align:center; font-size: 100%; color: #fff; ">Seleccione el mes final del cual va a solicitar el certificado</div>')
            );
        }
        else if($form_state->getValue('providerMonthEnd')<$form_state->getValue('providerMonth'))
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message_provider',
                '<div class="my_message" style="text-align:center; font-size: 100%; color: #fff; ">El mes Final debe ser mayor al mes Inicial</div>')
            );
        }
        else if($form_state->getValue('providerType')=='0')
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message_provider',
                '<div class="my_message" style="text-align:center; font-size: 100%; color: #fff; ">Seleccione el tipo de certificado que desea solicitar</div>')
            );
        }
        else
        {
            //Connect to the SOAP Client in SEVEN
            if($form_state->getValue('providerMonthEnd')<='04' && $form_state->getValue('providerYear')=='2019')
            {
                $soapclient = new \SoapClient('http://172.20.200.12/webservicesophelia/WCnCerti.asmx?wsdl');    
            }
            else
            {
                $soapclient = new \SoapClient('http://172.18.220.118/Seven/webservicesOphelia/WCnCerti.asmx?wsdl');
            }
            $company = $form_state->getValue('providerEnterprise');
            $document = $form_state->getValue('providerDocument');
            $year = $form_state->getValue('providerYear');
            $month = $form_state->getValue('providerMonth');
            $monthEnd = $form_state->getValue('providerMonthEnd');
            $type = $form_state->getValue('providerType');
            //Then Get the Certificate
            $params = array('emp_codi' => $company, 'ter_coda' => $document, 'sal_anop' => $year, 'sal_mesini' => $month, 'sal_mesfin' => $monthEnd, 'cta_tipo' => $type);
            $responseCertificate = $soapclient->GenerarCertificado($params);
            $url = $responseCertificate->GenerarCertificadoResult->urlreport;

            $link = "<a href='".$url."' target='_blank' style='color: #fff;'>Descargar Certificado de Proveedor</a>";
            //get the data to open window
           
            $response->addCommand(
            new HtmlCommand(
                '.result_message_provider',
                '<div class="my_message" style="text-align:center; font-size: 100%; color: #fff; ">Certificado Generado en el siguiente Link: '.$link.'</div>')
            );
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