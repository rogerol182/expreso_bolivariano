<?php
/**
* @file
* Contains \Drupal\forcontu_pages\Controller\ForcontuPagesController.
*/
namespace Drupal\expreso_bolivariano_pages\Controller;

use Drupal\Core\Controller\ControllerBase;
//use Drupal\Core\Link;
use Drupal\user\UserInterface;
//use Drupal\http_client_manager\Entity\HttpConfigRequest;
use Drupal\http_client_manager_bolivariano\HttpClientInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ExpresoBolivarianoPagesController extends ControllerBase {

	protected $httpClient;
    
    public function __construct(HttpClientInterface $http_client) {
		$this->httpClient = $http_client;
	}

	public static function create(ContainerInterface $container) {
		return new static(
			$container->get('bolivariano_services.http_client')
		);
	}
	/*Parametro Simple*/
	public function simple() {
		
		$configuration_userName_rest = settings::get('rest_userName');
		$configuration_Password_rest = settings::get('rest_Password');
        $token = $this->httpClient->getTokenConnection($configuration_userName_rest,$configuration_Password_rest);

		return [
		      '#theme' => 'my_template',
		      '#token' => $token,
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
