<?php

namespace Drupal\expreso_bolivariano_forms\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

/**
 * Form Register Build
 * @author Roger Rodriguez
 */
class RegisterForm extends FormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'register_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['documentType'] = [
            '#type'          => 'select',
            '#title'         => $this->t('Tipo de Documento'),
            'description' => $this->t('Tipo de Documento'),
            '#required'      => TRUE,
            '#options' => array(t('Cédula de Ciudadania'), t('Cédula de Extranjeria'), t('Pasaporte')),
        ];
        $form['userName'] = [
            '#type'     => 'textfield',
            '#title'    => $this->t('Documento o Cédula'),
            'description' => $this->t('Dcoumento o Cédula'),
            '#required' => TRUE,
        ];
        $form['mailUser'] = [
            '#type'          => 'email',
            '#title'         => $this->t('Correo Electrónico'),
            'description' => $this->t('Correo Electrónico'),
            '#required'      => TRUE,
        ];  
        $form['nameUser'] = [
            '#type'          => 'textfield',
            '#title'         => $this->t('Nombres'),
            'description' => $this->t('Nombres'),
            '#required'      => TRUE,
        ];
        $form['lastnameUser'] = [
            '#type'          => 'textfield',
            '#title'         => $this->t('Apellidos'),
            'description' => $this->t('Apellidos'),
            '#required'      => TRUE,
        ];
        $form['phoneUser'] = [
            '#type'          => 'tel',
            '#title'         => $this->t('Teléfono'),
            'description' => $this->t('Teléfono'),
            '#required'      => TRUE,
        ];
        $form['birthUser'] = [
            '#type'          => 'date',
            '#title'         => $this->t('Fecha de Nacimiento'),
            'description' => $this->t('Fecha de Nacimiento'),
            '#required'      => TRUE,
        ];
        $form['genreType'] = [
            '#type'          => 'select',
            '#title'         => $this->t('Género'),
            'description' => $this->t('Género'),
            '#required'      => TRUE,
            '#options' => array(t('Femenino'), t('Masculino'), t('Otro')),
        ];
        $form['birthUser'] = [
            '#type'          => 'checkbox',
            '#title'         => $this->t('He leido y acepto los Terminos y Condiciones de Expreso Bolivariano y Viajero Expreso'),
            'description' => $this->t('He leido y acepto los Terminos y Condiciones de Expreso Bolivariano y Viajero Expreso'),
            '#required'      => TRUE,
        ];
        
        $form['submit'] = [
            '#type'  => 'submit',
            '#value' => $this->t('Crear Cuenta'),
        ];
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        if ($form_state->getValue('documentType') == '') {
            $form_state->setErrorByName('documentType', $this->t('Tipo de Documento es Obligatorio'));
        }
        if ($form_state->getValue('genreType') == '') {
            $form_state->setErrorByName('mailNewsletter', $this->t('Tipo de Género es Obligatorio'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        // Display result.
        foreach ($form_state->getValues() as $key => $value) {
            drupal_set_message($key . ': ' . $value);
        }
    }
}