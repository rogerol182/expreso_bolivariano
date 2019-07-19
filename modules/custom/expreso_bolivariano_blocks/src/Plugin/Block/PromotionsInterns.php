<?php
/**
* @file
* Contains \Drupal\expreso_bolivariano_blocks\Plugin\Block\PromotionsInterns.
*/
namespace Drupal\expreso_bolivariano_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\expreso_bolivariano_services\Services\ExpresoBolivarianoServices;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
/**
 * Provides a 'Promotions Interns' block.
 *
 * @Block(
 *   id = "Promotions Interns",
 *   admin_label = @Translation("Promotions Interns"),
 *
 * )
 */

class PromotionsInterns extends BlockBase implements ContainerFactoryPluginInterface {
  
  	protected $managerServices;

	/**
	* {@inheritdoc}
	*/
	public function __construct(array $configuration, $plugin_id, $plugin_definition, ExpresoBolivarianoServices $managerServices) {
	    
	    parent::__construct($configuration, $plugin_id, $plugin_definition);
	    
	    $this->managerServices = $managerServices;
	}
	/**
	* {@inheritdoc}
	*/
	public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
	    return new static(
            $configuration,
            $plugin_id,
            $plugin_definition,
            $container->get('expreso_bolivariano_services.custom')
          );
	}
	/*function to build a block*/
	public function build() {

		$response = $this->managerServices->getToken();
		
		if($response['statusName']=='OK')
		{
			foreach($response as $key => $value) 
			{
				$tokenId = $value['token'];
			    $dateExpires = $value['expires'];
			}
		}
		$responsePromotions = $this->managerServices->getPromotions($tokenId,4);
		$responsePromotionsMore = $this->managerServices->getPromotions($tokenId,4);
		
		if($responsePromotions['statusName']=='OK' && $responsePromotionsMore['statusName']=='OK')
		{
			$promotionsData = $responsePromotions['data'];
			$promotionsMoreData = $responsePromotionsMore['data'];
		}
		return array(
			'#theme' => 'promotions_interns_grid_block',
			'#promotionsData' => $promotionsData,
			'#promotionsMoreData' => $promotionsMoreData,
			'#title' => $this->t('Promociones Internas'),
		);
	}
}