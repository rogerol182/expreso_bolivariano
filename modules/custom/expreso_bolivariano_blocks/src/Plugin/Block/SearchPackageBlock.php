<?php
/**
* @file
* Contains \Drupal\expreso_bolivariano_blocks\Plugin\Block\SearchPackageBlock.
*/
namespace Drupal\expreso_bolivariano_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal;
/**
 * Provides a 'Search Package Block' block.
 *
 * @Block(
 *   id = "Search Package",
 *   admin_label = @Translation("Search Package Block"),
 *
 * )
 */

class SearchPackageBlock extends BlockBase {
  
  	/*function to build a block*/
	public function build() {

		$form = Drupal::formBuilder()->getForm('Drupal\expreso_bolivariano_forms\Form\ShippingGpsForm');
        
        return [
            '#theme' => 'search_package',
            '#formData' => $form,            
            '#cache' => ['max-age' => 0],
        ];
	}
}