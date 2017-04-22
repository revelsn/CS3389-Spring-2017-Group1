<?php
	include 'header.php';
	$_SESSION['pageTitle'] = 'View Inventory';
?>

		<div class="container">
			<div class="jumbotron"><h1>Hello!</h1></div>
			
			<div class="row">
				<div class="col-sm-6">
					Inventory
				</div>
				<div class="col-sm-6 text-right">
					<a class='btn btn-primary' href='addItem.php'><span class="glyphicon glyphicon-plus"></span> Add an item</a>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-12">
					<form class="form-horizontal" action="WorkerInventoryView.php" method="POST">
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
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<table class="table-hover table-striped table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Price</th>
								<th>In Stock</th>
								<th>Category</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?PHP
								$connectionString = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
								$opt = [
									PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
									PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
									PDO::ATTR_EMULATE_PREPARES   => false,
								];
								$conn = new PDO($connectionString, $user, $pass, $opt);
								if (count($_POST) == 0 || $_POST['searchtype'] == 1)
								{
									$sql = "SELECT * FROM cs3389.inventory order by name desc";
								
								}else
								{
									$sql = "SELECT * FROM cs3389.inventory where ".$_POST['searchtype']." 
									LIKE \"%".$_POST['searchterm']."%\" order by ".$_POST['searchtype']." desc";
								}	
								$data = $conn->query($sql)->fetchAll();
								
								if(count($data) > 0){
									foreach($data as $item){
										echo "<tr>";
										echo "<td>".$item['name']."</td>";
										echo "<td>".$item['price']."</td>";
										echo "<td>".$item['stock']."</td>";
										echo "<td>".$item['category']."</td>";
										echo "<td><form class=\"form-horizontal\" action=\"deleteItem.php\" method=\"POST\">
												<input type=\"hidden\" id=\"name\" name=\"name\" value=\"".$item['name']."\">
												<button type=\"submit\" class=\"btn btn-default\">Delete</button>
										</form></td>"; 
										echo "<td><form class=\"form-horizontal\" action=\"changeStock.php\" method=\"POST\">
												<input type=\"hidden\" id=\"name\" name=\"name\" value=\"".$item['name']."\">
												<input type=\"hidden\" id=\"stock\" name=\"stock\" value=\"".$item['stock']."\">
												<button type=\"submit\" class=\"btn btn-default\">Change Stock</button>
										</form></td>"; 
										echo "</tr>";
									}
								}
								else{
									echo "<tr><td colspan='4'>No inventory found</td></tr>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
<?php include 'footer.php';?>