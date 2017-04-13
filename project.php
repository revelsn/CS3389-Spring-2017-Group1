
if($_POST['submit'])
{
$login = $_POST['login'];

   /* algorithm to hash the password*/
	$username = $_POST['username'];
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$city = $_POST['city'];

/*Validation of the Input in form*/

	if($firstname =="") 
	{ $errorMsg= "error : You did not enter your First name."; }
else
	if($lastname == "") 
	{ $errorMsg= "error : You did not enter your last name."; }
else
	if(!ctype_alnum($lastname) && $lastname == "") 
	{ $errorMsg= "error : You did not enter Correct UserName"; } // To check username is alphanumeric
else
	if(is_numeric(trim($dob)) == false)
	{ $errorMsg= "error : Please enter correct date of birth."; }
else
	if($gender != 'male' && $gender != 'female') 
	{ $errorMsg= "error : You did not entered Correct Gender."; }
else 
	if($address == "") 
	{ $errorMsg= "error : You did not entered Address."; }
else
	if($city == "") 
	{ $errorMsg= "error : You did not entered City."; }

	$result=mysql_query("insert into dusers values ('$login', '$password', '$firstname', '$lastname', '$dob', '$gender', '$address', '$city')")
	
	//Validation after the Insert Query:
	if(!empty($result)) {
                $error_message = "";
                $success_message = "You have registered successfully!";                 
        } else {
                $error_message = "Problem in registration. Try Again!"; 
        }