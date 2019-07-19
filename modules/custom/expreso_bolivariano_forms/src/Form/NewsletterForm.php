<?php


namespace Drupal\expreso_bolivariano_forms\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

/**
 * Form Newsletter Build
 * @author Roger Rodriguez
 */
class NewsletterForm extends FormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'newsletter_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['interestingNewsletter'] = [
            '#type'          => 'select',
            '#title'         => $this->t('Interes'),
            'description' => $this->t('Interes'),
            '#required'      => TRUE,
            '#options' => array(t('Promociones'), t('Viajero Expreso'), t('Paquetes Turisticos'), t('Concursos'), t('Experiencia a Bordo')),
        ];
        $form['nameNewsletter'] = [
            '#type'     => 'textfield',
            '#title'    => $this->t('Nombre Completo'),
            'description' => $this->t('Nombre Completo'),
            '#maxlength' => 100,
            '#minlength' => 7,
            '#required' => TRUE,
        ];
        $form['mailNewsletter'] = [
            '#type'          => 'email',
            '#title'         => $this->t('Correo Electrónico'),
            'description' => $this->t('Correo Electrónico'),
            '#required'      => TRUE,
            '#maxlength' => 100,
        ];  
        $form['actions'] = [
          '#type' => 'actions',
        ];  
        $form['submit'] = [
            '#type'  => 'submit',
            '#value' => $this->t('Registrar'),
        ];
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        parent::validateForm($form, $form_state);
        $nameNewsletter = $form_state->getValue('nameNewsletter');
        if (!preg_match('/^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$/', $nameNewsletter)) {
          $form_state->setErrorByName('nameNewsletter', t('Nombre no valido.', ['%nameNewsletter' => $form_state->getValue('nameNewsletter')]));
        }
    }
    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $field = $form_state->getValues();
        $name = strtolower($field['nameNewsletter']);
        $email = strtolower($field['mailNewsletter']);
        $interest = (int) $field['interestingNewsletter'];
        /*check if the user is in the Drupal Database*/
        $connection = \Drupal::database();
        $sql = "SELECT count(id) as countValidate FROM newsletter WHERE mail = :mail";
        $result = $connection->query($sql, [':mail' => $email]);
        if($result)
        {
          while ($row = $result->fetchAssoc()) 
          {
            $countValidateN = $row['countValidate'];
          }
        }
        if($countValidateN==0)
        {
            $field  = array(
                'name'   => $name,
                'mail' =>  $email,
                'interest' => $interest,
            );
            $query = \Drupal::database();
            $query->insert('newsletter')
                  ->fields($field)
                  ->execute();
            drupal_set_message("Bienvenido a nuestro Newsletter, Espera noticias en tu correo electrónico.");
        }
        else
        {
            $field  = array(
                'name'   => $name,
                'email' =>  $email,
                'interest' => $interest,
            );
            $query = \Drupal::database();
            $query->update('newsletter')
                  ->fields($field)
                  ->condition('mail',$email)
                  ->execute();
            drupal_set_message("Ya estas inscrito en nuestro Newsletter, Espera noticias en tu correo electrónico.");
        }
        
    }
}  