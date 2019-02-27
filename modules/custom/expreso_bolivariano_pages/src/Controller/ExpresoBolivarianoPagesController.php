<?php
/**
* @file
* Contains \Drupal\forcontu_pages\Controller\ForcontuPagesController.
*/
namespace Drupal\expreso_bolivariano_pages\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\UserInterface;
use Drupal\expreso_bolivariano_services\Services\ExpresoBolivarianoServices;
use Symfony\Component\DependencyInjection\ContainerInterface;

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
    	print_r($this->managerServices->getToken());
		$list[] = $this->t("Username: @username");
    	$output['forcontu_pages_user'] = array(
			'#theme' => 'item_list',
			'#items' => $list,
			'#title' => $this->t('User data:'),
		);
		return $output;
	}
	
	/*Parametro Usuario*/
	public function user(UserInterface $user) {
		$list[] = $this->t("Username: @username",
		array('@username' => $user->getAccountName()));
		$list[] = $this->t("Email: @email",
		array('@email' => $user->getEmail()));
		$list[] = $this->t("Roles: @roles",
		array('@roles' => implode(', ', $user->getRoles())));
		$list[] = $this->t("Last accessed time: @lastaccess",
		array('@lastaccess' => \Drupal::service('date.formatter')->format($user->getLastAccessedTime(), 'short')));
		$output['forcontu_pages_user'] = array(
			'#theme' => 'item_list',
			'#items' => $list,
			'#title' => $this->t('User data:'),
		);
		return $output;
	}
	
}
