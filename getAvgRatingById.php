<?php require_once('config.php'); ?>
<?php 
  if (isset($_GET['id'])) {
  	$id = $_GET['id'];
  	echo getAvgRatingById($id);
  }

?>