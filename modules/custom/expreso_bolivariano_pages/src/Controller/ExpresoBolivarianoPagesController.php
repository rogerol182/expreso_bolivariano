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
    /*Route Schedule Bus*/
	public function route_schedule_bus($idBus,$tripDate) {
		
		$response = $this->managerServices->getToken();
		if($response['statusName']=='OK')
		{
			$tokenId = $response['data']['token'];
			$dateExpires = $response['data']['expires'];
		}

		$idBusService = (int)$idBus;
		
		$responseScheduleBus = $this->managerServices->getScheduleService($tokenId,$idBusService,$tripDate);
		if($responseScheduleBus['statusName']=='OK')
		{
			$responseSchedule = $responseScheduleBus['data'];
		}
		$build = array(
			'#theme' => 'route_schedule_bus_template',
			'#scheduleBus' => $responseSchedule,
		);
		
		return new Response(render($build));
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
		$tripDate = explode('-', $tripDateBack);
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
			$idChair[] = $item['consecutiveId'];
			//Rates for Chair Selection
			if(trim(trim($item['rateType']))=='ESPECTACULAR' && $item['rate']!=0)
			{
				$countRates['es'] = array('e',$item['rate'],'espectacular','Tarifa Espectacular');
			}
			if(trim(trim($item['rateType']))=='COMODA' && $item['rate']!=0)
			{
				$countRates['co'] = array('c',$item['rate'],'comoda','Tarifa Comoda');
			}
			if(trim(trim($item['rateType']))=='CHEVERE' && $item['rate']!=0)
			{
				$countRates['ce'] = array('v',$item['rate'],'chevere','Tarifa Chevere');
			}
			if(trim(trim($item['rateType']))=='PRIMERA_CLASE' && $item['rate']!=0)
			{
				$countRates['pc'] = array('p',$item['rate'],'first-class','Tarifa Primera Clase');
			}
			//Blocked Chairs
			if($item['homologatedSeatState']=='V' || $item['homologatedSeatState']=='I')
			{
				$block = $item['homologatedSeatCode'];
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapFirstFloor .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapFirstFloor .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapFirstFloor .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapFirstFloor .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapFirstFloor .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapFirstFloor .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapFirstFloor .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapFirstFloor .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapFirstFloor .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapFirstFloor .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapFirstFloor .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapFirstFloor .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapFirstFloor .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapFirstFloor .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapFirstFloor .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapFirstFloor .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapFirstFloor .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapFirstFloor .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapFirstFloor .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapFirstFloor .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapFirstFloor .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapFirstFloor .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapFirstFloor .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapFirstFloor .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapSecondFloor .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapSecondFloor .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapSecondFloor .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapSecondFloor .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapSecondFloor .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapSecondFloor .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapSecondFloor .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapSecondFloor .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapSecondFloor .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapSecondFloor .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapSecondFloor .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapSecondFloor .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapSecondFloor .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapSecondFloor .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapSecondFloor .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapSecondFloor .= 'v';
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
		$tripBackT ='n';
		//End of create rates
		return array(
			'#theme' => 'page_selection_template',
			'#tripsCitiesData' => ['idOriginCity'=> $saleAgencyId, 'idDestinationCity'=>$destinationAgencyId, 'originCity'=>$saleAgencyName, 'destinationCity'=>$destinationAgencyName, 'tripService'=>$tripService, 'tripKeyGo' => $tripKeyGo],
			'#tripsDatesData' => ['tripDateGo'=>$tripDateGo],
			'#attached' => ['library' => ['bootstrap_bolivariano_subtheme/seat-charts'], 'drupalSettings'=> ['bootstrap_bolivariano_subtheme' => ['seatCharts' => ['countColumnsFF' => $varColumns, 'countColumnsSF' => $varColumnsS, 'countRowsFF' => $varRows, 'countRowsSF' => $varRowsS, 'countRates' => $varRates, 'countBlocked' => $countBlocked, 'chairsMapFirstFloor' => $varChairsFirstFloor, 'chairsMapSecondFloor' => $varChairsSecondFloor, /*back*/ 'tripBackT' => $tripBackT]]]],
			'#cache' => ['max-age' => 0],
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
		$responseTripChairsBack = $this->managerServices->getAvailableTripChairs($tokenId,$mapType,$companyId,$tripKeyBack,$destinationAgencyId,$saleAgencyId);
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
			if(trim(trim($item['rateType']))=='ESPECTACULAR' && $item['rate']!=0)
			{
				$countRatesGo['es'] = array('e',$item['rate'],'espectacular','Tarifa Espectacular');
			}
			if(trim(trim($item['rateType']))=='COMODA' && $item['rate']!=0)
			{
				$countRatesGo['co'] = array('c',$item['rate'],'comoda','Tarifa Comoda');
			}
			if(trim(trim($item['rateType']))=='CHEVERE' && $item['rate']!=0)
			{
				$countRatesGo['ce'] = array('v',$item['rate'],'chevere','Tarifa Chevere');
			}
			if(trim(trim($item['rateType']))=='PRIMERA_CLASE' && $item['rate']!=0)
			{
				$countRatesGo['pc'] = array('p',$item['rate'],'first-class','Tarifa Primera Clase');
			}
			//Blocked Chairs
			if($item['homologatedSeatState']=='V' || $item['homologatedSeatState']=='I')
			{
				$block = $item['homologatedSeatCode'];
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapFirstFloorGo .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapFirstFloorGo .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapFirstFloorGo .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapFirstFloorGo .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapFirstFloorGo .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapFirstFloorGo .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapFirstFloorGo .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapFirstFloorGo .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapFirstFloorGo .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapFirstFloorGo .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapFirstFloorGo .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapFirstFloorGo .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapFirstFloorGo .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapFirstFloorGo .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapFirstFloorGo .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapFirstFloorGo .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapFirstFloorGo .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapFirstFloorGo .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapFirstFloorGo .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapFirstFloorGo .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapFirstFloorGo .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapFirstFloorGo .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapFirstFloorGo .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapFirstFloorGo .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapSecondFloorGo .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapSecondFloorGo .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapSecondFloorGo .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapSecondFloorGo .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapSecondFloorGo .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapSecondFloorGo .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapSecondFloorGo .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapSecondFloorGo .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapSecondFloorGo .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapSecondFloorGo .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapSecondFloorGo .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapSecondFloorGo .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapSecondFloorGo .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapSecondFloorGo .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapSecondFloorGo .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapSecondFloorGo .= 'v';
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
			if(trim(trim($item['rateType']))=='ESPECTACULAR' && $item['rate']!=0)
			{
				$countRatesBack['es'] = array('e',$item['rate'],'espectacular','Tarifa Espectacular');
			}
			if(trim(trim($item['rateType']))=='COMODA' && $item['rate']!=0)
			{
				$countRatesBack['co'] = array('c',$item['rate'],'comoda','Tarifa Comoda');
			}
			if(trim(trim($item['rateType']))=='CHEVERE' && $item['rate']!=0)
			{
				$countRatesBack['ce'] = array('v',$item['rate'],'chevere','Tarifa Chevere');
			}
			if(trim(trim($item['rateType']))=='PRIMERA_CLASE' && $item['rate']!=0)
			{
				$countRatesBack['pc'] = array('p',$item['rate'],'first-class','Tarifa Primera Clase');
			}
			//Blocked Chairs
			if($item['homologatedSeatState']=='V' || $item['homologatedSeatState']=='I')
			{
				$block = $item['homologatedSeatCode'];
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapFirstFloorBack .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapFirstFloorBack .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapFirstFloorBack .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapFirstFloorBack .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapFirstFloorBack .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapFirstFloorBack .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapFirstFloorBack .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapFirstFloorBack .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapFirstFloorBack .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapFirstFloorBack .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapFirstFloorBack .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapFirstFloorBack .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapFirstFloorBack .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapFirstFloorBack .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapFirstFloorBack .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapFirstFloorBack .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapFirstFloorBack .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapFirstFloorBack .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapFirstFloorBack .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapFirstFloorBack .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapFirstFloorBack .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapFirstFloorBack .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapFirstFloorBack .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapFirstFloorBack .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapSecondFloorBack .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapSecondFloorBack .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapSecondFloorBack .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapSecondFloorBack .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapSecondFloorBack .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapSecondFloorBack .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapSecondFloorBack .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapSecondFloorBack .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapSecondFloorBack .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapSecondFloorBack .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapSecondFloorBack .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapSecondFloorBack .= 'v';
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
						if(trim(trim($item['rateType']))=='PRIMERA_CLASE')
						{
							$varMapSecondFloorBack .= 'p';
						}
						if(trim(trim($item['rateType']))=='ESPECTACULAR')
						{
							$varMapSecondFloorBack .= 'e';
						}
						if(trim(trim($item['rateType']))=='COMODA')
						{
							$varMapSecondFloorBack .= 'c';
						}
						if(trim(trim($item['rateType']))=='CHEVERE')
						{
							$varMapSecondFloorBack .= 'v';
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
					if($j==0)
					{
						$j = 1;
						$varRowsBackS[] = "0".$j;
					}
					else
					{
						$varRowsBackS[] = "0".$j;
					}
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
			'#tripsCitiesData' => ['idOriginCity'=> $saleAgencyId, 'idDestinationCity'=>$destinationAgencyId, 'originCity'=>$saleAgencyName, 'destinationCity'=>$destinationAgencyName, 'tripService'=>$tripServiceGo, 'tripServiceB'=>$tripServiceBack, 'tripKeyGo' => $tripKeyGo, 'tripKeyBack' => $tripKeyBack],
			'#tripsDatesData' => ['tripDateGo'=>$tripDateGo, 'tripDateBack'=>$tripDateBack],
			'#attached' => ['library' => ['bootstrap_bolivariano_subtheme/seat-charts'], 'drupalSettings'=> ['bootstrap_bolivariano_subtheme' => ['seatCharts' => ['countColumnsFF' => $varColumnsGo, 'countColumnsSF' => $varColumnsGoS, 'countRowsFF' => $varRowsGo, 'countRowsSF' => $varRowsGoS, 'countRates' => $varRatesGo, 'countBlocked' => $countBlockedGo, 'chairsMapFirstFloor' => $varChairsFirstFloorGo, 'chairsMapSecondFloor' => $varChairsSecondFloorGo,  /*back*/ 'tripBackT' => $tripBackT, 'countColumnsFFB' => $varColumnsBack, 'countColumnsSFB' => $varColumnsBackS, 'countRowsFFB' => $varRowsBack, 'countRowsSFB' => $varRowsBackS, 'countRatesB' => $varRatesBack, 'countBlockedB' => $countBlockedBack, 'chairsMapFirstFloorB' => $varChairsFirstFloorBack, 'chairsMapSecondFloorB' => $varChairsSecondFloorBack]]]],
		);
	}

	/*Create Reservation Process*/
	public function create_reservation_one_way($idCityOrigin,$idCityDestiny,$chairsSelected,$tripKeyGo,$dateGo) {
		
		$variables['#cache']['max-age'] = 0;
		$user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
      	$uid = $user->get('uid')->value;
		$chairs = explode(',', $chairsSelected);
		
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
		$tripKey = (integer)$tripKeyGo;
		$saleAgencyId = (integer)$idCityOrigin;
		$destinationAgencyId = (integer)$idCityDestiny;
		//Begins to Find consecutive Id for the selected chairs.
		$responseTripChairs = $this->managerServices->getAvailableTripChairs($tokenId,$mapType,$companyId,$tripKey,$saleAgencyId,$destinationAgencyId);
		if($responseTripChairs['statusName']=='OK')
		{
			$responseTripChairs = $responseTripChairs['data'];
		}
		foreach ($responseTripChairs as $key => $item)
		{
			if(trim($item['elementCode'])=='S')
				{
					$consecutivesId[$item['baseCodeSeat']] = $item['homologatedSeatCode'];
				}
		}
		for ($i=0; $i < count($chairs); $i++) 
		{
			if($i<count($chairs)-1)
			{
				$indice = array_search($chairs[$i],$consecutivesId,true);
				$chairsId .= trim($indice).',';
				$documentsClients .= $uid.',';
				$promotionalCodes .= "'',";
			}
			else
			{
				$indice = array_search($chairs[$i],$consecutivesId,true);
				$chairsId .= trim($indice);
				$documentsClients .= $uid;
				$promotionalCodes .= "''";
			}
			
		}
		//var_dump($chairsId);
		//die();
		//End Find consecutive Id for the selected chairs.
		$clientDocument = (integer)$uid;
      	$agencyReservation = 999;
		$date = $dateGo.'T00:00:00';
		$passengers = count($chairs);

		$responseReservations = $this->managerServices->getReservationCount($tokenId,$uid,'999');
	    if($responseReservations['statusName']=='OK')
	    {
	        foreach($responseReservations as $key => $value)
	        {
	            $reservations = $value['countRegisters'];
	        }
	    }
	    if($reservations<=12)
	    {
	    	$responseGenerateReservation = $this->managerServices->setGenerateReservationOneWay($tokenId,$agencyReservation,$clientDocument,$saleAgencyId,$destinationAgencyId,$tripKey,$date,$passengers,$documentsClients,$chairsId,$promotionalCodes);
		
			if($responseGenerateReservation['statusName']=='OK')
			{
				$responseGenerateReservation = $responseGenerateReservation['data'];
				if($responseGenerateReservation['oneWayPurshasedId']!=0)
				{
					$responseReservation = $responseGenerateReservation['oneWayPurshasedId'];
				}
				else
				{
					$responseReservation = 'Error';
				}
			}	
	    }
	    else
	    {
	    	$responseReservation = 'Reservas';
	    }
		return new Response($responseReservation);	
	}

	/*Create Reservation Process*/
	public function create_reservation_two_way($idCityOrigin,$idCityDestiny,$chairsSelected,$tripKeyGo,$dateGo,$chairsSelectedBack,$tripKeyBack,$dateBack) {
		
		$variables['#cache']['max-age'] = 0;
		//var_dump($chairsSelected);
		//var_dump($chairsSelectedBack);
		//die();
		$user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
      	$uid = $user->get('uid')->value;
		$chairs = explode(',', $chairsSelected);
		$chairsBack = explode(',', $chairsSelectedBack);
		
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
		$tripKey = (integer)$tripKeyGo;
		$tripKeyB = (integer)$tripKeyBack;
		$saleAgencyId = (integer)$idCityOrigin;
		$destinationAgencyId = (integer)$idCityDestiny;
		$saleAgencyIdB = (integer)$idCityDestiny;
		$destinationAgencyIdB = (integer)$idCityOrigin;
		//Begins to Find consecutive Id for the selected chairs.
		$responseTripChairs = $this->managerServices->getAvailableTripChairs($tokenId,$mapType,$companyId,$tripKey,$saleAgencyId,$destinationAgencyId);
		if($responseTripChairs['statusName']=='OK')
		{
			$responseTripChairs = $responseTripChairs['data'];
		}
		foreach ($responseTripChairs as $key => $item)
		{
			if(trim($item['elementCode'])=='S')
				{
					$consecutivesId[$item['baseCodeSeat']] = $item['homologatedSeatCode'];
				}
		}
		for ($i=0; $i < count($chairs); $i++) 
		{
			if($i<count($chairs)-1)
			{
				$indice = array_search($chairs[$i],$consecutivesId,true);
				$chairsId .= trim($indice).',';
				$documentsClients .= $uid.',';
				$promotionalCodes .= "'',";
			}
			else
			{
				$indice = array_search($chairs[$i],$consecutivesId,true);
				$chairsId .= trim($indice);
				$documentsClients .= $uid;
				$promotionalCodes .= "''";
			}
			
		}
		//Begins to Find consecutive Id for the Back selected chairs.
		$responseTripChairsBack = $this->managerServices->getAvailableTripChairs($tokenId,$mapType,$companyId,$tripKeyB,$saleAgencyIdB,$destinationAgencyIdB);
		//var_dump($tripKeyB);
		if($responseTripChairsBack['statusName']=='OK')
		{
			$responseTripChairsBack = $responseTripChairsBack['data'];
		}
		foreach ($responseTripChairsBack as $key => $item)
		{
			if(trim($item['elementCode'])=='S')
				{
					$consecutivesIdB[$item['baseCodeSeat']] = $item['homologatedSeatCode'];
				}
		}
		for ($i=0; $i < count($chairsBack); $i++) 
		{
			if($i<count($chairsBack)-1)
			{
				$indiceB = array_search($chairsBack[$i],$consecutivesIdB,true);
				$chairsIdB .= trim($indiceB).',';
				$documentsClientsB .= $uid.',';
				$promotionalCodesB .= "'',";
			}
			else
			{
				$indiceB = array_search($chairsBack[$i],$consecutivesIdB,true);
				$chairsIdB .= trim($indiceB);
				$documentsClientsB .= $uid;
				$promotionalCodesB .= "''";
			}
			
		}
		//var_dump($chairsId);
		//var_dump($chairsIdB);
		//die();
		//End Find consecutive Id for the selected chairs.
		$clientDocument = (integer)$uid;
      	$agencyReservation = 999;
		$date = $dateGo.'T00:00:00';
		$dateB = $dateBack.'T00:00:00';
		$passengers = count($chairs);
		$passengersB = count($chairsBack);

		$responseReservations = $this->managerServices->getReservationCount($tokenId,$uid,'999');
	    if($responseReservations['statusName']=='OK')
	    {
	        foreach($responseReservations as $key => $value)
	        {
	            $reservations = $value['countRegisters'];
	        }
	    }
	    if($reservations<=12)
	    {
	    	$responseGenerateReservation = $this->managerServices->setGenerateReservationTwoWay($tokenId,$agencyReservation,$clientDocument,$saleAgencyId,$destinationAgencyId,$saleAgencyIdB,$destinationAgencyIdB,$tripKey,$tripKeyB,$date,$dateB,$passengers,$passengersB,$documentsClients,$documentsClientsB,$chairsId,$chairsIdB,$promotionalCodes,$promotionalCodesB);
		
			if($responseGenerateReservation['statusName']=='OK')
			{
				$responseGenerateReservation = $responseGenerateReservation['data'];
				if($responseGenerateReservation['oneWayPurshasedId']!=0)
				{
					$responseReservation = $responseGenerateReservation['oneWayPurshasedId'];
				}
				else
				{
					$responseReservation = 'Error';
				}
			}	
	    }
	    else
	    {
	    	$responseReservation = 'Reservas';
	    }
		return new Response($responseReservation);
	}

	/*Page Checkout*/
	public function page_checkout($purchaseId) {
		
		$variables['#cache']['max-age'] = 0;
		$response = $this->managerServices->getToken();
		if($response['statusName']=='OK')
		{
			foreach($response as $key => $value) 
			{
				$tokenId = $value['token'];
			    $dateExpires = $value['expires'];
			}
		}
		$purchasedId = (integer)$purchaseId;
		$agencyWebId = 999;
		$responseTrip = $this->managerServices->getTicketDetail($tokenId,$purchasedId,$agencyWebId);
		if($responseTrip['statusName']=='OK')
		{
			$responseTripData = $responseTrip['data'];
			
			$countTravel = count($responseTripData);
			foreach ($responseTripData as $arr) 
			{
				if (!$tripDataFull[$arr['purshaseId']]) 
				{
			    	$tripDataFull[$arr['purshaseId']] = array();
			  	}
			  	if($countTravel>1)
			  	{
			  		$tripDataFull[$arr['purshaseId']]['typeTravel'] = 'R';
			  		if(trim($arr['oneWayOrReturn'])=='I')
				  	{
				  		$tripDataFull[$arr['purshaseId']]['purshaseId'] = $arr['purshaseId'];
					 	$name = strtolower($arr['clientName'])." ".strtolower($arr['clientLastName']);
					 	$tripDataFull[$arr['purshaseId']]['clientName'] = ucwords($name);
					 	$tripDataFull[$arr['purshaseId']]['totalRate'] += $arr['rate'];
					 	$tripDataFull[$arr['purshaseId']]['agencyOriginName'] = $arr['agencyOriginName'];
					 	$tripDataFull[$arr['purshaseId']]['agencyDestinationName'] = $arr['agencyDestinationName'];
					 	$tripDataFull[$arr['purshaseId']]['homologationSeat'] .= $arr['homologationSeat'];
					 	$tripDataFull[$arr['purshaseId']]['tripDate'] = $arr['tripDate'];
					 	$tripDataFull[$arr['purshaseId']]['tripHour'] = $arr['tripHour'];
					 	$tripDataFull[$arr['purshaseId']]['busServiceId'] = $arr['busServiceId'];
					 	$tripDataFull[$arr['purshaseId']]['typeTravel'] = $arr['oneWayOrReturn'];	
				  	}
				  	if(trim($arr['oneWayOrReturn'])=='R')
				  	{
				  		$tripDataFull[$arr['purshaseId']]['totalRate'] += $arr['rate'];
					 	$tripDataFull[$arr['purshaseId']]['agencyOriginNameBack'] = $arr['agencyOriginName'];
					 	$tripDataFull[$arr['purshaseId']]['agencyDestinationNameBack'] = $arr['agencyDestinationName'];
					 	$tripDataFull[$arr['purshaseId']]['homologationSeatBack'] .= $arr['homologationSeat'];
					 	$tripDataFull[$arr['purshaseId']]['tripDateBack'] = $arr['tripDate'];
					 	$tripDataFull[$arr['purshaseId']]['tripHourBack'] = $arr['tripHour'];
					 	$tripDataFull[$arr['purshaseId']]['busServiceIdBack'] = $arr['busServiceId'];	
				  	}
			  	}
			  	else
			  	{
			  		$tripDataFull[$arr['purshaseId']]['purshaseId'] = $arr['purshaseId'];
				 	$name = strtolower($arr['clientName'])." ".strtolower($arr['clientLastName']);
				 	$tripDataFull[$arr['purshaseId']]['clientName'] = ucwords($name);
				 	$tripDataFull[$arr['purshaseId']]['totalRate'] += $arr['rate'];
				 	$tripDataFull[$arr['purshaseId']]['agencyOriginName'] = $arr['agencyOriginName'];
				 	$tripDataFull[$arr['purshaseId']]['agencyDestinationName'] = $arr['agencyDestinationName'];
				 	$tripDataFull[$arr['purshaseId']]['homologationSeat'] .= $arr['homologationSeat'];
				 	$tripDataFull[$arr['purshaseId']]['tripDate'] = $arr['tripDate'];
				 	$tripDataFull[$arr['purshaseId']]['tripHour'] = $arr['tripHour'];
				 	$tripDataFull[$arr['purshaseId']]['busServiceId'] = $arr['busServiceId'];
				 	$tripDataFull[$arr['purshaseId']]['typeTravel'] = $arr['oneWayOrReturn'];	
			  	}
			  	
			}
		}
		return array(
			'#theme' => 'page_checkout_template',
			'#tripResumeData' => $tripDataFull,
			'#cache' => ['max-age' => 0],
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
	        	$points = $value['earnedPoints'];
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
			);
	}
	/*Ajax to Save the Reservation*/
	public function save_reservation_go($saleAgencyId,$destinationAgencyId,$tripKeyGo,$tripDateGo,$tripCountPassengers,$tripClientDocuments,$tripSeats,$tripDiscount) {
		
		$variables['#cache']['max-age'] = 0;
      	$user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
      	$uid = $user->get('uid')->value;
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
			
		$userCode = (int) $uid;
		$agencyWeb = 999;
		
		$responseReservation = $this->managerServices->setReservationGo($tokenId,$agencyWeb,$userCode,$saleAgencyId,$destinationAgencyId,$tripKeyGo,$tripDateGo,$tripCountPassengers,$tripClientDocuments,$tripSeats,$tripDiscount);
		
		$responseReservationStatus = $responseReservation['statusName'];

		return new Response($responseReservationStatus);
				
	}
	/*Page GPS*/
	public function page_gps() {
		
		return array(
			'#theme' => 'page_gps_template',
			//'#expressTravelerData' => $responseTripChairs,
		);		
	}
	/*Page Services*/
	public function page_services() {
		
		return array(
			'#theme' => 'page_services_template',
		);		
	}
	/*Page Services*/
	public function route_filter($originCity) {
		$origin = ucfirst($originCity);
		$originName = $origin.", CO";
		/* Data for the Content */
		$query = \Drupal::entityQuery('node');
        $query->condition('status', 1);
        $query->condition('type', 'route');
        $query->condition('field_route_city_origin', $originName);
        $query->sort('field_route_city_destiny', 'ASC');
		$entity_ids = $query->execute();
        foreach ($entity_ids as $nid) {
        	$node = \Drupal::entityTypeManager()->getStorage('node')->load($nid);
        	/* All for make the Map */
        	$city = $node->get('field_route_city_destiny')->getValue();
        	$cityName = explode(",", $city[0]['value']);
        	$destinyCity = strtolower($cityName[0]);
        	$responseCity[] = $destinyCity;
        }
		$build = array(
			'#theme' => 'route_filter_template',
			'#filterCities' => $responseCity,
		);
		return new Response(render($build));
	}
}