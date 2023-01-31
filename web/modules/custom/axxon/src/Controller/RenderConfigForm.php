<?php

namespace Drupal\axxon\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides route responses for the Example module.
 */
class RenderConfigForm extends ControllerBase {

  /**
   * Build the page.
   *
   * @return array
   *   Array to be rendered.
   */
  public function render() {
    $form = \Drupal::formBuilder()->getForm('Drupal\axxon\Form\SettingsForm');
    return [
      '#theme' => 'axxon_challenge',
      '#my_form' => $form,
    ];
  }

}
