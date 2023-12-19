<?php





class Agency{
    private $agencyId;
    private $longitude;
    private $latitude ;
    private $bankId ;
    private Adress $adress;
  

    
    public function __construct(){
       
    }

    public function getAgencyId(){
        return $this->agencyId;
    }
    public function setAgencyId($agencyId){
        $this->agencyId = $agencyId;
    }

    public function getLongitude(){
        return $this->longitude;
    }
    public function setLongitude($longitude){
        $this->longitude = $longitude;
    }
    public function getLatitude(){
        return $this->latitude;
    }
    public function setLatitude($latitude){
        $this->agencyId = $latitude;
    }
    public function getBankId(){
        return $this->bankId;
    }
    public function setBankId($bankId){
        $this->bankId = $bankId;
    }
    public function getAdressId(){
        return $this->adress;
    }
    public function setAdressId(Adress $adress){
        $this->adress = $adress;
}

}

?>