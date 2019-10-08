<?php
/**
* @file
* Contains \Drupal\expreso_bolivariano_blocks\Plugin\Block\SearchGpsBlock.
*/
namespace Drupal\expreso_bolivariano_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal;
/**
 * Provides a 'Search Gps Block' block.
 *
 * @Block(
 *   id = "Search Gps",
 *   admin_label = @Translation("Search Gps Block"),
 *
 * )
 */

class SearchGpsBlock extends BlockBase {
  
  	/*function to build a block*/
	public function build() {

		$form = Drupal::formBuilder()->getForm('Drupal\expreso_bolivariano_forms\Form\GpsForm');
        
        return [
            '#theme' => 'search_gps',
            '#formData' => $form,            
            '#cache' => ['max-age' => 0],
        ];
	}
}