<?php
/**
* @file
* Contains \Drupal\forcontu_pages\Controller\ExpresoBolivarianoPagesController.
*/
namespace Drupal\expreso_bolivariano_pages\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;
use Drupal\user\UserInterface;
use Drupal\user\UserAuthInterface;
use Drupal\user\UserStorageInterface;
use Drupal\Core\Url;
use Drupal\expreso_bolivariano_services\Services\ExpresoBolivarianoServices;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\views\Controller;
use Drupal\Component\Utility\Crypt;

class ExpresoBolivarianoPagesController extends ControllerBase {

	private $managerServices;
    
      /**
    * {@inheritdoc}
    */
    public function __construct(ExpresoBolivarianoServices $managerServices) {
        $this->managerServices = $managerServices;
    }
    /**
    * {@inheritdoc}
    */
    public static function create(ContainerInterface $container) {
        return new static(
          $container->get('expreso_bolivariano_services.custom')
        );
    }

	/*Page Reservation*/
	public function page_reservation($saleAgencyId,$saleAgencyName,$destinationAgencyId,$destinationAgencyName,$tripDate,$tripDateBack) {
		
		$response = $this->managerServices->getToken();
		if($response['statusName']=='OK')
		{
			$tokenId = $response['data']['token'];
			$dateExpires = $response['data']['expires'];
		}

		$saleAgencyId = (int)$saleAgencyId;
		$destinationAgencyId = (int)$destinationAgencyId;
		$tripDate = explode('-', $tripDate);
		$tripDate = $tripDate[2]."-".$tripDate[1]."-".$tripDate[0];
			
		$contractNumber = 0;
		$userCode = 74130902;
		$agencyId = 999;
		$intervalHourTripDeparture = 2;

		if($tripDateBack!=0)
		{
			if($tripDateBack!=0)
			{
				$tripDateBack = explode('-', $tripDateBack);
				$tripDateBack = $tripDateBack[2]."-".$tripDateBack[1]."-".$tripDateBack[0];
			}
			$responseDatesTrips = $this->managerServices->getAvailableDatesTrips($tokenId,$saleAgencyId,$destinationAgencyId,$tripDate,$agencyId,$intervalHourTripDeparture);
			$responseDatesTripsBack = $this->managerServices->getAvailableDatesTrips($tokenId,$destinationAgencyId,$saleAgencyId,$tripDateBack,$agencyId,$intervalHourTripDeparture);
			$responseTripsGo = $this->managerServices->getAvailableTrips($tokenId,$saleAgencyId,$destinationAgencyId,$tripDate,$contractNumber,$userCode,$agencyId,$intervalHourTripDeparture);
			$responseTripsBack = $this->managerServices->getAvailableTrips($tokenId,$destinationAgencyId,$saleAgencyId,$tripDateBack,$contractNumber,$userCode,$agencyId,$intervalHourTripDeparture);
			//var_dump($responseTripsGo);
			//print_r($responseTripsBack);
			if($responseDatesTrips['statusName']=='OK' && $responseDatesTripsBack['statusName']=='OK' && $responseTripsGo['statusName']=='OK' && $responseTripsBack['statusName']=='OK')
			{
				$responseDatesTrips = $responseDatesTrips['data'];
				$responseDatesTripsBack = $responseDatesTripsBack['data'];
				$responseTripsGo = $responseTripsGo['data'];
				$responseTripsBack = $responseTripsBack['data'];
			}
			return array(
				'#theme' => 'page_reservation_template',
				'#tripsCitiesData' => ['idOriginCity'=> $saleAgencyId, 'idDestinationCity'=>$destinationAgencyId, 'originCity'=>$saleAgencyName, 'destinationCity'=>$destinationAgencyName],
				'#tripsDatesData' => ['tripDateGo'=>$tripDate, 'tripDateBack'=>$tripDateBack],
				'#tripsDatesGoData' => $responseDatesTrips,
				'#tripsDatesBackData' => $responseDatesTripsBack,
				'#tripsGoData' => $responseTripsGo,
				'#tripsBackData' => $responseTripsBack,
			);
		}
		else
		{
			$responseDatesTrips = $this->managerServices->getAvailableDatesTrips($tokenId,$saleAgencyId,$destinationAgencyId,$tripDate,$agencyId,$intervalHourTripDeparture);
			$responseTripsGo = $this->managerServices->getAvailableTrips($tokenId,$saleAgencyId,$destinationAgencyId,$tripDate,$contractNumber,$userCode,$agencyId,$intervalHourTripDeparture);

			if($responseDatesTrips['statusName']=='OK' && $responseTripsGo['statusName']=='OK')
			{
				$responseDatesTrips = $responseDatesTrips['data'];
				$responseTripsGo = $responseTripsGo['data'];
			}
			return array(
				'#theme' => 'page_reservation_template',
				'#tripsCitiesData' => ['idOriginCity'=> $saleAgencyId, 'idDestinationCity'=>$destinationAgencyId, 'originCity'=>$saleAgencyName, 'destinationCity'=>$destinationAgencyName],
				'#tripsDatesData' => ['tripDateGo'=>$tripDate, 'tripDateBack'=>$tripDateBack],
				'#tripsDatesGoData' => $responseDatesTrips,
				'#tripsDatesBackData' => $responseDatesTripsBack,
				'#tripsGoData' => $responseTripsGo,
				'#tripsBackData' => 0,
			);
		}
			
	}
	/*Tab Reservation Go*/
	public function tab_reservation_go($saleAgencyId,$saleAgencyName,$destinationAgencyId,$destinationAgencyName,$tripDate,$tripDateBack) {
		
		$response = $this->managerServices->getToken();
		if($response['statusName']=='OK')
		{
			$tokenId = $response['data']['token'];
			$dateExpires = $response['data']['expires'];
		}

		$saleAgencyId = (int)$saleAgencyId;
		$destinationAgencyId = (int)$destinationAgencyId;
		$tripDate = explode('-', $tripDate);
		$tripDate = $tripDate[2]."-".$tripDate[1]."-".$tripDate[0];
			
		$contractNumber = 0;
		$userCode = 74130902;
		$agencyId = 999;
		$intervalHourTripDeparture = 2;

		$responseDatesTrips = $this->managerServices->getAvailableDatesTrips($tokenId,$saleAgencyId,$destinationAgencyId,$tripDate,$agencyId,$intervalHourTripDeparture);
		$responseTripsGo = $this->managerServices->getAvailableTrips($tokenId,$saleAgencyId,$destinationAgencyId,$tripDate,$contractNumber,$userCode,$agencyId,$intervalHourTripDeparture);

		if($responseDatesTrips['statusName']=='OK' && $responseTripsGo['statusName']=='OK')
		{
			$responseDatesTrips = $responseDatesTrips['data'];
			$responseTripsGo = $responseTripsGo['data'];
		}
		$build = array(
			'#theme' => 'tab_reservation_go_template',
			'#tripsCitiesData' => ['idOriginCity'=> $saleAgencyId, 'idDestinationCity'=>$destinationAgencyId, 'originCity'=>$saleAgencyName, 'destinationCity'=>$destinationAgencyName],
			'#tripsDatesData' => ['tripDateGo'=>$tripDate, 'tripDateBack'=>$tripDateBack],
			'#tripsDatesGoData' => $responseDatesTrips,
			'#tripsDatesBackData' => $responseDatesTripsBack,
			'#tripsGoData' => $responseTripsGo,
			'#tripsBackData' => 0,
		);
		
		return new Response(render($build));	
	}
	/*Tab Reservation Back*/
	public function tab_reservation_back($saleAgencyId,$saleAgencyName,$destinationAgencyId,$destinationAgencyName,$tripDate,$tripDateBack) {
		
		$response = $this->managerServices->getToken();
		if($response['statusName']=='OK')
		{
			$tokenId = $response['data']['token'];
			$dateExpires = $response['data']['expires'];
		}

		$saleAgencyId = (int)$saleAgencyId;
		$destinationAgencyId = (int)$destinationAgencyId;
		$tripDate = explode('-', $tripDate);
		$tripDate = $tripDate[2]."-".$tripDate[1]."-".$tripDate[0];
			
		$contractNumber = 0;
		$userCode = 74130902;
		$agencyId = 999;
		$intervalHourTripDeparture = 2;

		$responseDatesTrips = $this->managerServices->getAvailableDatesTrips($tokenId,$saleAgencyId,$destinationAgencyId,$tripDate,$agencyId,$intervalHourTripDeparture);
		$responseTripsGo = $this->managerServices->getAvailableTrips($tokenId,$saleAgencyId,$destinationAgencyId,$tripDate,$contractNumber,$userCode,$agencyId,$intervalHourTripDeparture);

		if($responseDatesTrips['statusName']=='OK' && $responseTripsGo['statusName']=='OK')
		{
			$responseDatesTrips = $responseDatesTrips['data'];
			$responseTripsGo = $responseTripsGo['data'];
		}
		$build = array(
			'#theme' => 'tab_reservation_back_template',
			'#tripsCitiesData' => ['idOriginCity'=> $saleAgencyId, 'idDestinationCity'=>$destinationAgencyId, 'originCity'=>$saleAgencyName, 'destinationCity'=>$destinationAgencyName],
			'#tripsDatesData' => ['tripDateGo'=>$tripDate, 'tripDateBack'=>$tripDateBack],
			'#tripsDatesGoData' => $responseDatesTrips,
			'#tripsDatesBackData' => $responseDatesTripsBack,
			'#tripsGoData' => $responseTripsGo,
			'#tripsBackData' => 0,
		);
		
		return new Response(render($build));
	}
	/*Page Reservation*/
	public function page_selection_go($saleAgencyId,$saleAgencyName,$destinationAgencyId,$destinationAgencyName,$tripDateGo,$tripKeyGo,$tripCapacity,$tripService) {
		
		$response = $this->managerServices->getToken();
		if($response['statusName']=='OK')
		{
			$tokenId = $response['data']['token'];
			$dateExpires = $response['data']['expires'];
		}
		$saleAgencyId = (int)$saleAgencyId;
		$destinationAgencyId = (int)$destinationAgencyId;
		$tripKeyGo = (int)$tripKeyGo;
		$tripCapacity = (int)$tripCapacity;
		
		$mapType = 1;
		$companyId = 1;

		$responsePrintBus = $this->managerServices->getPrintBusMap($tokenId,$tripKeyGo,$tripCapacity,$saleAgencyId,$destinationAgencyId);
		$responseTripChairs = $this->managerServices->getAvailableTripChairs($tokenId,$mapType,$companyId,$tripKeyGo,$saleAgencyId,$destinationAgencyId);
		if($responsePrintBus['statusName']=='OK' && $responseTripChairs['statusName']=='OK')
		{
			$responseTripChairs = $responseTripChairs['data'];
			$responsePrintBus = $responsePrintBus['data'];
		}
		//$countRowsFirstFloor = array();
		$countBlocked = array();
		foreach ($responseTripChairs as $key => $item)
		{
			//Count Many Rows to draw
			//$countRows[] = $item['row'];
			//Rates for Chair Selection
			if($item['rateType']=='INCREIBLE' && $item['rate']!=0)
			{
				$countRates['in'] = array('i',$item['rate'],'increible','Tarifa Increible');
			}
			if($item['rateType']=='COMODO' && $item['rate']!=0)
			{
				$countRates['co'] = array('c',$item['rate'],'comoda','Tarifa Comoda');
			}
			if($item['rateType']=='CHEVERE' && $item['rate']!=0)
			{
				$countRates['ce'] = array('e',$item['rate'],'chevere','Tarifa Chevere');
			}
			if($item['rateType']=='PRIMERA_CLASE' && $item['rate']!=0)
			{
				$countRates['pc'] = array('p',$item['rate'],'first-class','Tarifa Primera Clase');
			}
			//Blocked Chairs
			if($item['homologatedSeatState']=='V')
			{
				$block = $item['row'].'_'.$item['column'];
				$countBlocked[] = $block;
			}
			//First Floor
			if($item['floorNumber']==1)
			{
				$countRowsFirstFloor[] = $item['row'];
				if($item['column']==1)
				{
					if(trim($item['elementCode'])=='P' && $item['row']==1)
					{
						$varMapFirstFloor .= 'p[conductor';
					}
					if(trim($item['elementCode'])=='C')
					{
						$varMapFirstFloor .= 'p[conductor';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapFirstFloor .= 'p[bano';
					}
					if(trim($item['elementCode'])=='P')
					{
						$varMapFirstFloor .= '';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='PRIMERA_CLASE')
						{
							$varMapFirstFloor .= 'p';
						}
						if($item['rateType']=='COMODO')
						{
							$varMapFirstFloor .= 'c';
						}
					}
				}
				if($item['column']==2)
				{
					if(trim($item['elementCode'])=='P')
					{
						$varMapFirstFloor .= '_';
					}
					if(trim($item['elementCode'])=='C')
					{
						$varMapFirstFloor .= ',conductor]:';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapFirstFloor .= ',bano]';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='PRIMERA_CLASE')
						{
							$varMapFirstFloor .= 'p';
						}
						if($item['rateType']=='COMODO')
						{
							$varMapFirstFloor .= 'c';
						}
					}
				}
				if($item['column']==3)
				{
					if(trim($item['elementCode'])=='P' || trim($item['elementCode'])=='C')
					{
						$varMapFirstFloor .= '_';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='PRIMERA_CLASE')
						{
							$varMapFirstFloor .= 'p';
						}
						if($item['rateType']=='COMODO')
						{
							$varMapFirstFloor .= 'c';
						}
					}
				}
				if($item['column']==4)
				{
					if(trim($item['elementCode'])=='P')
					{
						$varMapFirstFloor .= '';
					}
					if(trim($item['elementCode'])=='V')
					{
						$varMapFirstFloor .= '_';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='PRIMERA_CLASE')
						{
							$varMapFirstFloor .= 'p';
						}
						if($item['rateType']=='COMODO')
						{
							$varMapFirstFloor .= 'c';
						}
					}
				}
				if($item['column']==5)
				{
					if(trim($item['elementCode'])=='C')
					{
						$varMapFirstFloor .= 'p[conductor';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapFirstFloor .= 'p[bano';
					}
					if(trim($item['elementCode'])=='V' && $item['row']==1)
					{
						$varMapFirstFloor .= '_p[escalera1';
					}
					if(trim($item['elementCode'])=='V')
					{
						$varMapFirstFloor .= '';
					}
					if(trim($item['elementCode'])=='U')
					{
						$varMapFirstFloor .= '_p[escalera1';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='PRIMERA_CLASE')
						{
							$varMapFirstFloor .= 'p';
						}
						if($item['rateType']=='COMODO')
						{
							$varMapFirstFloor .= 'c';
						}
					}
				}
				if($item['column']==6)
				{
					if(trim($item['elementCode'])=='C')
					{
						$varMapFirstFloor .= ',conductor]';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapFirstFloor .= ',bano]';
					}
					if(trim($item['elementCode'])=='V' && $item['row']==1)
					{
						$varMapFirstFloor .= ',escalera1]';
					}
					if(trim($item['elementCode'])=='U')
					{
						$varMapFirstFloor .= ',escalera1]';
					}
					if(trim($item['elementCode'])=='P')
					{
						$varMapFirstFloor .= '';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='PRIMERA_CLASE')
						{
							$varMapFirstFloor .= 'p';
						}
						if($item['rateType']=='COMODO')
						{
							$varMapFirstFloor .= 'c';
						}
					}
					$varMapFirstFloor .= '_end';
				}
			}
			//Second Floor
			elseif($item['floorNumber']==2 )
			{
				$countRowsSecondFloor[] = $item['row'];
				if($item['column']==1)
				{
					if(trim($item['elementCode'])=='C')
					{
						$varMapSecondFloor .= 'p[conductor';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapSecondFloor .= 'p[bano';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='COMODO')
						{
							$varMapSecondFloor .= 'c';
						}
					}
				}
				if($item['column']==2)
				{
					if(trim($item['elementCode'])=='C')
					{
						$varMapSecondFloor .= ',conductor]:';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapSecondFloor .= ',bano]';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='COMODO')
						{
							$varMapSecondFloor .= 'c';
						}
					}
				}
				if($item['column']==3)
				{
					if(trim($item['elementCode'])=='P')
					{
						$varMapSecondFloor .= '_';
					}
				}
				if($item['column']==4)
				{
					if(trim($item['elementCode'])=='P')
					{
						$varMapSecondFloor .= '';
					}
				}
				if($item['column']==5)
				{
					if(trim($item['elementCode'])=='C')
					{
						$varMapSecondFloor .= 'p[conductor';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapSecondFloor .= 'p[bano';
					}
					if(trim($item['elementCode'])=='V')
					{
						$varMapSecondFloor .= '';
					}
					if(trim($item['elementCode'])=='P')
					{
						$varMapSecondFloor .= '';
					}
					if(trim($item['elementCode'])=='E')
					{
						$varMapSecondFloor .= 'p[escalera1';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='COMODO')
						{
							$varMapSecondFloor .= 'c';
						}
					}
				}
				if($item['column']==6)
				{
					if(trim($item['elementCode'])=='C')
					{
						$varMapSecondFloor .= ',conductor]';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapSecondFloor .= ',bano]';
					}
					if(trim($item['elementCode'])=='V')
					{
						$varMapSecondFloor .= '';
					}
					if(trim($item['elementCode'])=='P')
					{
						$varMapSecondFloor .= '';
					}
					if(trim($item['elementCode'])=='E')
					{
						$varMapSecondFloor .= ',escalera1]';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='COMODO')
						{
							$varMapSecondFloor .= 'c';
						}
					}
					$varMapSecondFloor .= '_end';
				}
			}
			else
			{
				$varMapSecondFloor = '0';
			}
		}
		
		//I make the variables to send
		//Make the First Floor & Second
		$varEnd = explode("_end",$varMapFirstFloor);
		$varChairsFirstFloor = array();
		for ($i=0; $i < count($varEnd); $i++) 
		{ 
			$varChairsFirstFloor[] = $varEnd[$i];
		}
		if($varMapSecondFloor!='0')
		{
			$varEndS = explode("_end",$varMapSecondFloor);
			$varChairsSecondFloor = array();
			for ($j=0; $j < count($varEndS); $j++) 
			{ 
				$varChairsSecondFloor[] = $varEndS[$j];
			}
			//$varColumns = ["A", "B", "", "C","D"];
			//$varColumnsS = ["E", "F", "", "G"];
		}
		else
		{
			//$varColumns = ["A", "B", "", "C","D"];
			//$varColumnsS = [];
			$varChairsSecondFloor = 0;
		}
		//End of the FirstFloor
		//Make the Columns
		//$varColumns = ["A", "B", "", "C","D"];
		//End of creare columns
		//Make the rows
		$varRows = array();
		$varRowsS = array();
		$varColumns = array();
		$varColumnsS = array();
		$countRowsFirst = array_unique($countRowsFirstFloor);
		$countRowsFF = count($countRowsFirst);
		for($i=0; $i<=$countRowsFF;$i++)
		{
			if($tripService=="9")
			{
				if($i<2)
				{
					$varRows[] = "00";
				}
				else
				{
					$k = $i-1;
					$varRows[] = "0".$k;
				}
			}
			else if($tripService=="2")
			{
				if($i==0)
				{
					$k = 1;
					$varRows[] = "0".$k;
				}
				else
				{
					$varRows[] = "0".$i;
				}
			}
			else
			{
				if($i<10)
				{
					$varRows[] = "0".$i;
				}
				else
				{
					$varRows[] = "".$i;
				}
			}
		}
		if(count($countRowsSecondFloor)!=0 && $tripService!=2)
		{
			$countRowsSecond = array_unique($countRowsSecondFloor);
			$countRowsSF = count($countRowsSecond);
			for($j=1; $j<=$countRowsSF; $j++)
			{
				if($j<10)
				{
					$varRowsS[] = "0".$j;
				}
				else
				{
					$varRowsS[] = "".$j;
				}
			}
			$varColumns = ["E", "F", "", "G"];
			$varColumnsS = ["A", "B", "", "C", "D"];
		}
		elseif(count($countRowsSecondFloor)==0 && $tripService==2)
		{
			$varColumns = ["A", "B", "C", "D", ""];
			$varColumnsS[] = 0;
			$varRowsS[] = 0;
		}
		else
		{
			$varColumns = ["A", "B", "", "C", "D"];
			$varColumnsS[] = 0;
			$varRowsS[] = 0;
		}
		//End of create rows
		
		//Make the rates
		$numItems = count($countRates);
		$i = 0;
		$varRates = '{';
		foreach ($countRates as $key => $value) {
			if(++$i === $numItems) 
			{
				$varRates .= ' "'.$value[0].'" : { "price" : '.$value[1].', "classes" : "'.$value[2].'", "category" : "'.$value[3].'" } ';
			}
			else
			{
				$varRates .= ' "'.$value[0].'" : { "price" : '.$value[1].', "classes" : "'.$value[2].'", "category" : "'.$value[3].'" }, ';
			}
		}
		$varRates .= '}';
		//End of create rates
		
		return array(
			'#theme' => 'page_selection_template',
			'#tripsCitiesData' => ['idOriginCity'=> $saleAgencyId, 'idDestinationCity'=>$destinationAgencyId, 'originCity'=>$saleAgencyName, 'destinationCity'=>$destinationAgencyName, 'tripService'=>$tripService],
			'#tripsDatesData' => ['tripDateGo'=>$tripDateGo],
			'#attached' => ['library' => ['bootstrap_bolivariano_subtheme/seat-charts'], 'drupalSettings'=> ['bootstrap_bolivariano_subtheme' => ['seatCharts' => ['countColumnsFF' => $varColumns, 'countColumnsSF' => $varColumnsS, 'countRowsFF' => $varRows, 'countRowsSF' => $varRowsS, 'countRates' => $varRates, 'countBlocked' => $countBlocked, 'chairsMapFirstFloor' => $varChairsFirstFloor, 'chairsMapSecondFloor' => $varChairsSecondFloor]]]],
		);
	}

		/*Page Reservation*/
	public function page_selection_back($saleAgencyId,$saleAgencyName,$destinationAgencyId,$destinationAgencyName,$tripDateGo,$tripKeyGo,$tripCapacityGo,$tripServiceGo,$tripDateBack,$tripKeyBack,$tripCapacityBack,$tripServiceBack) {
		
		$response = $this->managerServices->getToken();
		if($response['statusName']=='OK')
		{
			$tokenId = $response['data']['token'];
			$dateExpires = $response['data']['expires'];
		}
		$saleAgencyId = (int)$saleAgencyId;
		$destinationAgencyId = (int)$destinationAgencyId;
		$tripKeyGo = (int)$tripKeyGo;
		$tripCapacityGo = (int)$tripCapacity;
		
		/*Back*/
		$tripKeyBack = (int)$tripKeyBack;
		$tripCapacityBack = (int)$tripCapacityBack;
		/*End*/
		/*Services for search Go Travel*/
		$mapType = 1;
		$companyId = 1;
		$responsePrintBusGo = $this->managerServices->getPrintBusMap($tokenId,$tripKeyGo,$tripCapacityGo,$saleAgencyId,$destinationAgencyId);
		$responseTripChairsGo = $this->managerServices->getAvailableTripChairs($tokenId,$mapType,$companyId,$tripKeyGo,$saleAgencyId,$destinationAgencyId);
		if($responsePrintBusGo['statusName']=='OK' && $responseTripChairsGo['statusName']=='OK')
		{
			$responseTripChairsGo = $responseTripChairsGo['data'];
			$responsePrintBusGo = $responsePrintBusGo['data'];
		}
		/*End*/
		/*Services for search Back Travel*/
		$responsePrintBusBack = $this->managerServices->getPrintBusMap($tokenId,$tripKeyBack,$tripCapacityBack,$saleAgencyId,$destinationAgencyId);
		$responseTripChairsBack = $this->managerServices->getAvailableTripChairs($tokenId,$mapType,$companyId,$tripKeyBack,$saleAgencyId,$destinationAgencyId);
		if($responsePrintBusBack['statusName']=='OK' && $responseTripChairsBack['statusName']=='OK')
		{
			$responseTripChairsBack = $responseTripChairsBack['data'];
			$responsePrintBusBack = $responsePrintBusBack['data'];
		}
		/*End*/
		//Foreach Go
		$countBlockedGo = array();
		foreach ($responseTripChairsGo as $key => $item)
		{
			//Count Many Rows to draw
			//Rates for Chair Selection
			if($item['rateType']=='INCREIBLE' && $item['rate']!=0)
			{
				$countRatesGo['in'] = array('i',$item['rate'],'increible','Tarifa Increible');
			}
			if($item['rateType']=='COMODO' && $item['rate']!=0)
			{
				$countRatesGo['co'] = array('c',$item['rate'],'comoda','Tarifa Comoda');
			}
			if($item['rateType']=='CHEVERE' && $item['rate']!=0)
			{
				$countRatesGo['ce'] = array('e',$item['rate'],'chevere','Tarifa Chevere');
			}
			if($item['rateType']=='PRIMERA_CLASE' && $item['rate']!=0)
			{
				$countRatesGo['pc'] = array('p',$item['rate'],'first-class','Tarifa Primera Clase');
			}
			//Blocked Chairs
			if($item['homologatedSeatState']=='V')
			{
				$block = $item['row'].'_'.$item['column'];
				$countBlockedGo[] = $block;
			}
			//First Floor
			if($item['floorNumber']==1)
			{
				$countRowsFirstFloorGo[] = $item['row'];
				if($item['column']==1)
				{
					if(trim($item['elementCode'])=='P' && $item['row']==1)
					{
						$varMapFirstFloorGo .= 'p[conductor';
					}
					if(trim($item['elementCode'])=='C')
					{
						$varMapFirstFloorGo .= 'p[conductor';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapFirstFloorGo .= 'p[bano';
					}
					if(trim($item['elementCode'])=='P')
					{
						$varMapFirstFloorGo .= '';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='PRIMERA_CLASE')
						{
							$varMapFirstFloorGo .= 'p';
						}
						if($item['rateType']=='COMODO')
						{
							$varMapFirstFloorGo .= 'c';
						}
					}
				}
				if($item['column']==2)
				{
					if(trim($item['elementCode'])=='P')
					{
						$varMapFirstFloorGo .= '_';
					}
					if(trim($item['elementCode'])=='C')
					{
						$varMapFirstFloorGo .= ',conductor]:';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapFirstFloorGo .= ',bano]';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='PRIMERA_CLASE')
						{
							$varMapFirstFloorGo .= 'p';
						}
						if($item['rateType']=='COMODO')
						{
							$varMapFirstFloorGo .= 'c';
						}
					}
				}
				if($item['column']==3)
				{
					if(trim($item['elementCode'])=='P' || trim($item['elementCode'])=='C')
					{
						$varMapFirstFloorGo .= '_';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='PRIMERA_CLASE')
						{
							$varMapFirstFloorGo .= 'p';
						}
						if($item['rateType']=='COMODO')
						{
							$varMapFirstFloorGo .= 'c';
						}
					}
				}
				if($item['column']==4)
				{
					if(trim($item['elementCode'])=='P')
					{
						$varMapFirstFloorGo .= '';
					}
					if(trim($item['elementCode'])=='V')
					{
						$varMapFirstFloorGo .= '_';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='PRIMERA_CLASE')
						{
							$varMapFirstFloorGo .= 'p';
						}
						if($item['rateType']=='COMODO')
						{
							$varMapFirstFloorGo .= 'c';
						}
					}
				}
				if($item['column']==5)
				{
					if(trim($item['elementCode'])=='C')
					{
						$varMapFirstFloorGo .= 'p[conductor';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapFirstFloorGo .= 'p[bano';
					}
					if(trim($item['elementCode'])=='V' && $item['row']==1)
					{
						$varMapFirstFloorGo .= '_p[escalera1';
					}
					if(trim($item['elementCode'])=='V')
					{
						$varMapFirstFloorGo .= '';
					}
					if(trim($item['elementCode'])=='U')
					{
						$varMapFirstFloorGo .= '_p[escalera1';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='PRIMERA_CLASE')
						{
							$varMapFirstFloorGo .= 'p';
						}
						if($item['rateType']=='COMODO')
						{
							$varMapFirstFloorGo .= 'c';
						}
					}
				}
				if($item['column']==6)
				{
					if(trim($item['elementCode'])=='C')
					{
						$varMapFirstFloorGo .= ',conductor]';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapFirstFloorGo .= ',bano]';
					}
					if(trim($item['elementCode'])=='V' && $item['row']==1)
					{
						$varMapFirstFloorGo .= ',escalera1]';
					}
					if(trim($item['elementCode'])=='U')
					{
						$varMapFirstFloorGo .= ',escalera1]';
					}
					if(trim($item['elementCode'])=='P')
					{
						$varMapFirstFloorGo .= '';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='PRIMERA_CLASE')
						{
							$varMapFirstFloorGo .= 'p';
						}
						if($item['rateType']=='COMODO')
						{
							$varMapFirstFloorGo .= 'c';
						}
					}
					$varMapFirstFloorGo .= '_end';
				}
			}
			//Second Floor
			elseif($item['floorNumber']==2 )
			{
				$countRowsSecondFloorGo[] = $item['row'];
				if($item['column']==1)
				{
					if(trim($item['elementCode'])=='C')
					{
						$varMapSecondFloorGo .= 'p[conductor';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapSecondFloorGo .= 'p[bano';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='COMODO')
						{
							$varMapSecondFloorGo .= 'c';
						}
					}
				}
				if($item['column']==2)
				{
					if(trim($item['elementCode'])=='C')
					{
						$varMapSecondFloorGo .= ',conductor]:';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapSecondFloorGo .= ',bano]';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='COMODO')
						{
							$varMapSecondFloorGo .= 'c';
						}
					}
				}
				if($item['column']==3)
				{
					if(trim($item['elementCode'])=='P')
					{
						$varMapSecondFloorGo .= '_';
					}
				}
				if($item['column']==4)
				{
					if(trim($item['elementCode'])=='P')
					{
						$varMapSecondFloorGo .= '';
					}
				}
				if($item['column']==5)
				{
					if(trim($item['elementCode'])=='C')
					{
						$varMapSecondFloorGo .= 'p[conductor';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapSecondFloorGo .= 'p[bano';
					}
					if(trim($item['elementCode'])=='V')
					{
						$varMapSecondFloorGo .= '';
					}
					if(trim($item['elementCode'])=='P')
					{
						$varMapSecondFloorGo .= '';
					}
					if(trim($item['elementCode'])=='E')
					{
						$varMapSecondFloorGo .= 'p[escalera1';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='COMODO')
						{
							$varMapSecondFloorGo .= 'c';
						}
					}
				}
				if($item['column']==6)
				{
					if(trim($item['elementCode'])=='C')
					{
						$varMapSecondFloorGo .= ',conductor]';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapSecondFloorGo .= ',bano]';
					}
					if(trim($item['elementCode'])=='V')
					{
						$varMapSecondFloorGo .= '';
					}
					if(trim($item['elementCode'])=='P')
					{
						$varMapSecondFloorGo .= '';
					}
					if(trim($item['elementCode'])=='E')
					{
						$varMapSecondFloorGo .= ',escalera1]';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='COMODO')
						{
							$varMapSecondFloorGo .= 'c';
						}
					}
					$varMapSecondFloorGo .= '_end';
				}
			}
			else
			{
				$varMapSecondFloorGo = '0';
			}
		}
		
		//I make the variables to send
		//Make the First Floor & Second
		$varEndGo = explode("_end",$varMapFirstFloorGo);
		$varChairsFirstFloorGo = array();
		for ($i=0; $i < count($varEndGo); $i++) 
		{ 
			$varChairsFirstFloorGo[] = $varEndGo[$i];
		}
		if($varMapSecondFloorGo!='0')
		{
			$varEndGoS = explode("_end",$varMapSecondFloorGo);
			$varChairsSecondFloorGo = array();
			for ($j=0; $j < count($varEndGoS); $j++) 
			{ 
				$varChairsSecondFloorGo[] = $varEndGoS[$j];
			}
			//$varColumns = ["A", "B", "", "C","D"];
			//$varColumnsS = ["E", "F", "", "G"];
		}
		else
		{
			//$varColumns = ["A", "B", "", "C","D"];
			//$varColumnsS = [];
			$varChairsSecondFloorGo = 0;
		}
		//End of the FirstFloor
		//Make the Columns
		//$varColumns = ["A", "B", "", "C","D"];
		//End of creare columns
		//Make the rows
		$varRowsGo = array();
		$varRowsGoS = array();
		$varColumnsGo = array();
		$varColumnsGoS = array();
		$countRowsFirstGo = array_unique($countRowsFirstFloorGo);
		$countRowsFFGo = count($countRowsFirstGo);
		for($i=0; $i<=$countRowsFFGo;$i++)
		{
			if($tripServiceGo=="9")
			{
				if($i<2)
				{
					$varRowsGo[] = "00";
				}
				else
				{
					$k = $i-1;
					$varRowsGo[] = "0".$k;
				}
			}
			else if($tripServiceGo=="2")
			{
				if($i==0)
				{
					$k = 1;
					$varRowsGo[] = "0".$k;
				}
				else
				{
					$varRowsGo[] = "0".$i;
				}
			}
			else
			{
				if($i<10)
				{
					$varRowsGo[] = "0".$i;
				}
				else
				{
					$varRowsGo[] = "".$i;
				}
			}
		}
		if(count($countRowsSecondFloorGo)!=0 && $tripServiceGo!=2)
		{
			$countRowsSecondGo = array_unique($countRowsSecondFloorGo);
			$countRowsSFGo = count($countRowsSecondGo);
			for($j=1; $j<=$countRowsSFGo; $j++)
			{
				if($j<10)
				{
					$varRowsGoS[] = "0".$j;
				}
				else
				{
					$varRowsGoS[] = "".$j;
				}
			}
			$varColumnsGo = ["E", "F", "", "G"];
			$varColumnsGoS = ["A", "B", "", "C", "D"];
		}
		elseif(count($countRowsSecondFloorGo)==0 && $tripServiceGo==2)
		{
			$varColumnsGo = ["A", "B", "C", "D", ""];
			$varColumnsGoS[] = 0;
			$varRowsGoS[] = 0;
		}
		else
		{
			$varColumnsGo = ["A", "B", "", "C", "D"];
			$varColumnsGoS[] = 0;
			$varRowsGoS[] = 0;
		}
		//End of create rows
		
		//Make the rates
		$numItems = count($countRatesGo);
		$i = 0;
		$varRatesGo = '{';
		foreach ($countRatesGo as $key => $value) {
			if(++$i === $numItems) 
			{
				$varRatesGo .= ' "'.$value[0].'" : { "price" : '.$value[1].', "classes" : "'.$value[2].'", "category" : "'.$value[3].'" } ';
			}
			else
			{
				$varRatesGo .= ' "'.$value[0].'" : { "price" : '.$value[1].', "classes" : "'.$value[2].'", "category" : "'.$value[3].'" }, ';
			}
		}
		$varRatesGo .= '}';
		//End of create rates
		/*End of Go Travel */
		//Create a Back Travel
		$countBlockedBack = array();
		foreach ($responseTripChairsBack as $key => $item)
		{
			//Count Many Rows to draw
			//Rates for Chair Selection
			if($item['rateType']=='INCREIBLE' && $item['rate']!=0)
			{
				$countRatesBack['in'] = array('i',$item['rate'],'increible','Tarifa Increible');
			}
			if($item['rateType']=='COMODO' && $item['rate']!=0)
			{
				$countRatesBack['co'] = array('c',$item['rate'],'comoda','Tarifa Comoda');
			}
			if($item['rateType']=='CHEVERE' && $item['rate']!=0)
			{
				$countRatesBack['ce'] = array('e',$item['rate'],'chevere','Tarifa Chevere');
			}
			if($item['rateType']=='PRIMERA_CLASE' && $item['rate']!=0)
			{
				$countRatesBack['pc'] = array('p',$item['rate'],'first-class','Tarifa Primera Clase');
			}
			//Blocked Chairs
			if($item['homologatedSeatState']=='V')
			{
				$block = $item['row'].'_'.$item['column'];
				$countBlockedBack[] = $block;
			}
			//First Floor
			if($item['floorNumber']==1)
			{
				$countRowsFirstFloorBack[] = $item['row'];
				if($item['column']==1)
				{
					if(trim($item['elementCode'])=='P' && $item['row']==1)
					{
						$varMapFirstFloorBack .= 'p[conductor';
					}
					if(trim($item['elementCode'])=='C')
					{
						$varMapFirstFloorBack .= 'p[conductor';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapFirstFloorBack .= 'p[bano';
					}
					if(trim($item['elementCode'])=='P')
					{
						$varMapFirstFloorBack .= '';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='PRIMERA_CLASE')
						{
							$varMapFirstFloorBack .= 'p';
						}
						if($item['rateType']=='COMODO')
						{
							$varMapFirstFloorBack .= 'c';
						}
					}
				}
				if($item['column']==2)
				{
					if(trim($item['elementCode'])=='P')
					{
						$varMapFirstFloorBack .= '_';
					}
					if(trim($item['elementCode'])=='C')
					{
						$varMapFirstFloorBack .= ',conductor]:';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapFirstFloorBack .= ',bano]';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='PRIMERA_CLASE')
						{
							$varMapFirstFloorBack .= 'p';
						}
						if($item['rateType']=='COMODO')
						{
							$varMapFirstFloorBack .= 'c';
						}
					}
				}
				if($item['column']==3)
				{
					if(trim($item['elementCode'])=='P' || trim($item['elementCode'])=='C')
					{
						$varMapFirstFloorBack .= '_';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='PRIMERA_CLASE')
						{
							$varMapFirstFloorBack .= 'p';
						}
						if($item['rateType']=='COMODO')
						{
							$varMapFirstFloorBack .= 'c';
						}
					}
				}
				if($item['column']==4)
				{
					if(trim($item['elementCode'])=='P')
					{
						$varMapFirstFloorBack .= '';
					}
					if(trim($item['elementCode'])=='V')
					{
						$varMapFirstFloorBack .= '_';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='PRIMERA_CLASE')
						{
							$varMapFirstFloorBack .= 'p';
						}
						if($item['rateType']=='COMODO')
						{
							$varMapFirstFloorBack .= 'c';
						}
					}
				}
				if($item['column']==5)
				{
					if(trim($item['elementCode'])=='C')
					{
						$varMapFirstFloorBack .= 'p[conductor';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapFirstFloorBack .= 'p[bano';
					}
					if(trim($item['elementCode'])=='V' && $item['row']==1)
					{
						$varMapFirstFloorBack .= '_p[escalera1';
					}
					if(trim($item['elementCode'])=='V')
					{
						$varMapFirstFloorBack .= '';
					}
					if(trim($item['elementCode'])=='U')
					{
						$varMapFirstFloorBack .= '_p[escalera1';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='PRIMERA_CLASE')
						{
							$varMapFirstFloorBack .= 'p';
						}
						if($item['rateType']=='COMODO')
						{
							$varMapFirstFloorBack .= 'c';
						}
					}
				}
				if($item['column']==6)
				{
					if(trim($item['elementCode'])=='C')
					{
						$varMapFirstFloorBack .= ',conductor]';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapFirstFloorBack .= ',bano]';
					}
					if(trim($item['elementCode'])=='V' && $item['row']==1)
					{
						$varMapFirstFloorBack .= ',escalera1]';
					}
					if(trim($item['elementCode'])=='U')
					{
						$varMapFirstFloorBack .= ',escalera1]';
					}
					if(trim($item['elementCode'])=='P')
					{
						$varMapFirstFloorBack .= '';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='PRIMERA_CLASE')
						{
							$varMapFirstFloorBack .= 'p';
						}
						if($item['rateType']=='COMODO')
						{
							$varMapFirstFloorBack .= 'c';
						}
					}
					$varMapFirstFloorBack .= '_end';
				}
			}
			//Second Floor
			elseif($item['floorNumber']==2 )
			{
				$countRowsSecondFloorBack[] = $item['row'];
				if($item['column']==1)
				{
					if(trim($item['elementCode'])=='C')
					{
						$varMapSecondFloorBack .= 'p[conductor';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapSecondFloorBack .= 'p[bano';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='COMODO')
						{
							$varMapSecondFloorBack .= 'c';
						}
					}
				}
				if($item['column']==2)
				{
					if(trim($item['elementCode'])=='C')
					{
						$varMapSecondFloorBack .= ',conductor]:';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapSecondFloorBack .= ',bano]';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='COMODO')
						{
							$varMapSecondFloorBack .= 'c';
						}
					}
				}
				if($item['column']==3)
				{
					if(trim($item['elementCode'])=='P')
					{
						$varMapSecondFloorBack .= '_';
					}
				}
				if($item['column']==4)
				{
					if(trim($item['elementCode'])=='P')
					{
						$varMapSecondFloorBack .= '';
					}
				}
				if($item['column']==5)
				{
					if(trim($item['elementCode'])=='C')
					{
						$varMapSecondFloorBack .= 'p[conductor';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapSecondFloorBack .= 'p[bano';
					}
					if(trim($item['elementCode'])=='V')
					{
						$varMapSecondFloorBack .= '';
					}
					if(trim($item['elementCode'])=='P')
					{
						$varMapSecondFloorBack .= '';
					}
					if(trim($item['elementCode'])=='E')
					{
						$varMapSecondFloorBack .= 'p[escalera1';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='COMODO')
						{
							$varMapSecondFloorBack .= 'c';
						}
					}
				}
				if($item['column']==6)
				{
					if(trim($item['elementCode'])=='C')
					{
						$varMapSecondFloorBack .= ',conductor]';
					}
					if(trim($item['elementCode'])=='B')
					{
						$varMapSecondFloorBack .= ',bano]';
					}
					if(trim($item['elementCode'])=='V')
					{
						$varMapSecondFloorBack .= '';
					}
					if(trim($item['elementCode'])=='P')
					{
						$varMapSecondFloorBack .= '';
					}
					if(trim($item['elementCode'])=='E')
					{
						$varMapSecondFloorBack .= ',escalera1]';
					}
					if(trim($item['elementCode'])=='S')
					{
						if($item['rateType']=='COMODO')
						{
							$varMapSecondFloorBack .= 'c';
						}
					}
					$varMapSecondFloorBack .= '_end';
				}
			}
			else
			{
				$varMapSecondFloorBack = '0';
			}
		}
		
		//I make the variables to send
		//Make the First Floor & Second
		$varEndBack = explode("_end",$varMapFirstFloorBack);
		$varChairsFirstFloorBack = array();
		for ($i=0; $i < count($varEndBack); $i++) 
		{ 
			$varChairsFirstFloorBack[] = $varEndBack[$i];
		}
		if($varMapSecondFloorBack!='0')
		{
			$varEndBackS = explode("_end",$varMapSecondFloorBack);
			$varChairsSecondFloorBack = array();
			for ($j=0; $j < count($varEndBackS); $j++) 
			{ 
				$varChairsSecondFloorBack[] = $varEndBackS[$j];
			}
			//$varColumns = ["A", "B", "", "C","D"];
			//$varColumnsS = ["E", "F", "", "G"];
		}
		else
		{
			//$varColumns = ["A", "B", "", "C","D"];
			//$varColumnsS = [];
			$varChairsSecondFloorBack = 0;
		}
		//End of the FirstFloor
		//Make the Columns
		//$varColumns = ["A", "B", "", "C","D"];
		//End of creare columns
		//Make the rows
		$varRowsBack = array();
		$varRowsBackS = array();
		$varColumnsBack = array();
		$varColumnsBackS = array();
		$countRowsFirstBack = array_unique($countRowsFirstFloorBack);
		$countRowsFFBack = count($countRowsFirstBack);
		for($i=0; $i<=$countRowsFFBack; $i++)
		{
			if($tripServiceBack=="9")
			{
				if($i<2)
				{
					$varRowsBack[] = "00";
				}
				else
				{
					$k = $i-1;
					$varRowsBack[] = "0".$k;
				}
			}
			else if($tripServiceBack=="2")
			{
				if($i==0)
				{
					$k = 1;
					$varRowsBack[] = "0".$k;
				}
				else
				{
					$varRowsBack[] = "0".$i;
				}
			}
			else
			{
				if($i<10)
				{
					$varRowsBack[] = "0".$i;
				}
				else
				{
					$varRowsBack[] = "".$i;
				}
			}
		}
		if(count($countRowsSecondFloorBack)!=0 && $tripServiceBack!=2)
		{
			$countRowsSecondBack = array_unique($countRowsSecondFloorBack);
			$countRowsSFBack = count($countRowsSecondBack);
			for($j=0; $j<=$countRowsSFBack; $j++)
			{
				if($j<10)
				{
					$varRowsBackS[] = "0".$j;
				}
				else
				{
					$varRowsBackS[] = "".$j;
				}
			}
			$varColumnsBack = ["E", "F", "", "G"];
			$varColumnsBackS = ["A", "B", "", "C", "D"];
		}
		elseif(count($countRowsSecondFloorBack)==0 && $tripServiceBack==2)
		{
			$varColumnsBack = ["A", "B", "C", "D", ""];
			$varColumnsBackS[] = 0;
			$varRowsBackS[] = 0;
		}
		else
		{
			$varColumnsBack = ["A", "B", "", "C", "D"];
			$varColumnsBackS[] = 0;
			$varRowsBackS[] = 0;
		}
		//End of create rows
		
		//Make the rates
		$numItems = count($countRatesBack);
		$i = 0;
		$varRatesBack = '{';
		foreach ($countRatesBack as $key => $value) {
			if(++$i === $numItems) 
			{
				$varRatesBack .= ' "'.$value[0].'" : { "price" : '.$value[1].', "classes" : "'.$value[2].'", "category" : "'.$value[3].'" } ';
			}
			else
			{
				$varRatesBack .= ' "'.$value[0].'" : { "price" : '.$value[1].', "classes" : "'.$value[2].'", "category" : "'.$value[3].'" }, ';
			}
		}
		$varRatesBack .= '}';
		//End of create rates
		/*End of Back Travel */
		/*End*/
		$tripBackT ='y';

		return array(
			'#theme' => 'page_selection_template',
			'#tripsCitiesData' => ['idOriginCity'=> $saleAgencyId, 'idDestinationCity'=>$destinationAgencyId, 'originCity'=>$saleAgencyName, 'destinationCity'=>$destinationAgencyName, 'tripService'=>$tripServiceGo, 'tripServiceB'=>$tripServiceBack],
			'#tripsDatesData' => ['tripDateGo'=>$tripDateGo, 'tripDateBack'=>$tripDateBack],
			'#attached' => ['library' => ['bootstrap_bolivariano_subtheme/seat-charts'], 'drupalSettings'=> ['bootstrap_bolivariano_subtheme' => ['seatCharts' => ['countColumnsFF' => $varColumnsGo, 'countColumnsSF' => $varColumnsGoS, 'countRowsFF' => $varRowsGo, 'countRowsSF' => $varRowsGoS, 'countRates' => $varRatesGo, 'countBlocked' => $countBlockedGo, 'chairsMapFirstFloor' => $varChairsFirstFloorGo, 'chairsMapSecondFloor' => $varChairsSecondFloorGo,  /*back*/ 'tripBackT' => $tripBackT, 'countColumnsFFB' => $varColumnsBack, 'countColumnsSFB' => $varColumnsBackS, 'countRowsFFB' => $varRowsBack, 'countRowsSFB' => $varRowsBackS, 'countRatesB' => $varRatesBack, 'countBlockedB' => $countBlockedBack, 'chairsMapFirstFloorB' => $varChairsFirstFloorBack, 'chairsMapSecondFloorB' => $varChairsSecondFloorBack]]]],
		);
	}

	/*Page Checkout*/
	public function page_checkout() {
		
		$response = $this->managerServices->getToken();
		if($response['statusName']=='OK')
		{
			foreach($response as $key => $value) 
			{
				$tokenId = $value['token'];
			    $dateExpires = $value['expires'];
			}
		}
		$mapType = 1;
		$companyId = 1;
		$tripKey = 4254063;
		$saleAgencyId = 1;
		$destinationAgencyId = 2;
		
		$responseTripChairs = $this->managerServices->getAvailableTripChairs($tokenId,$mapType,$companyId,$tripKey,$saleAgencyId,$destinationAgencyId);
		//print_r($responseTripChairs);
		//die();

		if($responseTripChairs['statusName']=='OK')
		{
			$responseTripChairs = $responseTripChairs['data'];
		}
		return array(
			'#theme' => 'page_checkout_template',
			'#tripChairsData' => $responseTripChairs,
		);		
	}	

	/*Page Express Traveler*/
	public function page_express_traveler() {
		
		$response = $this->managerServices->getToken();
		if($response['statusName']=='OK')
		{
			foreach($response as $key => $value) 
			{
				$tokenId = $value['token'];
			    $dateExpires = $value['expires'];
			}
		}
		/*
		$mapType = 1;
		$companyId = 1;
		$tripKey = 4323576;
		$saleAgencyId = 1;
		$destinationAgencyId = 2;
		
		$responseTripChairs = $this->managerServices->getAvailableTripChairs($tokenId,$mapType,$companyId,$tripKey,$saleAgencyId,$destinationAgencyId);
		*/
		//print_r($responseTripChairs);
		//die();

		if($responseTripChairs['statusName']=='OK')
		{
			$responseTripChairs = $responseTripChairs['data'];
		}
		return array(
			'#theme' => 'page_express_traveler_template',
			'#expressTravelerData' => $responseTripChairs,
		);		
	}
	/*Page Agencies */
	public function page_agencies() {
		
		$query = \Drupal::entityQuery('node');
        $query->condition('status', 1);
        $query->condition('type', 'agencies');
        $query->sort('field_agency_city', 'ASC');
        $entity_ids = $query->execute();
        $responseCities = array();
        $responseDepts = array();
        $responseMapPoints = array();
        foreach ($entity_ids as $nid) {
        	$node = \Drupal::entityTypeManager()->getStorage('node')->load($nid);
        	
        	$responseCity = $node->get('field_agency_city')->getValue();
        	$responseDepartment = $node->get('field_agency_department')->getValue();
        	$responseLocations = $node->get('field_agency_location')->getValue();
        	$responseType = $node->get('field_agency_type')->getValue();
        	$responseCities[] = array($responseDepartment, $responseCity);
        	$responseDepts[] = $node->get('field_agency_department')->getValue();
        	$responseUrl = $node->get('field_agency_url')->getValue();
        	$responseMapPoints[] = array($responseLocations, $responseType, $responseCity, $responseDepartment, $responseUrl);
        }
		
		//print_r($responseMapPoints);
		//die();
		return array(
			'#theme' => 'page_agencies_template',
			'#cities' => $responseCities,
			'#idDepts' => $responseIdDepts,
			'#depts' => $responseDepts,
			'#locations' => $responseMapPoints,
		);		
	}
	/*Page Agencies Filter*/
	public function page_agencies_filter($departmentName,$cityName) {
		
		//echo $departmentName;
		//echo $cityName;
		//die();

		if($departmentName=='0' && $cityName!='0')
		{
			//echo "0";
			$query = \Drupal::entityQuery('node');
	        $query->condition('status', 1);
	        $query->condition('type', 'agencies');
	        $query->sort('field_agency_city', 'ASC');
	        $entity_ids = $query->execute();
	        $responseCities = array();
	        $responseDepts = array();
	        $responseMapPoints = array();
	        foreach ($entity_ids as $nid) {
	        	$node = \Drupal::entityTypeManager()->getStorage('node')->load($nid);
	        	
	        	$responseCity = $node->get('field_agency_city')->getValue();
	        	$responseDepartment = $node->get('field_agency_department')->getValue();
	        	$responseLocations = $node->get('field_agency_location')->getValue();
	        	$responseType = $node->get('field_agency_type')->getValue();
	        	$responseCities[] = array($responseDepartment, $responseCity);
	        	$responseDepts[] = $node->get('field_agency_department')->getValue();
	        	$responseUrl = $node->get('field_agency_url')->getValue();
	        	$responseMapPoints[] = array($responseLocations, $responseType, $responseCity, $responseDepartment, $responseUrl);
	        }
		}
		else
		{
			$responseCities = array();
	        $responseDepts = array();
	        $responseMapPoints = array();
	        $responseListAgencies = array();
	        $responseListMultiservices = array();
	        $responseDatamask = array("0"=>$departmentName,"1"=>$cityName);

			/* Data for the Filters */
			$queryF = \Drupal::entityQuery('node');
	        $queryF->condition('status', 1);
	        $queryF->condition('type', 'agencies');
	        $queryF->sort('field_agency_city', 'ASC');
	        $entity_idsF = $queryF->execute();
	        foreach ($entity_idsF as $nidF) {
	        	$nodeF = \Drupal::entityTypeManager()->getStorage('node')->load($nidF);
	        	/* All for make the Map */
	        	$responseCity = $nodeF->get('field_agency_city')->getValue();
	        	$responseDepartment = $nodeF->get('field_agency_department')->getValue();
	        	$responseCities[] = array($responseDepartment, $responseCity);
	        	$responseDepts[] = $nodeF->get('field_agency_department')->getValue();
	        }

	        /* Data for the Content */
			$query = \Drupal::entityQuery('node');
	        $query->condition('status', 1);
	        $query->condition('type', 'agencies');
	        $query->condition('field_agency_department', $departmentName);
	        $query->sort('field_agency_city', 'ASC');
			if($cityName!='0')
			{
				$query->condition('field_agency_city', $cityName);
			}
	        $entity_ids = $query->execute();
	        
	        foreach ($entity_ids as $nid) {
	        	$node = \Drupal::entityTypeManager()->getStorage('node')->load($nid);
	        	/* All for make the Map */
	        	$responseCity = $node->get('field_agency_city')->getValue();
	        	$responseDepartment = $node->get('field_agency_department')->getValue();
	        	$responseLocations = $node->get('field_agency_location')->getValue();
	        	$responseType = $node->get('field_agency_type')->getValue();
	        	$responseUrl = $node->get('field_agency_url')->getValue();
	        	$responseMapPoints[] = array($responseLocations, $responseType, $responseCity, $responseDepartment, $responseUrl);
	        	if($responseType[0]['value']!='M')
	        	{
	        		/* All to Make the List Agencies */
	        		$responseListAgencies[] = array("0"=>$node->get('field_agency_title')->getValue(),"1"=>$node->get('field_agency_address')->getValue(),"2"=>$node->get('field_agency_email')->getValue(),"3"=>$node->get('field_agency_phone')->getValue(),"4"=>$node->get('field_agency_schedule')->getValue(),"5"=>$node->get('field_agency_image_list')->entity->getFileUri(),"6"=>$node->get('field_agency_url')->getValue(),"7"=>$node->get('field_agency_city')->getValue(),"8"=>$node->get('field_agency_indicative')->getValue(),"9"=>$node->get('field_agency_extension')->getValue());
	        	}
	        	else
	        	{
	        		/* All to Make the List Multiservices */
	        		$responseListMultiservices[] = array("0"=>$node->get('field_agency_title')->getValue(),"1"=>$node->get('field_agency_address')->getValue(),"2"=>$node->get('field_agency_email')->getValue(),"3"=>$node->get('field_agency_phone')->getValue(),"4"=>$node->get('field_agency_schedule')->getValue(),"5"=>$node->get('field_agency_image_list')->entity->getFileUri(),"6"=>$node->get('field_agency_url')->getValue(),"7"=>$node->get('field_agency_city')->getValue(),"8"=>$node->get('field_agency_indicative')->getValue(),"9"=>$node->get('field_agency_extension')->getValue());
	        	}
	        }
		}
		return array(
				'#theme' => 'page_agencies_filter_template',
				'#cities' => $responseCities,
				'#idDepts' => $responseIdDepts,
				'#depts' => $responseDepts,
				'#locations' => $responseMapPoints,
				'#agenciesList' => $responseListAgencies,
				'#multiservicesList' => $responseListMultiservices,
				'#dataMask' => $responseDatamask,
			);	

	}
	/*Parametro Usuario*/
	public function page_user(UserInterface $user) {

		$variables['#cache']['max-age'] = 0;
      	$user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
      	$uid = $user->get('uid')->value;
      	$userName = $user->getUsername();
		$email = $user->getEmail();

		$response = $this->managerServices->getToken();
		if($response['statusName']=='OK')
		{
			$tokenId = $response['data']['token'];
			$dateExpires = $response['data']['expires'];
		}
		$responseUserCreate = $this->managerServices->getValidateClientData($tokenId,$uid);
	    if($responseUserCreate['statusName']=='OK')
	    {
	        foreach($responseUserCreate as $key => $value)
	        {
	        	$telephone = $value['clientTelephoneNumber'];
	        	$telephoneAditional = $value['clientTelephone2Number'];
	        	$address = $value['clientAddress'];
	        }
	    }
		/*Period*/
      	$period = date("Y-m"); 
		$responsePoints = $this->managerServices->getPointsExpressClient($tokenId,$uid,$period);
	     if($responsePoints['statusName']=='OK')
	     {
	        foreach($responsePoints as $key => $value) 
	        {
	        	$points = $value['points'];
	        }
	    }
	    $responseReservations = $this->managerServices->getReservationCount($tokenId,$uid,'999');
	    if($responseReservations['statusName']=='OK')
	    {
	        foreach($responseReservations as $key => $value)
	        {
	            $reservations = $value['countRegisters'];
	        }
	    }
	    if($points==NULL){ $points = 0; }
		$lastAccess = \Drupal::service('date.formatter')->format($user->getLastAccessedTime(), 'short');
		$userData = array("0"=>$uid,"1"=>$userName,"2"=>$email,"3"=>$points,"4"=>$reservations,"5"=>$telephone,"6"=>$address,"7"=>$telephoneAditional);
		return array(
				'#theme' => 'page_user_template',
				'#userData' => $userData,
				/*'#idDepts' => $responseIdDepts,
				'#depts' => $responseDepts,
				'#locations' => $responseMapPoints,
				'#agenciesList' => $responseListAgencies,
				'#multiservicesList' => $responseListMultiservices,
				'#dataMask' => $responseDatamask,*/
			);
	}
	/*Page Express Traveler*/
	public function page_user_register($mail, $userName) {
		
		return array(
			'#theme' => 'page_user_register_template',
			'#mail' => $mail,
			'#userName' => $userName,
		);		
	}
	/*Page Edit Basic Data*/
	/*
	public function page_user_reset_pass($uid, $timestamp,$hash) {
		
		// The current user is not logged in, so check the parameters.
	    $current = REQUEST_TIME;
	    // @var \Drupal\user\UserInterface $user
	    //$user = $this->userStorage->load($uid);
	    $user = User::load($uid);
	   	// Verify that the user exists and is active.
	    if ($user === NULL || !$user->isActive()) {
	      // Blocked or invalid user ID, so deny access. The parameters will be in
	      // the watchdog's URL for the administrator to check.
	    	\Drupal::messenger()->addError(t('Usted no esta registrado en Expreso Bolivariano.'));
	      	$url = \Drupal::url("user.register");
		    $response = new RedirectResponse($url);
		    $response->send();
	    }
	    // Time out, in seconds, until login URL expires.
	    $timeout = \Drupal::config('user.settings')->get('password_reset_timeout');
	    // No time out for first time login.
	    if ($user->getLastLoginTime() && $current - $timestamp > $timeout) {
	    	//$this->messenger()->addError($this->t('You have tried to use a one-time login link that has expired. Please request a new one using the form below.'));
	      	\Drupal::messenger()->addError(t('Usted esta usando un link de cambio de clave que esta Expirado. Por favor solicite uno nuevo.'));
	      	//return $this->redirect('user.pass');
	      	$url = \Drupal::url("user.pass", ['uid' => $uid]);
	      	$response = new RedirectResponse($url);
          	$response->send();
	    }
	    elseif ($user->isAuthenticated() && ($timestamp >= $user->getLastLoginTime()) && ($timestamp <= $current) && Crypt::hashEquals($hash, user_pass_rehash($user, $timestamp))) {
	    	user_login_finalize($user);
	      	//$this->logger->notice('User %name used one-time login link at time %timestamp.', ['%name' => $user->getDisplayName(), '%timestamp' => $timestamp]);
	      	//$this->messenger()->addStatus($this->t('You have just used your one-time login link. It is no longer necessary to use this link to log in. Please change your password.'));
	      	\Drupal::messenger()->addStatus(t('Usted esta usando un link de unico uso, no es el link para iniciar sesión. Por favor cambie su contraseña.'));
	      	// Let the user's password be changed without the current password
	      	// check.
	      	$form = \Drupal::formBuilder()->getForm('Drupal\expreso_bolivariano_forms\Form\ChangePasswordFirstTime');
	      	return array(
				'#theme' => 'page_user_reset_pass_template',
				'#formData' => $form,
				'#uid' => $uid,
			);
	    }
	    \Drupal::messenger()->addError(t('Usted esta usando un link de cambio de clave que no es valido. Por favor solicite uno nuevo.'));
	    //$this->messenger()->addError($this->t('You have tried to use a one-time login link that has either been used or is no longer valid. Please request a new one using the form below.'));
	    $url = \Drupal::url("user.pass", ['uid' => $uid]);
	    $response = new RedirectResponse($url);
	    $response->send();
	}
	*/
	/*Page Express Traveler*/
	public function page_notfound() {
		
		return array(
			'#theme' => 'page_notfound',
			//'#expressTravelerData' => $responseTripChairs,
		);		
	}
	/*Parametro Usuario*/
	public function page_user_edit(UserInterface $user) {

		$variables['#cache']['max-age'] = 0;
      	$user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
      	$uid = $user->get('uid')->value;
      	$userName = $user->getUsername();
		$email = $user->getEmail();

		$response = $this->managerServices->getToken();
		if($response['statusName']=='OK')
		{
			$tokenId = $response['data']['token'];
			$dateExpires = $response['data']['expires'];
		}
		$responseUserCreate = $this->managerServices->getValidateClientData($tokenId,$uid);
	    if($responseUserCreate['statusName']=='OK')
	    {
	        foreach($responseUserCreate as $key => $value)
	        {
	        	$telephone = $value['clientTelephoneNumber'];
	        	$telephoneAditional = $value['clientTelephone2Number'];
	        	$address = $value['clientAddress'];
	        }
	    }
		/*Period*/
      	$period = date("Y-m"); 
		$responsePoints = $this->managerServices->getPointsExpressClient($tokenId,$uid,$period);
	     if($responsePoints['statusName']=='OK')
	     {
	        foreach($responsePoints as $key => $value) 
	        {
	        	$points = $value['points'];
	        }
	    }
	    $responseReservations = $this->managerServices->getReservationCount($tokenId,$uid,'999');
	    if($responseReservations['statusName']=='OK')
	    {
	        foreach($responseReservations as $key => $value)
	        {
	            $reservations = $value['countRegisters'];
	        }
	    }
	    if($points==NULL){ $points = 0; }
		$lastAccess = \Drupal::service('date.formatter')->format($user->getLastAccessedTime(), 'short');
		$userData = array("0"=>$uid,"1"=>$userName,"2"=>$email,"3"=>$points,"4"=>$reservations,"5"=>$telephone,"6"=>$address,"7"=>$telephoneAditional);
		return array(
				'#theme' => 'page_user_template',
				'#userData' => $userData,
				/*'#idDepts' => $responseIdDepts,
				'#depts' => $responseDepts,
				'#locations' => $responseMapPoints,
				'#agenciesList' => $responseListAgencies,
				'#multiservicesList' => $responseListMultiservices,
				'#dataMask' => $responseDatamask,*/
			);
	}
}
