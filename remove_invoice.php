<?php

require "dbconnection.php";
$dbcon = createDbConnection();

$invoice_item_id = 1 ;
$sql = "DELETE FROM invoice_items WHERE InvoiceId = $invoice_item_id";

$statement = $dbcon->prepare($sql);
$statement->execute();