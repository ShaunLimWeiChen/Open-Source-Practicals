<html>
<?php 
$str="1234567";
$str1= substr($str,2,3);
print_r($str1);
$epochDT=mktime(12,20,30,1,1,2001); // Return epoch date time 
$n1=getdate($epochDT);               // return array-part 
$aNow=getDate();  
print "<br/>";             // return array-part
print "$n1[mday]\\$n1[mon]\\$n1[year]    $n1[hours]:$n1[minutes]:$n1[seconds]";
print '<br/>';
print_r ($epochDT);
print "<br/>";
print_r ($aNow);
print "<br/>";
$n2=localtime();
print "\nPrinting n2";
print "\n";
print_r ($n2);
print "<br/>";
print "$n2[2]:$n2[1]:$n2[0]";
$now=time();
$diff=$now-$epochDT;
print '<br/>';
print "Calculating diff using epoch time in years ";
print_r ($diff/(60*60*24*365));