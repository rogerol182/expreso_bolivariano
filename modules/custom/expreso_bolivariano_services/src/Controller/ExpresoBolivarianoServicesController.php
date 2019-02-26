<?php
/**
* @file providing the all services that we need in te Drupal Site'.
*
*/
namespace Drupal\expreso_bolivariano_services\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Site\Settings;
//use Drupal\Core\Link;
use Drupal\http_client_manager\Entity\HttpConfigRequest;
use Drupal\http_client_manager\HttpClientInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

class ExpresoBolivarianoServicesController extends ControllerBase{
	
	private $httpClient;
    
      /**
    * {@inheritdoc}
    */
    public function __construct(HttpClientInterface $http_client) {
        $this->httpClient = $http_client;
    }

    /**
    * {@inheritdoc}
    */
    public static function create(ContainerInterface $container) {
        return new static(
          $container->get('bolivariano_services.http_client')
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
    /*Function to get Token for a connection*/
    public function getToken()
    {
    	$configuration_userName_rest = settings::get('rest_userName');
		$configuration_Password_rest = settings::get('rest_Password');
        $params = ['UserName' => $configuration_userName_rest, 'Password' => $configuration_Password_rest];
        $token = $this->httpClient->getTokenConnection($params);
        $response = new Response($token);
        return $response;
    }
	/*Function to validate a token expires*/
    public function getTokenExpiration()
    {
        $configuration_userName_rest = settings::get('rest_userName');
        $configuration_Password_rest = settings::get('rest_Password');
        $params = ['UserName' => $configuration_userName_rest, 'Password' => $configuration_Password_rest];
        $token = $this->httpClient->getTokenConnection($params);
        $response = new Response($token);
        return $response;
    }
}