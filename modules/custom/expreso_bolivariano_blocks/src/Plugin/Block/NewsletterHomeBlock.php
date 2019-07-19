<?php
/**
* @file
* Contains \Drupal\expreso_bolivariano_blocks\Plugin\Block\NewsletterHomeBlock.
*/
namespace Drupal\expreso_bolivariano_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal;
/**
 * Provides a 'Newsletter Block' block.
 *
 * @Block(
 *   id = "Newsletter Home",
 *   admin_label = @Translation("Newsletter Home Block"),
 *
 * )
 */

class NewsletterHomeBlock extends BlockBase {
  
  	/*function to build a block*/
	public function build() {

		$form = Drupal::formBuilder()->getForm('Drupal\expreso_bolivariano_forms\Form\NewsletterForm');
        
        return [
            '#theme' => 'newsletter_home',
            '#formData' => $form,            
            '#cache' => ['max-age' => 0],
        ];
	}
}