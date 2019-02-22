<?php
/**
* @file
* Contains \Drupal\forcontu_theming\Controller\ForcontuThemingController.
*/
namespace Drupal\forcontu_theming\Controller;
use Drupal\Core\Controller\ControllerBase;

class ForcontuThemingController extends ControllerBase {
	public function hello($name) {
    // the {name} in the route gets captured as $name variable
    // in the function called
    return [
      '#theme' => 'hello_page',
      '#name' => $name,
      '#attached' => [
        'library' => [
          'acme/acme-styles', //include our custom library for this response
        ]
      ]
    ];
  }
}