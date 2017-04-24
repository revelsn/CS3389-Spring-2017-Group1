<?php
date_default_timezone_set("America/Chicago");


$Monday = array("10","11","12","1","2","3","4","5","6");
$Tuesday= array("10","11","12","1","2","3","4","5","6");
$Wednesday = array("10","11","12","1","2","3","4","5","6");
$Thursday = array("10","11","12","1","2","3","4","5","6");
$Friday = array("10","11","12","1","2","3","4","5","6");

switch
{
	case Monday:
	$Monday([pickupTime.date(h)] + 1)
	break
	case Tuesday:
	$Tuesday([pickupTime.date(h)] + 1)
	break
	case Wednesday:
	$Wednesday([pickupTime.date(h)] + 1)
	break
	case Thursday:
	$Thursday([pickupTime.date(h)] + 1)
	break
	case Friday:
	$Friday([pickupTime.date(h)] + 1)
	break

}


?>