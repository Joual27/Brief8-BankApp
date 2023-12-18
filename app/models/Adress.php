<?php




class Address {
    private $addressId;
    private $ville;
    private $rue;
    private $quartier;
    private $codePostal;
    private $email;
    private $phone;

    public function __construct() {
    }

    public function getAddressId() {
        return $this->addressId;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getRue() {
        return $this->rue;
    }

    public function getQuartier() {
        return $this->quartier;
    }

    public function getCodePostal() {
        return $this->codePostal;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setAddressId($addressId) {
        $this->addressId = $addressId;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    public function setRue($rue) {
        $this->rue = $rue;
    }

    public function setQuartier($quartier) {
        $this->quartier = $quartier;
    }

    public function setCodePostal($codePostal) {
        $this->codePostal = $codePostal;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }
}

?>