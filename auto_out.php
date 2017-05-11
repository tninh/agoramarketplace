<?php require_once('config.php'); ?>


<?php 
	try
	  {
	    $conn = getConnectionPDO();
	    
	    $query = "  select p.id, p.title, p.price, p.location, p.image, p.description, p.domain, t.avgRating, t.count
                    from Product p left OUTER JOIN 
                     ( select distinct p.*, d.*
                      from  Product p 
                      INNER JOIN ( 

                          SELECT r.productId, count(r.productId) as count, sum(r.rating) as sum, 
                          sum(r.rating)/count(r.productId) as avgRating 
                          FROM Rating r 
                          GROUP BY r.productId ) d
                      ON p.id = d.productId ) t 
                    on p.id = t.id ";
	
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

               


