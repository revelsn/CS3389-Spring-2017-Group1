<?php
	include 'header.php';
	$_SESSION['pageTitle'] = 'Employees';
?>



		<div class="container">
									<div class="col-sm-6 text-right">
					<a class='btn btn-primary' href='inventory.php'><span class="glyphicon glyphicon-plus"></span>Customer Inventory View</a>
				</div>
							<div class="col-sm-6 text-right">
					<a class='btn btn-primary' href='WorkerInventoryView.php'><span class="glyphicon glyphicon-plus"></span>Go To Employee Inventory View</a>
				</div>
			
			<div class="row">
				
				<div class="col-sm-6 text-right">
					<a class='btn btn-primary' href='addEmployee.php'><span class="glyphicon glyphicon-plus"></span> Add an Employee</a>
				</div>
				<div class="col-sm-6 text-right">
					<a class='btn btn-primary' href='removeEmployee.php'><span class="glyphicon glyphicon-plus"></span> Downgrade an Employee</a>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<table class="table-hover table-striped table">
						
						<tbody>
							<?PHP
								
								
								 $data = $conn->query('SELECT * FROM users where role = 2')->fetchAll();
								 if(count($data) > 0){
									foreach($data as $contact){
										echo "<tr>";
										 echo "<td>".$contact['user_id']."</td>";
										 echo "<td>".$contact['FirstName']." ".$contact['LastName']."</td>";
										 echo "<td>".$contact['email']."</td>";
										 echo "<td>".$contact['phone_number']."</td>";
										 echo "<td>".$contact['role']."</td>";
										echo "</tr>";
									}
								 }
								else{
									 echo "<tr><td colspan='4'>No contacts found</td></tr>";
									}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
    <?php include 'footer.php';?>