<?php
/**
* @file
* Contains \Drupal\forcontu_pages\Controller\ExpresoBolivarianoPagesController.
*/
namespace Drupal\expreso_bolivariano_pages\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\UserInterface;
use Drupal\expreso_bolivariano_services\Services\ExpresoBolivarianoServices;
use Symfony\Component\DependencyInjection\ContainerInterface;
//use Symfony\Component\HttpFoundation\Response;

class ExpresoBolivarianoPagesController extends ControllerBase {

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

	/*Parametro Simple*/
	public function simple() {
		
		//echo "Holaaaa";
		//die();
		$response = $this->managerServices->getToken();
		if($response['statusName']=='OK')
		{
			foreach($response as $key => $value) 
			{
				$tokenId = $value['token'];
			    $dateExpires = $value['expires'];
			}
		}
		echo $tokenId;
		die();
		//$contractNumber = 0;
		//$contractType = 'D';
		
		/*$responseT = $this->managerServices->renewToken($tokenId);
		if($responseT['statusName']=='OK')
		{
			foreach($responseT as $keyT => $valueT) 
			{
				$tokenIdT = $valueT['token'];
			    $dateExpiresT = $valueT['expires'];
			}
		}*/
		
		//$list = array($statusNameT,$tokenIdT,$dateExpiresT);
		//$responseT = $this->managerServices->getAgencies($tokenId,$contractNumber,$contractType);
		$list[] = array('tokenId' => $tokenId);

		return array(
			'#theme' => 'grid_home_promotions_block',
			'#items' => $list,
			'#title' => $this->t('Token:'),
		);
		//print_r($responseT);
		//exit();
		//return $responseT;
		
	}
	
	/*Parametro Usuario*/
	
	public function user(UserInterface $user) {
		$list[] = $this->t("Username: @username",array('@username' => $user->getAccountName()));
		$list[] = $this->t("Email: @email",array('@email' => $user->getEmail()));
		$list[] = $this->t("Roles: @roles",array('@roles' => implode(', ', $user->getRoles())));
		$list[] = $this->t("Last accessed time: @lastaccess",array('@lastaccess' => \Drupal::service('date.formatter')->format($user->getLastAccessedTime(), 'short')));

		$output['forcontu_pages_user'] = array(
			'#theme' => 'item_list',
			'#items' => $list,
			'#title' => $this->t('User data:'),
		);
		return $output;
	}
	
}
