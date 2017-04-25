<?PHP include 'header.php';?>

	<?PHP
		$user_id = $_SESSION['user_id'];
		try{
			$sql = "INSERT into orders (user_id, time_id, status) values($user_id, 1, 1)";
			$conn->prepare($sql)->execute();
		}
		catch(PDOException $e){
			die($e);
		}
		try{
			
			$sql = "select order_id from orders where user_id = :user_id AND status = 1";
			$stmt = $conn->prepare($sql);//->execute();
			$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
			$stmt->execute();
			$result = $stmt->fetch();
			$order_id = $result['order_id'];
			echo $order_id;
		}
		catch(PDOException $e){
			die($e);
		}
			//echo $order_id;
			foreach($_SESSION['orderItems'] as $key=>$value)
			{
				//echo $value;
				/*try{
					$sql = "SELECT item_id from inventory where name = :name)";
					$stmt = $conn->prepare($sql);//->execute();
					$stmt->bindParam(':name', $value, PDO::PARAM_STR);
					$stmt->execute();
					$result = $stmt->fetch();
					$item_id = $result['item_id'];
				}
				catch(PDOException $e){
					die($e);
				}
				echo "<div>".$item_id."</div>";
				try{
					$sql = "INSERT into order_items (order_id, item_id, quantity) values($order_id, $item_id, ".$_SESSION['orderAmounts'][$key].")";
					$conn->prepare($sql)->execute();
				}
				catch(PDOException $e){
					die($e);
				}*/
			}
			
			echo "<div>Order submitted. Click <a href=\"inventory.php\">here</a> to return to inventory.</div>";
		?>

<?PHP include 'footer.php';?>