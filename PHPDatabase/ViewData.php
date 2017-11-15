<?php
 
// Include the "HtmlTable.Class.php" file first
require_once("HtmlTable.Class.php") ;
 
/*
This array contains all required parameters .
While the order of these parameters is not important , an exception-error will be thrown if they are misspelled (also case-sensitive) .
 
*/
$config = array(
                "db_Host" => "localhost",
                "db_User" => "root" ,
                "db_Passwd" => "" ,
                "db_Name" => "test" ,
                "tbl_Name" => "customers" ,
                "tbl_ColumnOrder" => "cust_id"
                ) ;
$columnNames = array( "cust_id" , "first_name" , "last_name" , "country") ;
  try {
$custom_Table = new HtmlTable($config , $columnNames) ;
unset($custom_Table) ;
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(),"";
    }
	
?>