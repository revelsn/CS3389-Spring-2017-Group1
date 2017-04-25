<?PHP
	include 'header.php';
	
	$Day= 'Monday'
	$Time = '11:00-12:00'
	
	
	
	switch($Day)
	{
		case 'Monday':
			$dow = 1;
			break;	
		case 'Tuesday':
			$dow = 2;
			break;
		case 'Wednesday':
			$dow = 3;
			break;
		case 'Thursday':
			$dow = 4;
			break;
		case 'Friday'
			$dow = 5;
			break;
	}
	switch($Time)
		{
		case: '10:00-11:00':
			$hour = 10;
			break;
		case: '11:00-12:00':
			$hour = 11;
			break;
		case: '12:00-1:00':
			$hour = 12;
			break;
		case: '1:00-2:00':
			$hour = 1;
			break;
		case: '2:00-3:00':
			$hour = 2;
			break;
		case: '3:00-4:00':
			$hour = 3;
			break;
		case: '4:00-5:00':
			$hour = 4;
			break;
		case: '5:00-6:00':
			$hour = 5;
			break;
		}
		
?>


<html>
<body>
<form>
Select your favorite fruit:
<select id="day">
  <option value="Monday">Monday</option>
  <option value="Tuesday">Tuesday</option>
  <option value="Wednesday">Wednesday</option>
  <option value="Thursday">Thursday</option>
  <option value="Friday">Friday</option>
</select>
</form>
</body>


</html>
