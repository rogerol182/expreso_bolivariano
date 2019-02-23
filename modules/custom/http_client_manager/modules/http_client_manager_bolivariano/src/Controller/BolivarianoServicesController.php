<?php

namespace Drupal\http_client_manager_bolivariano\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\http_client_manager\Entity\HttpConfigRequest;
use Drupal\http_client_manager\HttpClientInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ExampleController.
 *
 * @package Drupal\http_client_manager_example\Controller
 */
class BolivarianoServicesController extends ControllerBase {

  /**
   * JsonPlaceholder Http Client.
   *
   * @var \Drupal\http_client_manager\HttpClientInterface
   */
  protected $httpClient;

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
      $container->get('bolivariano_api.http_client')
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

  /**
  * Find posts.
  *
  * @param int|NULL $postId
  *   The post Id.
  *
  * @return array
  *   The service response.
  */
  
  public function getTokenConnection() {
    $client = $this->getClient();
    $post_link = TRUE;
    $command = 'getTokenConnection';
    $params = ['userName' => 'portalweb', 'Password' => '@.PwEe76?*'];
    
    $response = $client->call($command, $params);

    print_r($response);
  }

}
