<?php
if(isset($_COOKIE['LastVisitPage']))
{
	if ($_COOKIE['LastVisitPage'] == "Page1")
	{
		header("Location: Page1.php");
	}
	else if ($_COOKIE['LastVisitPage'] == "Page2")
	{
		header("Location: Page2.php");
	}
	else if ($_COOKIE['LastVisitPage'] == "Page3")
	{
		header("Location: Page3.php");
	}
	else if ($_COOKIE['LastVisitPage'] == "Page4")
	{
		header("Location: Page4.php");
	}
}
?>