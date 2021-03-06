<?php
/*
   Represents a single row for the Genre table. 
   
   This a concrete implementation of the Domain Model pattern.
 */
class Product extends DomainObject
{  
   
   static function getFieldNames() {
      return array('id','name','description','price','created','modified','status');
   }

   public function __construct(array $data, $generateExc)
   {
      parent::__construct($data, $generateExc);
   }
   
   // implement any setters that need input checking/validation
}

?>