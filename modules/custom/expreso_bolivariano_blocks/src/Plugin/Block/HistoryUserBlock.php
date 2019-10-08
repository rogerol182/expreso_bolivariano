<?php
/**
* @file
* Contains \Drupal\expreso_bolivariano_blocks\Plugin\Block\HistoryUserBlock.
*/
namespace Drupal\expreso_bolivariano_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\expreso_bolivariano_services\Services\ExpresoBolivarianoServices;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
/**
 * Provides a 'History User' block.
 *
 * @Block(
 *   id = "History User",
 *   admin_label = @Translation("History User"),
 *
 * )
 */

class HistoryUserBlock extends BlockBase implements ContainerFactoryPluginInterface {
  
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
      	$user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
      	$uid = (integer) $user->get('uid')->value;
      	//Query Tickets by Client
		$responseHistory = $this->managerServices->getListHistory($tokenId,$uid,999);
		if($responseHistory['statusName']=='OK')
		{
			if($responseHistory['recordCount']!='0')
			{
				$historyData = $responseHistory['data'];
				foreach ($historyData as $arr) 
				{
					if (!$historyDataFull[$arr['purshaseId']]) 
					{
				    	$historyDataFull[$arr['purshaseId']] = array();
				  	}
				 	$historyDataFull[$arr['purshaseId']]['purshaseId'] = $arr['purshaseId'];
				 	$historyDataFull[$arr['purshaseId']]['totalRate'] += $arr['rate'];
				 	$historyDataFull[$arr['purshaseId']]['agencyOriginName'] = $arr['agencyOriginName'];
				 	$historyDataFull[$arr['purshaseId']]['agencyDestinationName'] = $arr['agencyDestinationName'];
				 	$historyDataFull[$arr['purshaseId']]['homologationSeat'] .= $arr['homologationSeat'];
				 	$historyDataFull[$arr['purshaseId']]['tripDate'] = $arr['tripDate'];
				 	$historyDataFull[$arr['purshaseId']]['tripHour'] = $arr['tripHour'];
				 	$historyDataFull[$arr['purshaseId']]['busServiceId'] = $arr['busServiceId'];
				}
			}
			else
			{
				$historyDataFull = 0;
			}
		}
		return array(
			'#theme' => 'history_user_block',
			'#historyData' => $historyDataFull,
			'#title' => $this->t('Mi Historial de Viajes'),
			'#cache' => ['max-age' => 0],
		);
	}
}