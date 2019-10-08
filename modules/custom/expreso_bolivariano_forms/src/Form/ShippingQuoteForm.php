<?php


namespace Drupal\expreso_bolivariano_forms\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

// Use for Ajax.
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

/**
 * Form Shipping Quote Build
 * @author Roger Rodriguez
 */
class ShippingQuoteForm extends FormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'shipping_quote_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        

        $form['areaShipping'] = [
          '#type' => 'select',
          '#title' => $this->t('Cobertura'),
          '#options' => [
            '1' => $this->t('Regional'),
            '2' => $this->t('Nacional'),
            '3' => $this->t('Trayectos Especiales'),
          ],
        ];
        $form['weigthShipping'] = [
            '#type'     => 'textfield',
            '#title'    => $this->t('Peso en Kilos'),
            'description' => $this->t('Peso en Kilos'),
            '#maxlength' => 5,
            '#minlength' => 1,
        ];
        $form['highShipping'] = [
            '#type'     => 'textfield',
            '#title'    => $this->t('Alto en Cms'),
            'description' => $this->t('Alto en Cms'),
            '#maxlength' => 5,
            '#minlength' => 1,
        ];
        $form['widthShipping'] = [
            '#type'     => 'textfield',
            '#title'    => $this->t('Ancho en Cms'),
            'description' => $this->t('Ancho en Cms'),
            '#maxlength' => 5,
            '#minlength' => 1,
        ];
        $form['longShipping'] = [
            '#type'     => 'textfield',
            '#title'    => $this->t('Largo en Cms'),
            'description' => $this->t('Largo en Cms'),
            '#maxlength' => 5,
            '#minlength' => 1,
        ];
        $form['valueShipping'] = [
            '#type'     => 'textfield',
            '#title'    => $this->t('Valor Declarado'),
            'description' => $this->t('Valor Declarado'),
            '#maxlength' => 7,
            '#minlength' => 1,
        ];
        $form['actions'] = [
          '#type' => 'actions',
        ];  
        $form['submit'] = [
            '#type'  => 'submit',
            '#value' => $this->t('Calcular'),
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
        if(!is_numeric($form_state->getValue('weigthShipping')))
        {
          $form_state->setErrorByName('weigthShipping', t('Peso debe ser solo numeros', ['%weigthShipping' => $form_state->getValue('weigthShipping')]));
        }
        if(!is_numeric($form_state->getValue('highShipping')))
        {
          $form_state->setErrorByName('highShipping', t('Alto debe ser solo numeros', ['%highShipping' => $form_state->getValue('highShipping')]));
        }
        if(!is_numeric($form_state->getValue('widthShipping')))
        {
          $form_state->setErrorByName('widthShipping', t('Largo debe ser solo numeros', ['%widthShipping' => $form_state->getValue('widthShipping')]));
        }
        if(!is_numeric($form_state->getValue('longShipping')))
        {
          $form_state->setErrorByName('longShipping', t('Ancho debe ser solo numeros', ['%longShipping' => $form_state->getValue('weigthShipping')]));
        }
        if(!is_numeric($form_state->getValue('valueShipping')))
        {
          $form_state->setErrorByName('valueShipping', t('Ancho debe ser solo numeros', ['%valueShipping' => $form_state->getValue('valueShipping')]));
        }
    } 
    
     public function setMessage(array $form, FormStateInterface $form_state) {
        $response = new AjaxResponse();
        if(trim($form_state->getValue('weigthShipping'))=='')
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message',
                '<div class="my_message">Peso debe ser solo numeros.</div>')
            );
        }
        else if(trim($form_state->getValue('highShipping'))=='')
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message',
                '<div class="my_message">Alto debe ser solo numeros</div>')
            );
        }
        else if(trim($form_state->getValue('widthShipping'))=='')
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message',
                '<div class="my_message">Ancho debe ser solo numeros</div>')
            );
        }
        else if(trim($form_state->getValue('longShipping'))=='')
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message',
                '<div class="my_message">Largo debe ser solo numeros</div>')
            );
        }
        else if(trim($form_state->getValue('valueShipping'))=='')
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message',
                '<div class="my_message">Valor Declarado debe ser solo numeros</div>')
            );
        }
        else if(!is_numeric($form_state->getValue('weigthShipping')))
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message',
                '<div class="my_message">Peso debe ser solo numeros.</div>')
            );
        }
        else if(!is_numeric($form_state->getValue('highShipping')))
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message',
                '<div class="my_message">Alto debe ser solo numeros</div>')
            );
        }
        else if(!is_numeric($form_state->getValue('widthShipping')))
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message',
                '<div class="my_message">Ancho debe ser solo numeros</div>')
            );
        }
        else if(!is_numeric($form_state->getValue('longShipping')))
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message',
                '<div class="my_message">Largo debe ser solo numeros</div>')
            );
        }
        else if(!is_numeric($form_state->getValue('valueShipping')))
        {
          $response->addCommand(
            new HtmlCommand(
                '.result_message',
                '<div class="my_message">Valor Declarado debe ser solo numeros</div>')
            );
        }
        else
        {
            $field = $form_state->getValues();
            $area = (integer) $field['areaShipping'];
            $weigth = (integer) $field['weigthShipping'];
            $high = (integer) $field['highShipping'];
            $width = (integer) $field['widthShipping'];
            $long = (integer) $field['longShipping'];
            $value = (integer) $field['valueShipping'];

            
            $validate = \Drupal::service('expreso_bolivariano_services.custom');
            $responseToken = $validate->getToken();
            if($responseToken['statusName']=='OK')
            {
                $tokenId = $responseToken['data']['token'];
                $dateExpires = $responseToken['data']['expires'];
            }
            $responseShippingQuote = $validate->getDeliveryRate($tokenId,$value,$weigth,$width,$high,$long,$area);
            if($responseShippingQuote['statusName']=='OK')
            {
                //get the Rate
                $rate = $responseShippingQuote['data']['deliveryRate'];
                $response->addCommand(
                new HtmlCommand(
                    '.result_message',
                    '<div class="my_message" style="text-align: center; font-weight: bolder;">El costo de su envio: $ '.number_format($rate, 0, '', '.').'</div>')
                );
            }
            else
            {
                $response->addCommand(
                new HtmlCommand(
                    '.result_message',
                    '<div class="my_message">No se puede procesar la información.</div>')
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
    */
}  