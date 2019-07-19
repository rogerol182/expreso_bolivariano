<?php
/**
* @file
* Contains \Drupal\expreso_bolivariano_jobs\Controller\ExpresoBolivarianoJobsController.
*/
namespace Drupal\expreso_bolivariano_jobs\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\UserInterface;
use Drupal\expreso_bolivariano_services\Services\ExpresoBolivarianoServices;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Drupal\views\Controller;

class ExpresoBolivarianoJobsController extends ControllerBase {

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

	/*Page Reservation*/
	public function user_validate($username,$password) {
		
		$response = $this->managerServices->getToken();
		if($response['statusName']=='OK')
		{
			foreach($response as $key => $value) 
			{
				$tokenId = $value['token'];
			    $dateExpires = $value['expires'];
			}
		}
	}
	
}
