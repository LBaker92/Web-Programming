<?php
/*
  Table Data Gateway for the Artist table. 
 */
class ProductTableGateway extends TableDataGateway
{    
   public function __construct($dbAdapter) 
   {
      parent::__construct($dbAdapter);
   }
  
   protected function getDomainObjectClassName()  
   {
      return "Product";
   } 
   protected function getTableName()
   {
      return "Products";
   }
   protected function getOrderFields() 
   {
      return 'name';
   }
   
   protected function getPrimaryKeyName() {
      return "id";
   }
   
}

?>