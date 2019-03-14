<?php
/**
* @file
* Contains \Drupal\expreso_bolivariano_blocks\Controller\ExpresoBolivarianoBlocksController.
*/
namespace Drupal\expreso_bolivariano_blocks\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\expreso_bolivariano_services\Services\ExpresoBolivarianoServices;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ExpresoBolivarianoBlocksController extends ControllerBase {

	private $managerServices;
    
      /**
    * {@inheritdoc}
    */
    public function __construct(ExpresoBolivarianoServices $managerServices) {
        $this->managerServices = $managerServices;
    }
    /**
    * {@inheritdoc}
    */
    public static function create(ContainerInterface $container) {
        return new static(
          $container->get('expreso_bolivariano_services.custom')
        );
    }

	/*Function to return a Promotions Block Home*/
	public function getPromotionsBlockHome() {
		
		 return array(
             '#title' => 'Example',
             '#markup' => 'This is a custom module', 

            );
	}
	
}
