<?php
if(isset($_COOKIE['LastVisitPage']))
{
unset($_COOKIE['LastVisitPage']);
setcookie("LastVisitPage", "Page4", time()+3600, "/","", 0);
}
else
{
	setcookie("LastVisitPage", "Page4", time()+3600, "/","", 0);
}
?>