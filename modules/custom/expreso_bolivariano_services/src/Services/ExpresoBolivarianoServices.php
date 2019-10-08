<?php
/**
* @file providing the all services that we need in te Drupal Site'.
*
*/
namespace Drupal\expreso_bolivariano_services\Services;

//use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Site\Settings;
use Drupal\Core\Link;
use Drupal\http_client_manager\Entity\HttpConfigRequest;
use Drupal\http_client_manager\HttpClientInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
//use Symfony\Component\HttpFoundation\Response;

class ExpresoBolivarianoServices {
    
    private $httpClient;
    
      /**
    * {@inheritdoc}
    */
    public function __construct(HttpClientInterface $http_client) {
        $this->httpClient = $http_client;
    }

    /**
    * {@inheritdoc}
    */
    public static function create(ContainerInterface $container) {
        return new static(
          $container->get('bolivariano_services.http_client')
        );
    }

    /**
    * Get Client.
    *
    * @return \Drupal\http_client_manager\HttpClientInterface
    *   The Http Client instance.
    */
    public function getClient() {
        return $this->httpClient;
    }
    /*Function to get Token for a connection*/    
    public function getToken()
    {
        $configuration_userName_rest = settings::get('rest_userName');
        $configuration_Password_rest = settings::get('rest_Password');
        $params = ['UserName' => $configuration_userName_rest, 'Password' => $configuration_Password_rest];
        $token = $this->httpClient->getTokenConnection($params);
        return $token;
    }
    /*Function to renew a token expires*/
    public function renewToken($tokenId)
    {
        $configuration_userName_rest = settings::get('rest_userName');
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['UserName' => $configuration_userName_rest, 'Authorization' => $configuration_tokenId_rest]; 
        $tokenRenew = $this->httpClient->renewTokenConnection($params);
        return $tokenRenew;
    }
    /*Function to get Agencies*/
    public function getAgencies($tokenId,$contractNumber,$contractType)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'contractNumber' => $contractNumber, 'contractType' => $contractType]; 
        $listAgencies = $this->httpClient->getAgencies($params);
        return $listAgencies;
    }
    /*Function to get Schedule Bus*/
    public function getScheduleService($tokenId,$idBus,$date)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'tripDate' => $date, 'busServiceId' => $idBus]; 
        $listSchedule = $this->httpClient->getScheduleService($params);
        return $listSchedule;
    }
    /*Function to get Promotions Home*/
    public function getPromotions($tokenId,$promotionsNumber)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'promotionsNumber' => $promotionsNumber]; 
        $listPromotions = $this->httpClient->getPromotions($params);
        return $listPromotions;
    }
    /*Function to get List Trips */
    public function getAvailableTrips($tokenId,$saleAgencyId,$destinationAgencyId,$tripDate,$contractNumber,$userCode,$agencyId,$intervalHourTripDeparture)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'saleAgencyId' => $saleAgencyId, 'destinationAgencyId' => $destinationAgencyId, 'tripDate' => $tripDate, 'contractNumber' => $contractNumber, 'userCode' => $userCode, 'agencyId' => $agencyId, 'intervalHourTripDeparture' => $intervalHourTripDeparture]; 
        $listTrips = $this->httpClient->getAvailableTrips($params);
        return $listTrips;
    }
    /*Function to get List Dates Trips */
    public function getAvailableDatesTrips($tokenId,$saleAgencyId,$destinationAgencyId,$tripDate,$agencyId,$intervalHourTripDeparture)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'agencySaleId' => $saleAgencyId, 'agencyDestinationId' => $destinationAgencyId, 'date' => $tripDate, 'agencyWebId' => $agencyId, 'intervalHour' => $intervalHourTripDeparture]; 
        $listDateTrips = $this->httpClient->getAvailableDatesTrips($params);
        return $listDateTrips;
    }
    /*Function to get Bus Map */
    public function getPrintBusMap($tokenId,$tripKeyGo,$tripCapacity,$saleAgencyId,$destinationAgencyId)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'tripKey' => $tripKeyGo, 'capacity' => $tripCapacity, 'agencySaleId' => $saleAgencyId, 'agencyDestinationId' => $destinationAgencyId]; 
        $listBusMap = $this->httpClient->getPrintBusMap($params);
        return $listBusMap;
    }
    /*Function to get Chairs at the Trip */
    public function getAvailableTripChairs($tokenId,$mapType,$companyId,$tripKey,$saleAgencyId,$destinationAgencyId)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'mapType' => $mapType, 'companyId' => $companyId, 'tripKey' => $tripKey, 'agencyOriginId' => $saleAgencyId, 'agencyDestinationId' => $destinationAgencyId]; 
        $listTripChairs = $this->httpClient->getAvailableTripChairs($params);
        return $listTripChairs;
    }
    /*Function to validate Username and Password */
    public function getValidateClientPassword($tokenId,$userId,$pass)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'clientDocumentId' => $userId, 'clientPassword' => md5($pass)]; 
        $validateClientPassword = $this->httpClient->getValidateClientPassword($params);
        return $validateClientPassword;
    }
    /*Function to get data User */
    public function getValidateClientData($tokenId,$userId)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'clientDocumentId' => $userId]; 
        $validateClientData = $this->httpClient->getValidateClientData($params);
        return $validateClientData;
    }
    /*Function to get data Express Traveler */
    public function getPointsExpressClient($tokenId,$userId,$period)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'clientDocumentId' => $userId, 'period' => $period]; 
        $pointsExpressTraveler = $this->httpClient->getPointsExpressClient($params);
        return $pointsExpressTraveler;
    }
    /*Function to get data Reservations */
    public function getReservationCount($tokenId,$userId,$agencyWebId)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'clientDocumentId' => $userId, 'webAgencyId' => $agencyWebId]; 
        $countReservation = $this->httpClient->getReservationCount($params);
        return $countReservation;
    }
    /*Function to save User */
    public function setRegisterClient($tokenId,$docType,$userId,$password,$firstName,$lastName,$phone,$mail,$gender,$birthDate,$acceptance)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'documentTypeId' => $docType, 'clientDocumentNumber' => $userId, 'clientNames' => $firstName, 'clientLastNames' => $lastName, 'clientPhoneNumber' => $phone, 'clientMail' => $mail, 'clientGender' => $gender, 'clientBirthDate' => $birthDate, 'clientPoliticalAcceptance' => $acceptance,]; 
        $countRegister = $this->httpClient->setRegisterClient($params);
        return $countRegister;
    }
    /*Function to save User */
    public function setNewPassword($tokenId,$userId,$password)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'clientDocumentId' => $userId, 'clientPassword' => md5($password)]; 
        $countPassword = $this->httpClient->setNewPassword($params);
        return $countPassword;
    }
    /*Function to get data to Wizens GPS */
    public function getTicketPlate($tokenId,$ticket,$userId)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'ticketNumber' => $ticket, 'documentId' => $userId]; 
        $ticketPlate = $this->httpClient->getTicketPlate($params);
        return $ticketPlate;
    }
    /*Function to get data to Wizens GPS */
    public function getQueryTicket($tokenId,$idCompany,$documentClient,$ticket)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'companyId' => $idCompany, 'clientDocumentId' => $documentClient, 'ticketNumber' => $ticket]; 
        $ticketData = $this->httpClient->getQueryTicket($params);
        return $ticketData;
    }
    /*Function to get the cost of Shipping */
    public function getDeliveryRate($tokenId,$value,$weigth,$width,$high,$long,$area)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'deliveryDeclaratedValue' => $value, 'deliveryWeightKg' => $weigth, 'deliveryWidth' => $width, 'deliveryHigh' => $high, 'deliveryLong' => $long, 'modalityId' => $area]; 
        $shippingRate = $this->httpClient->getDeliveryRate($params);
        return $shippingRate;
    }
    /*Function to get the status of shipping in GPS */
    public function getDeliveryDocument($tokenId,$ticket)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'documentId' => $ticket]; 
        $shippingGps = $this->httpClient->getDeliveryDocument($params);
        return $shippingGps;
    }
    /*Function to get the List of Reservations By User */
    public function getListReservations($tokenId,$userId,$agencyId)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'clientDocumentId' => $userId, 'webAgencyId' => $agencyId]; 
        $listReservations = $this->httpClient->getListReservations($params);
        return $listReservations;
    }
    /*Function to get the List of Tickets By User */
    public function getListTickets($tokenId,$userId,$agencyId)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'clientDocumentId' => $userId, 'webAgencyId' => $agencyId]; 
        $listTickets = $this->httpClient->getListTickets($params);
        return $listTickets;
    }
    /*Function to get the List of Tickets By User */
    public function getListHistory($tokenId,$userId,$agencyId)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'clientDocumentId' => $userId, 'webAgencyId' => $agencyId]; 
        $listTickets = $this->httpClient->getListHistory($params);
        return $listTickets;
    }
    /*Function to create a Reservation One Way */
    public function setGenerateReservationOneWay($tokenId,$agencyReservation,$userId,$agencyOriginId,$agencyDestinationId,$tripKey,$tripDate,$passengers,$documentsClients,$chairsId,$promotionalCodes)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'agencyReservation' => $agencyReservation, 'clientDocumentId' => $userId, 'agencyOriginId' => $agencyOriginId, 'agencyDestinationId' => $agencyDestinationId, 'tripKey' => $tripKey, 'tripDepartureDate' => $tripDate, 'passengers' => $passengers, 'clientDocuments' => $documentsClients, 'seats' => $chairsId, 'promotionalCodes' => $promotionalCodes]; 
        $reservationData = $this->httpClient->setGenerateReservationOneWay($params);
        return $reservationData;
    }
    /*Function to create a Reservation Two Way */
    public function setGenerateReservationTwoWay($tokenId,$agencyReservation,$userId,$agencyOriginId,$agencyDestinationId,$agencyOriginIdB,$agencyDestinationIdB,$tripKey,$tripKeyB,$tripDate,$tripDateB,$passengers,$passengersB,$documentsClients,$documentsClientsB,$chairsId,$chairsIdB,$promotionalCodes,$promotionalCodesB)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'agencyReservation' => $agencyReservation, 'clientDocumentId' => $userId, 'oneWayAgencyOriginId' => $agencyOriginId, 'returnAgencyOriginId' => $agencyDestinationId, 'oneWayAgencyDestinationId' => $agencyOriginIdB, 'returnAgencyDestinationId' => $agencyDestinationIdB, 'oneWayTripKey' => $tripKey, 'returnTripKey' => $tripKeyB, 'oneWayDeapartureDate' => $tripDate, 'returnDeapartureDate' => $tripDateB, 'oneWayPasengers' => $passengers, 'returnPasengers' => $passengersB, 'oneWayClientDocuments' => $documentsClients, 'returnClientDocuments' => $documentsClientsB, 'oneWaySeats' => $chairsId, 'returnSeats' => $chairsIdB, 'oneWayPromotionCodes' => $promotionalCodes, 'returnPromotionCodes' => $promotionalCodesB]; 
        $reservationData = $this->httpClient->setGenerateReservationTwoWay($params);
        return $reservationData;
    }
    /*Function to create a Reservation One Way */
    public function getTicketDetail($tokenId,$purchaseId,$agencyWebId)
    {
        $configuration_tokenId_rest = 'Bearer '.$tokenId;
        $params = ['Authorization' => $configuration_tokenId_rest, 'purshaseId' => $purchaseId, 'webAgencyId' => $agencyWebId]; 
        $ticketData = $this->httpClient->getTicketDetail($params);
        return $ticketData;
    }
}