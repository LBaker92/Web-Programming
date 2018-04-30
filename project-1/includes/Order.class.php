<?php
class Order {
  private $oid_;
  private $cid_;
  private $isbn_;
  private $title_;
  private $desc_;

  function __construct($oid, $cid, $isbn, $title, $desc) {
    $this->oid_ = $oid;
    $this->cid_ = $cid;
    $this->isbn_ = $isbn;
    $this->title_ = $title;
    $this->desc_= $desc;
  }

  public function getOrderId() {
    return $this->oid_;
  }
  public function getCustomerId() {
    return $this->cid_;
  }
  public function getIsbn() {
    return $this->isbn_;
  }
  public function getTitle() {
    return $this->title_;
  }
  public function getDesc() {
    return $this->desc_;
  }
}
?>