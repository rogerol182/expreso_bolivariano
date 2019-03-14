<?php
/**
* @file
* Contains \Drupal\expreso_bolivariano_pages\Plugin\Block\ExpresoBolivarianoBlock.
*/
namespace Drupal\expreso_bolivariano_pages\Plugin\Block;

use Drupal\Core\Block\BlockBase;
//use Drupal\expreso_bolivariano_services\Services\ExpresoBolivarianoServices;
//use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\expreso_bolivariano_pages\Controller\ExpresoBolivarianoPagesController;
//use Symfony\Component\DependencyInjection\ContainerInterface;
/**
 * Provides a 'Promotions Home' block.
 *
 * @Block(
 *   id = "Promotions Home Grid",
 *   admin_label = @Translation("Promotions Home Grid Block"),
 *
 * )
 */
class PromotionsHomeGridBlock extends BlockBase {
  
  
  /*function to build a block*/
  public function build() {
    
    $controller_variable = new ExpresoBolivarianoPagesController;
    $rendering_in_block = $controller_variable->simple();
    return $rendering_in_block;
    
    /*
    $response = $this->managerServices->getToken();
    if($response['statusName']=='OK')
    {
      foreach($response as $key => $value) 
      {
          $tokenId = $value['token'];
          $dateExpires = $value['expires'];
      }
    }
    $responsePromotions = $this->managerServices->getPromotions($tokenId,$promotionsNumber);
    */
    /*return array(
      '#theme' => 'grid_home_promotions_block',
      '#title' => 'Promotions Home Grid Block',
      //'#data_grid' => $rendering_in_block,
      '#description' => 'a grid with te promotions for the block in home'
    );*/
  }
}