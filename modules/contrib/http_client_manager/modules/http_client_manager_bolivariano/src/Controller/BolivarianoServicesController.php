<?php

namespace Drupal\http_client_manager_bolivariano\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\http_client_manager\Entity\HttpConfigRequest;
use Drupal\http_client_manager\HttpClientInterface;
use Drupal\http_client_manager\HttpServiceApiWrapperFactoryInterface;
use Drupal\http_client_manager\Plugin\HttpServiceApiWrapper\HttpServiceApiWrapperInterface;
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
   * The Posts Api Wrapper service.
   *
   * @var \Drupal\http_client_manager_example\Plugin\HttpServiceApiWrapper\HttpServiceApiWrapperPosts
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
      $container->get('bolivariano_api.http_client'),
      $container->get('http_client_manager_bolivariano.api_wrapper.posts'),
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
    $params = ['userName' => '', 'Password' => ''];
    
    $response = $client->call($command, $params);

    $build = [];
    /*
    foreach ($response as $id => $post) {
      $build[$id] = $this->buildPostResponse($post, $post_link);
    }
    */
    return $build;
  }

}
