<?php 

		$servername = "localhost";
		$username = "hroboter_hoang";
		$password = "Angela2014";
		$dbname = "hroboter_user";

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    
			$query = "SELECT * FROM PRODUCTS;";
		
			$ps = $conn->prepare($query);
			$ps->execute();
			$data = $ps->fetchAll(PDO::FETCH_ASSOC);
			$myJSON = json_encode($data);
			echo $myJSON;

			}
		catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
?>

