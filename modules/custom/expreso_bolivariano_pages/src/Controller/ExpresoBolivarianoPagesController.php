<?php
/**
* @file
* Contains \Drupal\forcontu_pages\Controller\ForcontuPagesController.
*/
namespace Drupal\expreso_bolivariano_pages\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\UserInterface;

class ExpresoBolivarianoPagesController extends ControllerBase {

	/*Parametro Simple*/
	public function simple() {
		
		return [
		      '#theme' => 'my_template',
		      '#test_var' => $this->t('Test Value'),
		    ];
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
