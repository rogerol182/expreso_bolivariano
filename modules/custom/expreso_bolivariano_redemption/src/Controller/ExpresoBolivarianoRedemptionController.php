<?php
/**
* @file
* Contains \Drupal\expreso_bolivariano_redemption\Controller\ExpresoBolivarianoRedemptionController.
*/
namespace Drupal\expreso_bolivariano_redemption\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;

class ExpresoBolivarianoRedemptionController extends ControllerBase {

    /*Page Redemption*/
	public function page_redemption() {
		
		global $base_url;
        $host = $base_url;
		$user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
      	$uid = $user->get('uid')->value;

      	return array(
			'#theme' => 'page_redemption_template',
			'#user' => $uid,
			'#host' => $host,
		);		
	}
}
