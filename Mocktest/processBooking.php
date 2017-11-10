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
chkValidDate($date);

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
		$epochDateTime=mktime(23,59,59,$day,$day,$year);
		$epochNow = time();
		$diff = $epochDateTime - $epochNow;
		if ( $diff < (60*60*24)){
				// earlier than today
			echo "Date is out of range!";
			}
	    else if ($diff > (30 *60*60*24)){
			echo "Date is out of range!";
			}
			/*
			if ($date < date('ddmmYYYY'))
			{
				echo "Invalid date";
			}
			else if ($date > (date('ddmmYYYY' + 30)))
			{
				echo "Invalid date";
			}
			*/
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
        $Students[$adminno] = Array (
		"adminno" => $adminno,
        "lessondesc" => $lessondesc,
        "date" => $date
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
table, th, td, tr {
    border: 1px solid black;
}
</style>
</html>