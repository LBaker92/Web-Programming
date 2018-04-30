<?php
class Customer {
  private $id;
  private $name;
  private $email;
  private $school;
  private $address;
  private $city;
  private $country;
  private $sales = array();

  public function __construct($ID, $FNAME, $LNAME, $EMAIL, $SCHOOL, $ADDRESS, $CITY, $COUNTRY, $SALES) {
    $this->id = $ID;
    $this->name = $FNAME . " " . $LNAME;
    $this->email = $EMAIL;
    $this->school = $SCHOOL;
    $this->address = $ADDRESS;
    $this->city = $CITY;
    $this->country = $COUNTRY;
    $this->sales = $SALES;
  }
  public function getId() {
    return $this->id;
  }
  public function getName() {
    return $this->name;
  }
  public function getUni() {
    return $this->school;
  }
  public function getAddress() {
    return $this->address;
  }
  public function getCity() {
    return $this->city;
  }
  public function getCountry() {
    return $this->country;
  }
  public function getSales() {
    return $this->sales;
  }
}
?>