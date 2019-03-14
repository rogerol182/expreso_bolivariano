<?php
/**
* @file
* Contains \Drupal\expreso_bolivariano_blocks\Plugin\Block\PromotionsHomeGridBlock.
*/
namespace Drupal\expreso_bolivariano_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\expreso_bolivariano_blocks\Controller\ExpresoBolivarianoBlocksController;
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
    
    $controller_variable = new ExpresoBolivarianoBlocksController;
    $rendering_in_block = $controller_variable->getPromotionsBlockHome();
    return $rendering_in_block;

  }
}