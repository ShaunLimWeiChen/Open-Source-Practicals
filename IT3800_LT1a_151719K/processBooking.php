<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head></head>
<body>
<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');

$adminno = $_POST["adminno"];
$lessondesc = $_POST["lessondesc"];
$date = $_POST["date"];
$epochDateTime = "";
$validday=substr($date, 0, 2);
$validmonth=substr($date, 2, 2);
$validyear=substr($date, 4, 4);
if (!checkdate($validmonth,$validday,$validyear))
{
        echo "Invalid date!";
    }
	else
	{
chkValidDate($date);
	}

function chkValidDate($inputDate)
{
	$adminno = $_POST["adminno"];
    $lessondesc = $_POST["lessondesc"];
    $date = $_POST["date"];
    $inputDate = $date;
		$dateTimepart = $inputDate;
		$day=substr($dateTimepart, 0, 2);
		$month=substr($dateTimepart, 2, 2);
		$year=substr($dateTimepart, 4, 4);
		$epochDateTime=mktime(23,59,59,$month,$day,$year);
		$epochNow = time();
		$diff = $epochDateTime - $epochNow;

		if ( $diff < (60*60*24 - $diff)){
				// earlier than today
			echo "Date is out of range!";
			}
	    else if ($diff > (30 *60*60*24)){
			echo "Date is out of range!";
			}
			else
			{
				session_start();
        if (!array_key_exists ( "StudentID", $_SESSION))
        {
           $Students = Array();
           $_SESSION ["StudentID"] = $Students;
        }
        else
        {
           $Students = $_SESSION["StudentID"];
        }
		
		if (isset($_POST) && array_key_exists ("adminno", $_POST)
        && array_key_exists ("lessondesc", $_POST) && array_key_exists ("date", $_POST))
        {
           $adminno = $_POST["adminno"];
           $lessondesc = $_POST["lessondesc"];
           $date = $_POST["date"];
		   
		   if (isValidAdmin ($adminno)) {
           if (array_key_exists ($adminno, $Students)) {
           echo "The Student $adminno already exists! <br/>";
    }
    else {
        $dateArray = array($day, $month, $year);
        $dateArrayJoin = join('/', $dateArray);
        $Students[$adminno] = Array (
		"adminno" => $adminno,
        "lessondesc" => $lessondesc,
        "date" => $dateArrayJoin
    );
        $_SESSION["StudentID"] = $Students;
        echo html_table($Students);
}
    } else if (!isValidAdmin ($adminno)) {
        echo "Invalid Admin Number";
}
        }
	}
}

/*
function CheckValidDate(){
    $validdateTimepart = $date;
    $validday=substr($validdateTimepart, 0, 2);
    $validmonth=substr($validdateTimepart, 2, 2);
    $validyear=substr($validdateTimepart, 4, 4);
    if (!checkdate($validmonth,$validday,$validyear)){
        echo "Invalid date!";
    }
}
*/

function isValidAdmin($inAdmin) {
	if (preg_match("/^\d{5}[A-Z]$/" , $inAdmin))
	{
return true;
	}
	else
	{
		return false;
		echo "Invalid Admin Number!";
	}

}

function html_table($data = array())
{
    $rows = array();
    foreach ($data as $row) {
        $cells = array();
        foreach ($row as $cell) {
            $cells[] = "<td>{$cell}</td>";
        }
        $rows[] = "<tr>" . implode('', $cells) . "</tr>";
    }
	echo "<table><tr><th>StudentID</th>";
    echo "<th>Lesson Desc.</th>" ;
    echo "<th>Date</th></tr></table>";
    echo "<table>" . implode('', $rows) . "</table>";
}
	?>
	</body>
	
	<style>
table, td, tr {
    border: 1px solid black;
	width: 450px;
}
th {
	text-align: left;
}
</style>
</html>