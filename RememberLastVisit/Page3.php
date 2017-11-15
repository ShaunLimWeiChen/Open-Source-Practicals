<?php
if(isset($_COOKIE['LastVisitPage']))
{
unset($_COOKIE['LastVisitPage']);
setcookie("LastVisitPage", "Page3", time()+3600, "/","", 0);
}
else
{
	setcookie("LastVisitPage", "Page3", time()+3600, "/","", 0);
}
?>