<?php
/**
* @file
* Contains \Drupal\forcontu_pages\Controller\ForcontuPagesController.
*/
namespace Drupal\forcontu_pages\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\UserInterface;
use Drupal\Core\Link;
use Drupal\http_client_manager\Entity\HttpConfigRequest;
use Drupal\http_client_manager\HttpClientInterface;
use Drupal\forcontu_pages\Plugin\HttpServiceApiWrapper\HttpServiceApiWrapperInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class ForcontuPagesController extends ControllerBase {

	/**
    * JsonPlaceholder Http Client.
    *
    * @var \Drupal\http_client_manager\HttpClientInterface
    */
    protected $httpClient;

	/**
	* The Services Api Wrapper service.
	*
	* @var \Drupal\forcontu_pages\Plugin\HttpServiceApiWrapper\HttpServiceApiWrapperServices
	*/
	protected $api;
    
	/**
	* The HTTP Service Api Wrapper Factory service.
	*
	* @var \Drupal\http_client_manager\HttpServiceApiWrapperFactoryInterface
	*/
	protected $apiFactory;

	/**
	* {@inheritdoc}
	*/
	public function __construct(HttpClientInterface $http_client, HttpServiceApiWrapperInterface $api_wrapper, HttpServiceApiWrapperFactoryInterface $api_wrapper_factory) {
		$this->httpClient = $http_client;
		$this->api = $api_wrapper;
		$this->apiFactory = $api_wrapper_factory;
	}

	/**
	* {@inheritdoc}
	*/
	public static function create(ContainerInterface $container) {
		return new static(
			$container->get('forcontu_pages_services_api.http_client'),
			$container->get('forcontu_pages_services_api.api_wrapper.services'),
	      	$container->get('http_client_manager.api_wrapper.factory')
		);
	}

	/**
	* Get Client.
	*
	* @return \Drupal\http_client_manager\HttpClientInterface
	*   The Http Client instance.
	*/
	public function getClient() {
		return $this->httpClient;
	}

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
	/*render
	public function render() {
		$build['item_dimensions'] = [
			'#theme' => 'forcontu_pages_simple',
			'#length' => 12,
			'#width' => 8,
			'#height' => 24,
		];
	return $build;
	}
	return $this->renderer->render($build);*/

	/**
	* Find posts.
	*
	* @param int|NULL $postId
	*   The post Id.
	*
	* @return array
	*   The service response.
	*/
	public function services() {
		/*$client = $this->getClient();
		$post_link = TRUE;
		$command = 'getToken';
		$params = ['userName' => 'portalweb', 'Password' => '@.PwEe76?*'];
		$response = $client->call($command, $params);
		$build = [];
		foreach ($response as $id => $token) {
			$build[$id] = $this->buildPostResponse($token, $post_link);
		}*/
		// Here we are using an HTTP Config Request just for example purposes.
	    $response = $api->httpConfigRequest('testConnect');
	    return [
	      '#type' => 'markup',
	      '#markup' => '<pre>' . print_r($response, TRUE) . '</pre>',
	    ];
	}
}
