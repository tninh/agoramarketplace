<?php
require_once('../mysql_connect.php');

$query = "SELECT UserName, FirstName, LastName, Email, HomeAddress, HomePhone, CellPhone, FROM USERTABLE";

$response = @mysqli_query($dbc, $query);
if($response){
	echo '<table align="left"
	cellspacing="6" cellpadding="10">
	<tr><td align="left"><b>UserName</b></td>
		<td align="left"><b>First Name</b></td>
		<td align="left"><b>Last Name</b></td>
		<td align="left"><b>Email</b></td>
		<td align="left"><b>Home Address</b></td>
		<td align="left"><b>Home Phone</b></td>
		<td align="left"><b>Cell Phone</b></td><tr>';

	while($row = mysqli_fetch_array($response)){
		echo '<tr><td align="left">' .
		$row['UserName'] . '</td><td align="left">' .
		$row['FirstName'] . '</td><td align="left">' .
		$row['LastName'] . '</td><td align="left">' .
		$row['Email'] . '</td><td align="left">' .
		$row['HomeAddress'] . '</td><td align="left">' .
		$row['HomePhone'] . '</td><td align="left">' .
		$row['CellPhone'] . '</td><td align="left">' ;

		echo '</tr>' ;
		

	}
	echo '</table>' ;
}else {
	echo "Database query is unable to access";
	echo mysqli_error($dbc);

}
mysqli_close($dbc);
?>
