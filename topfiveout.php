<?php require_once('config.php'); ?>


<?php 
	try
	  {
	    $conn = getConnectionPDO();
	    
	    $query = " select distinct p.*, d.*" .
                  " from  Product p " .
                  " INNER JOIN ( " .
           
                  " SELECT r1.productId, count(r1.productId) as count, sum(r1.rating) as sum, ".
                  " sum(r1.rating)/count(r1.productId) as avgRating " .
                  " FROM Rating r1 " .
                  " GROUP BY r1.productId ) d " .
          
                  " ON p.id = d.productId " .
                  " order by d.avgRating desc " ;

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