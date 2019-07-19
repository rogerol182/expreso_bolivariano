<?php
/**
* @file
* Contains \Drupal\expreso_bolivariano_blocks\Plugin\Block\GpsBlock.
*/
namespace Drupal\expreso_bolivariano_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\expreso_bolivariano_services\Services\ExpresoBolivarianoServices;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
/**
 * Provides a 'GPS Block' block.
 *
 * @Block(
 *   id = "GPS Block",
 *   admin_label = @Translation("GPS Block"),
 *
 * )
 */

class GpsBlock extends BlockBase implements ContainerFactoryPluginInterface {
  
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

		/*$response = $this->managerServices->getToken();
		
		if($response['statusName']=='OK')
		{
			foreach($response as $key => $value) 
			{
				$tokenId = $value['token'];
			    $dateExpires = $value['expires'];
			}
		}
		$responseCitiesGo = $this->managerServices->getAgencies($tokenId,0,'O');
		$responseCitiesBack = $this->managerServices->getAgencies($tokenId,0,'D');
		
		if($responseCitiesGo['statusName']=='OK' && $responseCitiesBack['statusName']=='OK')
		{
			$citiesGoData = $responseCitiesGo['data'];
			$citiesBackData = $responseCitiesBack['data'];
		}*/
		return array(
			'#theme' => 'gps',
			//'#citiesGoData' => $citiesGoData,
			//'#citiesBackData' => $citiesBackData,
		);
	}
}