<?php
	include 'header.php';
	$_SESSION['pageTitle'] = 'View Cart';
?>

		<div class="container">
			<div class="jumbotron"><h1>Hello!</h1></div>
			
			
			<form class="form-horizontal" action = "placeOrder.php" method="POST">
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
				<div class="col-sm-6 text-right">
					<button type="submit" class="btn btn-default">Place Order</button>
				</div>
			</div>
		</form>
			<div class="row">	
				<div class="col-sm-12">
					<!--<form class="form-horizontal" action="WorkerInventoryView.php" method="POST">
					<div class="form-group">
						<select id="searchtype" name="searchtype">                      
						<option value="1">--Select Search Type--</option>
						<option value="name">Name</option>
						<option value="category">Category</option>
					</select>
						
							<label for="name" class="col-sm-2 control-label">Search Term</label>
							
								<input type="text" class="form-control" id="searchterm" name="searchterm" placeholder="">
								
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">Search</button>
							</div>
						</div>
							
						</div>
					</form>-->
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
				<?PHP
					if(count($_SESSION['orderItems']) > 0)
					{ 
					?>
					<table class="table-hover table-striped table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Amount</th>
								<th>Price Per Item</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?PHP

							foreach($_SESSION['orderItems'] as $key=>$value)
							{
								try{
								
									$stmt = $conn->prepare("Select name, price from inventory where name = :itemName");

									/*** bind the parameters ***/
									$stmt->bindParam(':itemName', $_SESSION['orderItems'][$key], PDO::PARAM_STR);

									/*** execute the prepared statement ***/
									$stmt->execute();

									/*** check for a result ***/
									$result = $stmt->fetch();
								}
								catch(PDOException $e){
									die($e);
								}
								echo "<tr>";
								echo "<td>".$_SESSION['orderItems'][$key]."</td>";
								echo "<td>".$_SESSION['orderAmounts'][$key]."</td>";
								echo "<td>".$result['price']."</td>";
								echo "<td><form class=\"form-horizontal\" action=\"removeItem.php\" method=\"POST\">
										<input type=\"hidden\" id=\"key\" name=\"key\" value=\"".$key."\">
										<button type=\"submit\" class=\"btn btn-default\">Remove</button>
									</form></td>"; 
								echo "<td><form class=\"form-horizontal\" action=\"changeAmount.php\" method=\"POST\">
										<input type=\"hidden\" id=\"key\" name=\"key\" value=\"".$key."\">
										<input type=\"hidden\" id=\"name\" name=\"name\" value=\"".$result['name']."\">
										<input type=\"hidden\" id=\"amount\" name=\"amount\" value=\"".$_SESSION['orderAmounts'][$key]."\">
										<button type=\"submit\" class=\"btn btn-default\">Change Amount</button>
									</form></td>";
								echo "</tr>";
							}
							}
							else
							{
							echo "<p>No items in cart</p>";
							}
								/*if (count($_POST) == 0 || $_POST['searchtype'] == 1)
								{
									$sql = "SELECT * FROM inventory order by name asc";
								
								}else
								{
									$sql = "SELECT * FROM inventory where ".$_POST['searchtype']." 
									LIKE \"%".$_POST['searchterm']."%\" order by ".$_POST['searchtype']." asc";
								}	
								$data = $conn->query($sql)->fetchAll();
								
								if(count($data) > 0){
									foreach($data as $item){
									if($item['stock'] > 0)
									{
										echo "<tr>";
										echo "<td>".$item['name']."</td>";
										echo "<td>".$item['price']."</td>";
										//echo "<td>".$item['stock']."</td>";
										echo "<td>".$item['category']."</td>";
										echo "<td><form class=\"form-horizontal\" action=\"addToCart.php\" method=\"POST\">
												<input type=\"hidden\" id=\"name\" name=\"name\" value=\"".$item['name']."\">
												<button type=\"submit\" class=\"btn btn-default\">Add To Cart</button>
										</form></td>";
										echo "</tr>";
									}else
									{
										echo "<tr>";
										echo "<td>".$item['name']."</td>";
										echo "<td>".$item['price']."</td>";
										//echo "<td>".$item['stock']."</td>";
										echo "<td>".$item['category']."</td>";
										echo "<td>Item temporarily out of stock</td>";
										echo "</tr>";
									}
									}
								}
								else{
									echo "<tr><td colspan='4'>No inventory found</td></tr>";
								}*/
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
<?php include 'footer.php';?>