<?php 
require_once 'HTML/Table.php';
$table = new HTML_Table() ;
$table->addRow(array('one','two', 'three', 'four'), null , 'th') ;
$hrAttrs = array('bgcolor' => 'silver');
$table->setRowAttributes(0, $hrAttrs, true);
  for ($i = 0; $i < 8; $i++) {
 $table->addRow(array('one','two','three')) ;
 
  }
echo $table->toHtml();
echo "<hr>";
?>