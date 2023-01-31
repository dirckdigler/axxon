<?php

namespace Drupal\axxon\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Globant University Learning Match settings for this site.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'learning_match_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['axxon.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('axxon.settings');
    $form['my_textarea'] = array(
      '#title' => t('WYSIWYG editor'),
      '#type' => 'text_format',
      '#required' => TRUE,
      '#default_value' => $config->get('my_textarea'),
    );
    $form['number_integer'] = [
      '#type' => 'number',
      '#title' => $this->t('Numbers'),
      '#description' => t('Axxon field number'),
      '#attributes' => [
        'min' => [
          1,
        ],
      ],
      '#default_value' => $config->get('number_integer'),
      '#required' => TRUE,
    ];
    $form['#theme'] = 'axxon_challenge';
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('axxon.settings')
      ->set('number_integer', trim($form_state->getValue('number_integer')))
      ->set('my_textarea', $form_state->getValue('my_textarea')['value'])
      ->save();
    parent::submitForm($form, $form_state);
  }

}
