<?php
/**
* @file
* Contains \Drupal\expreso_bolivariano_blocks\Plugin\Block\ReservationsUserBlock.
*/
namespace Drupal\expreso_bolivariano_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\expreso_bolivariano_services\Services\ExpresoBolivarianoServices;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
/**
 * Provides a 'Reservations User' block.
 *
 * @Block(
 *   id = "Reservations User",
 *   admin_label = @Translation("Reservations User"),
 *
 * )
 */

class ReservationsUserBlock extends BlockBase implements ContainerFactoryPluginInterface {
  
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
      	//Query Reservations by Client
		$responseReservations = $this->managerServices->getListReservations($tokenId,$uid,999);
		if($responseReservations['statusName']=='OK')
		{
			if($responseReservations['recordCount']!='0')
			{
				$reservationsData = $responseReservations['data'];
				foreach ($reservationsData as $arr) 
				{
					if (!$reservationsDataFull[$arr['purshaseId']]) 
					{
				    	$reservationsDataFull[$arr['purshaseId']] = array();
				  	}
				 	$reservationsDataFull[$arr['purshaseId']]['purshaseId'] = $arr['purshaseId'];
				 	$reservationsDataFull[$arr['purshaseId']]['totalRate'] += $arr['rate'];
				 	$reservationsDataFull[$arr['purshaseId']]['agencyOriginName'] = $arr['agencyOriginName'];
				 	$reservationsDataFull[$arr['purshaseId']]['agencydestinationName'] = $arr['agencydestinationName'];
				 	$reservationsDataFull[$arr['purshaseId']]['homologationSeat'] .= $arr['homologationSeat'];
				 	$reservationsDataFull[$arr['purshaseId']]['tripDate'] = $arr['tripDate'];
				 	$reservationsDataFull[$arr['purshaseId']]['tripHour'] = $arr['tripHour'];
				 	$reservationsDataFull[$arr['purshaseId']]['busServiceId'] = $arr['busServiceId'];
				}
			}
			else
			{
				$reservationsDataFull = 0;
			}	
		}
		//$reservationsDataUnique = array_unique($reservationsData);
		//var_dump($reservationsDataFull);
		//die();
		return array(
			'#theme' => 'reservations_user_block',
			'#reservationsData' => $reservationsDataFull,
			'#title' => $this->t('Mis Reservas'),
			'#cache' => ['max-age' => 0],
		);
	}
}