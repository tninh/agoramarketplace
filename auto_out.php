<?php require_once('config.php'); ?>


<?php 
	try
	  {
	    $conn = getConnectionPDO();
	    
	    $query = " select * from Product order by id ";
	
	    $params = null;
	    $ps = $conn->prepare($query);
	    $ps->execute($params);
	    $data = $ps->fetchAll(PDO::FETCH_ASSOC);
	    
	
	    $myJSON = json_encode($data);
	    
	    echo $myJSON;
	    
	  }
	  catch (PDOException $ex)
	  {	
	        echo 'ERROR: ' . $ex->getMessage();
	  }
	  catch (Exception $ex)
	  {
	        echo 'ERROR: ' . $ex->getMessage();
	  }

?>

               


