<?php
/**
* @file
* Contains \Drupal\expreso_bolivariano_blocks\Plugin\Block\ShippingQuoteBlock.
*/
namespace Drupal\expreso_bolivariano_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal;
/**
 * Provides a 'Shipping Quote Block' block.
 *
 * @Block(
 *   id = "Shipping Quote",
 *   admin_label = @Translation("Shipping Quote Block"),
 *
 * )
 */

class ShippingQuoteBlock extends BlockBase {
  
  	/*function to build a block*/
	public function build() {

		$form = Drupal::formBuilder()->getForm('Drupal\expreso_bolivariano_forms\Form\ShippingQuoteForm');
        
        return [
            '#theme' => 'shipping_quote',
            '#formData' => $form,
            '#cache' => ['max-age' => 0],
        ];
	}
}