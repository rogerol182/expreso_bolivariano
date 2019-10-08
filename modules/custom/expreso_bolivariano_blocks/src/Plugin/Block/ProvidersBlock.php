<?php
/**
* @file
* Contains \Drupal\expreso_bolivariano_blocks\Plugin\Block\ProvidersBlock.
*/
namespace Drupal\expreso_bolivariano_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal;

/**
 * Provides a 'Providers' block.
 *
 * @Block(
 *   id = "Providers",
 *   admin_label = @Translation("Providers"),
 *
 * )
 */

class ProvidersBlock extends BlockBase {
  
	/*function to build a block*/
	public function build() {

		$form = Drupal::formBuilder()->getForm('Drupal\expreso_bolivariano_forms\Form\ProvidersForm');

		return array(
			'#theme' => 'providers_block',
			'#formData' => $form,
			'#title' => $this->t('Certificado de Proveedores'),
		);
	}
}