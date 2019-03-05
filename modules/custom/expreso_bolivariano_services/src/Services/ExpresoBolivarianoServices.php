<?php
/**
* @file providing the all services that we need in te Drupal Site'.
*
*/
namespace Drupal\expreso_bolivariano_services\Services;

//use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Site\Settings;
//use Drupal\Core\Link;
use Drupal\http_client_manager\Entity\HttpConfigRequest;
use Drupal\http_client_manager\HttpClientInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
//use Symfony\Component\HttpFoundation\Response;

class ExpresoBolivarianoServices {
	
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
        return $token;
    }
	/*Function to validate a token expires*/
    public function renewToken($tokenId)
    {
        $configuration_userName_rest = settings::get('rest_userName');
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['UserName' => $configuration_userName_rest, 'Authorization' => $configuration_tokenId_rest]; 
        $tokenRenew = $this->httpClient->renewTokenConnection($params);
        return $tokenRenew;
    }
    /*Function to get Agencies*/
    public function getAgencies($tokenId,$contractNumber,$contractType)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'contractNumber' => $contractNumber, 'contractType' => $contractType]; 
        $listAgencies = $this->httpClient->getAgencies($params);
        //print_r($listAgencies);
        return $listAgencies;
    }
}