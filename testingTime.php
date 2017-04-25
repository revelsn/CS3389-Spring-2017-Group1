<?php
	include 'header.php';
	$_SESSION['pageTitle'] = 'Registration';
?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<form class="form-horizontal" action="addEmployee.php" method="POST">
			<div class="col-sm-10">
			<div class="col-sm-10">
			Select Pickup Day
				<div class="col-sm-12">
					<select class="selectpicker" id="Day">
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
			<select class="selectpicker" id="Time">
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