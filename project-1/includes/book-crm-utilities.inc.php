<?php

/*
Takes a file path.
Returns an array of customer objects constructed from the values inside the file.
*/
function readCustomers($fileStr) {
    $inFile = file($fileStr) or die ('CANNOT OPEN FILE');
    $delimiter = ';';
    foreach($inFile as $customer) {
      $customerFields = explode($delimiter, $customer);
      $customerArray[] = new Customer($customerFields[0], $customerFields[1], $customerFields[2], $customerFields[3], $customerFields[4], $customerFields[5], $customerFields[6], $customerFields[7], end($customerFields));
    }
    return $customerArray;
}

/*
Takes a file path.
Returns an array of order objects constructed from the values inside the file.
*/
function readOrders($fileStr) {
  $inFile = file($fileStr) or die ('CANNOT OPEN FILE');
  $delimiter = ',';
  foreach($inFile as $order) {
    $orderFields = explode($delimiter, $order);
    $orderArray[] = new Order($orderFields[0], $orderFields[1], $orderFields[2], $orderFields[3], $orderFields[4]);
  }
  return $orderArray;
}

/*
Takes an order array and a customer.
Returns true if there is an order that belongs to the customer, otherwise returns false.
*/
function hasOrder($orders, $customer) {
  foreach ($orders as $order) {
    if ($order->getCustomerId() == $customer) {
      return true;
    }                   
  }
  return false;
}

/*
Takes a customer array.
Prints a customer's information if that customer was being queried.
*/
function printCustomerInfo($customers) {
  foreach ($customers as $customer) {
    if ($customer->getId() == $_GET['customer']) {
?>
      <h4><?=$customer->getName()?></h4>
      <?=$customer->getUni()?>
      <br>
      <?=$customer->getAddress()?>
      <br>
      <?=$customer->getCity() . ", " . $customer->getCountry()?>
<?php
    return;
    }
  }
}

/*
Takes a customer array.
Fills a table with the data inside the customer array.
*/
function printCustomers($customers) {
  foreach ($customers as $customer) {
?>
      <tr>
        <td class="mdl-data-table__cell--non-numeric"><a href="book-crm.php?customer=<?=$customer->getId()?>"><?=$customer->getName()?></a></td>
        <td class="mdl-data-table__cell--non-numeric"><?=$customer->getUni()?></td>
        <td class="mdl-data-table__cell--non-numeric"><?=$customer->getCity()?></td>
        <td><span class="inlinesparkline"><?=$customer->getSales()?></span></td>
      </tr>
<?php
    }
}
/*
Takes an order array.
Fills a table with data if that order belongs to the customer that was queried.
*/
function printOrders($orders) {
  foreach ($orders as $order) {
    if ($order->getCustomerId() == $_GET['customer']) {
?>
   <tr>
   <td class="mdl-data-table__cell--non-numeric"><img src="images/tinysquare/<?=$order->getIsbn()?>.jpg"></td>
   <td class="mdl-data-table__cell--non-numeric"><?=$order->getIsbn()?></td>
   <td class="mdl-data-table__cell--non-numeric"><a href="#"><?=$order->getTitle()?></a></td>
<?php
    }
  }
}
?>