<?php
	include 'header.php';
	$_SESSION['pageTitle'] = 'Registration';
?>
<?PHP
	 $formHasBeenPosted = count($_POST) > 0;
	 $formInvalid = false;

	 if($formHasBeenPosted){
	 $day = $_POST['Day'];
	 $time = $_POST['Time'];
	 $sql = "SELECT * FROM pickupTime WHERE Day=$day and Time = $time";
	 $data = $conn->query($sql);
	  foreach($data as $pt){
	  $amount = $pt['Amount'] + 1;
	  }
	   if($amount > "3"){
		 echo "Selected Date/time is full please try again";
		 ?>
		 <div class="col-sm-12">
			<p>Removed Unsuccessfully, click <a href="PickupTime.php">here</a> to go back</p>
		 </div>
		 <?PHP
	   }
	  
	   else{
	   
		$sql = "UPDATE pickupTime SET Amount= $amount WHERE Day=$day and Time = $time";
		$conn->query($sql);
		?>
		
				<div class="col-sm-12">
					<p>Removed successfully, click <a href="home.php">here</a> to go to home</p>
				</div>
			
		<?PHP
		}
	  }
?>
<div class="container">
<?PHP if(!$formHasBeenPosted || $formInvalid){?>
	<div class="row">
		<div class="col-sm-12">
			<form class="form-horizontal" action = "PickupTime.php" method="POST">
			<div class="col-sm-10">
			<div class="col-sm-10">
			Select Pickup Day
				<div class="col-sm-12">
					<select class="selectpicker" id="Day" name="Day">
						<option value="1">Monday</option>
						<option value="2">Tuesday</option>
						<option value="3">Wednesday</option>
						<option value="4">Thursday</option>
						<option value="5">Friday</option>
					</select>
				</div>
				</div>
			<div class="col-sm-10">
			Select Pickup Time
				<div class="col-sm-12">
			<select class="selectpicker" id="Time" name= "Time">
				<option value="10">10:00-11:00</option>
				<option value="11">11:00-12:00</option>
				<option value="12">12:00-1:00</option>
				<option value="1">1:00-2:00</option>
				<option value="2">2:00-3:00</option>
				<option value="3">3:00-4:00</option>
				<option value="4">4:00-5:00</option>
				<option value="5">5:00-6:00</option>
			</select>
			</div>
			</div>
			<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Submit</button>
					</div>
			</div>
			</form>
		</div>
	</div>
</div>
<? }else{?>
			
		<? } ?>
</div>