<?php 

		$servername = "localhost";
		$username = "hroboter_hoang";
		$password = "Angela2014";
		$dbname = "hroboter_user";

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    
			//$query = "SELECT * FROM PRODUCTS;";
			$query = " SELECT distinct p.*, d.*" .
                  " from  PRODUCTS p " .
                  " INNER JOIN ( " .
           
                  " SELECT r1.productId, count(r1.productId) as count, sum(r1.rating) as sum, ".
                  " sum(r1.rating)/count(r1.productId) as avgRating " .
                  " FROM Rating r1 " .
                  " GROUP BY r1.productId ) d " .
          
                  " ON p.id = d.productId " .
                  " order by d.avgRating desc " ;
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

