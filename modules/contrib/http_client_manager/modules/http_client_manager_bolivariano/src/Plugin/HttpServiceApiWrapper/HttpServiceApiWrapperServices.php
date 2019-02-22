<?php

namespace Drupal\http_client_manager_bolivariano\Plugin\HttpServiceApiWrapper;

use Drupal\http_client_manager\Plugin\HttpServiceApiWrapper\HttpServiceApiWrapperBase;
use Drupal\http_client_manager_bolivariano\api\Commands\Services;

/**
 * Class HttpServiceApiWrapperPosts.
 *
 * @package Drupal\http_client_manager\Plugin\HttpServiceApiWrapper
 */
class HttpServiceApiWrapperServices extends HttpServiceApiWrapperBase {

  /**
   * {@inheritdoc}
   */
  public function getHttpClient() {
    return $this->httpClientFactory->get('bolivariano_services_yaml');
  }


}
