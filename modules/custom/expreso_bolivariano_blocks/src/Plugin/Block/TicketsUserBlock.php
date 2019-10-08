<?php
/**
* @file
* Contains \Drupal\expreso_bolivariano_blocks\Plugin\Block\TicketsUserBlock.
*/
namespace Drupal\expreso_bolivariano_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\expreso_bolivariano_services\Services\ExpresoBolivarianoServices;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
/**
 * Provides a 'Tickets User' block.
 *
 * @Block(
 *   id = "Tickets User",
 *   admin_label = @Translation("Tickets User"),
 *
 * )
 */

class TicketsUserBlock extends BlockBase implements ContainerFactoryPluginInterface {
  
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
		$responseTickets = $this->managerServices->getListTickets($tokenId,$uid,999);
		if($responseTickets['statusName']=='OK')
		{
			if($responseTickets['recordCount']!='0')
			{
				$ticketsData = $responseTickets['data'];
				foreach ($ticketsData as $arr) 
				{
					if (!$ticketsDataFull[$arr['purshaseId']]) 
					{
				    	$ticketsDataFull[$arr['purshaseId']] = array();
				  	}
				 	$ticketsDataFull[$arr['purshaseId']]['purshaseId'] = $arr['purshaseId'];
				 	$ticketsDataFull[$arr['purshaseId']]['totalRate'] += $arr['rate'];
				 	$ticketsDataFull[$arr['purshaseId']]['agencyOriginName'] = $arr['agencyOriginName'];
				 	$ticketsDataFull[$arr['purshaseId']]['agencyDestinationName'] = $arr['agencyDestinationName'];
				 	$ticketsDataFull[$arr['purshaseId']]['homologationSeat'] .= $arr['homologationSeat'];
				 	$ticketsDataFull[$arr['purshaseId']]['tripDate'] = $arr['tripDate'];
				 	$ticketsDataFull[$arr['purshaseId']]['tripHour'] = $arr['tripHour'];
				 	$ticketsDataFull[$arr['purshaseId']]['busServiceId'] = $arr['busServiceId'];
				}
			}
			else
			{
				$ticketsDataFull = 0;
			}
		}
		return array(
			'#theme' => 'tickets_user_block',
			'#ticketsData' => $ticketsDataFull,
			'#title' => $this->t('Mis Tiquetes'),
			'#cache' => ['max-age' => 0],
		);
	}
}