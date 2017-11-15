<?php
if(isset($_COOKIE['LastVisitPage']))
{
unset($_COOKIE['LastVisitPage']);
setcookie("LastVisitPage", "Page2", time()+3600, "/","", 0);
}
else
{
	setcookie("LastVisitPage", "Page2", time()+3600, "/","", 0);
}
?>
