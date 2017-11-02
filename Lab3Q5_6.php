<?php
include 'Lab3Q6.php';
function chkValidDate($inputDate) {
	$lessonDateParts = explode('-', $inputDate);
	$day = $inputDate[0];
	$month = $inputDate[1];
	$year = $inputDate[2];
	print ("Date: $day,$month,$year") ;
	print ("</br>") ;
	if (! checkdate ( $month, $day, $year )) {
		return - 1;
	} else {
		$epochDMY = mktime ( 23, 59, 59, $month, $day, $year );
		$epochNow = time ();
		$diff = $epochDMY - $epochNow;
		print "Difference in epoch value: $diff </br>";
		if ($diff < (30 * 60 * 60 * 24)) {
			// earlier than today
			return - 2;
		} else if ($diff > (30 * 60 * 60 * 24)) {
			return - 3;
		} else
			return 0;
	}
}
$student = array (
		"10000A" => "Tan Ah Kow",
		"10001A" => "Lim Tong Kee",
		"10003F" => "Ong Mei Ling" 
);
$NewStudentID = "99999N";
$NewName = "Tony Tee";
$lessonDate = "21-03-2018";
//$validDate = chkValidDate ( $lessonDate );
$UtilityObject=new Utility($lessonDate);
$validDate = Utility::isDateWithin30Days($lessonDate);
$UtilityObject->printDates();
if (!$validDate) {
	if (array_key_exists ( $NewStudentID, $student )) {
		print "Student $NewName found! Cannot insert.</br>";
		print_r ( $student );
	} else {
		$student ["$NewStudentID"] = $NewName;
		print_r ( $student );
	}
} else {
	print "Error code: $validDate";
}
?>
