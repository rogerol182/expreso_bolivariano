<?php

namespace Drupal\expreso_bolivariano_forms\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

/**
 * Form Register Build
 * @author Roger Rodriguez
 */
class ChangePasswordFirstTime extends FormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'user_change_password';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['passOne'] = [
            '#type'          => 'password_confirm',
            '#title'         => $this->t('Contraseña'),
            '#placeholder'    => $this->t('Contraseña'),
            'description' => $this->t('Contraseña'),
            '#required'      => TRUE,
        ];
        
        $form['actions'] = ['#type' => 'actions'];
        $form['actions']['submit'] = ['#type' => 'submit', '#value' => $this->t('Crear Contraseña')];
        //$form['actions']['submit']['#submit'][] = '::custom_validate';
        //$form['#validate'][] = '::validatePassword';

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        if (strlen($form_state->getValue('passOne')) < 8) {
        $form_state->setErrorByName('passOne', $this->t('La Contraseña es muy corta.'));
      }
      if (strlen($form_state->getValue('passTwo')) < 8) {
        $form_state->setErrorByName('passTwo', $this->t('La Contraseña es muy corta.'));
      }
    }

    /**
     * {@inheritdoc}
     */
    public function validatePassword(array &$form, FormStateInterface $form_state) {
        echo 'Validate Pass';
        die();
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        echo "Aca";
        die();
        // Display result.
        foreach ($form_state->getValues() as $key => $value) {
            drupal_set_message($key . ': ' . $value);
        }
    }
    public function custom_validate(array &$form, FormStateInterface $form_state){
        echo "Aca2";
        die();
    }
}