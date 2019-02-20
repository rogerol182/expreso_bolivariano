<?php

namespace Drupal\Destinos\Controller;

use Drupal\Core\Controller\ControllerBase;

class DestinosController extends ControllerBase {
  public function hello($name) {
    // the {name} in the route gets captured as $name variable
    // in the function called
    return [
      '#theme' => 'hello_page',
      '#name' => $name,
      '#attached' => [
        'library' => [
          'destinos/destinos-styles', //include our custom library for this response
        ]
      ]
    ];
  }
}