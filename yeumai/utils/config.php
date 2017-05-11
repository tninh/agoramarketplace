<?php
$g_login_session_key = "LOGIN_SESSION_KEY";
//using mysqli
function getConnection()
{
        //Connecting to mysql database
        $conn = mysqli_connect('localhost', 'user', 'password', 'dbname')
            or die('Error connecting to MySQL server.');
        return $conn;
}
///using pdo
function getConnectionPDO()
{
   try {
    $conn = new PDO("mysql:dbname=cmpe272;host=cmpe272.db.10791046.hostedresource.com", "cmpe272", "Sanjose123!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }
   catch(PDOException $e)
   {
        echo "Connection failed: " . $e->getMessage();
   }
   return $conn;
}
function CheckLoginSESSION()
{
    global $g_login_session_key;
    session_start();
    $sessionvar = $g_login_session_key;
    if (empty($_SESSION[$g_login_session_key]))
    {
        return false;
    }
    else
    {
        return true;
    }
}
function CheckLoginInDB($useremail, $userpass)
{
    $conn = getConnectionPDO();
    if ((strlen($useremail) > 0) && (strlen($userpass) > 0))
    {
        $sql = " select * from User " .
               " where userEmail = :user_email and userPass = :user_pass";
        $ps = $conn->prepare($sql);
        $ps->bindParam(':user_email', $useremail);
        $ps->bindParam(':user_pass', $userpass);
        $ps->execute();
        $result = $ps->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return true;
        }
    }
    return false;
}
function constructTable($data, $showHeader, $keyName, $editLink, $deleteLink)
{
    print "<table class='table table-hover'>\n";
    $doHeader = $showHeader;
    foreach ($data as $row)
    {
        if ($doHeader)
        {
            print "   <tr>\n";
            if(!empty($editLink))
                print "      <th>&nbsp;</th>\n";
            foreach ($row as $name => $value)
                print "      <th>$name</th>\n";
            if(!empty($deleteLink))
                print "      <th>&nbsp;</th>\n";
            print "   </tr>\n";
            $doHeader = false;
        }
            print "   <tr>\n";
        $keyValue = "";
        if(!empty($keyName))
            $keyValue = $row[$keyName];
        if(!empty($editLink))
            print "      <td><a href='". $editLink ."?id=". $keyValue ."'>Edit</a</th>\n";
        foreach ($row as $name => $value)
            print "      <td>$value</td>\n";
        if(!empty($deleteLink))
            print "      <td><a href='". $deleteLink ."?id=". $keyValue ."'>Delete</a</th>\n";
        print "   </tr>\n";
    }
    print "</table>\n";
}
function drawStars($avg_rating){
    for ($i = 0; $i < $avg_rating; $i++) {
    print "<span class='glyphicon glyphicon-star'></span>";
    }
    for ($i = $avg_rating; $i < 5; $i++) {
        print "<span class='glyphicon glyphicon-star-empty'></span>";
    }
}
function ratingStars(){
    //for ($i = 0; $i < $avg_rating; $i++) {
    //print "<span class='glyphicon glyphicon-star'></span>";
    //}
    for ($i = 0; $i < 5; $i++) {
        print "<span class='glyphicon glyphicon-star-empty'></span><";
    }
}
function getAvgRatingById($id){
    $conn = getConnectionPDO();
    $query = " SELECT avg(rating) as avg_rating, count(rating) as count_rating from Rating where productId = :id ";
    $params = array(':id' => $id);
    $ps = $conn->prepare($query);
    $ps->execute($params);
    $data = $ps->fetchAll(PDO::FETCH_ASSOC);
    $avg_rating = 0;
    foreach ($data as $row) {
        $avg_rating = $row["avg_rating"];
    }
    return $avg_rating;
}
function getCountRatingById($id){
    $conn = getConnectionPDO();
    $query = " SELECT avg(rating) as avg_rating, count(rating) as count_rating from Rating where productId = :id ";
    $params = array(':id' => $id);
    $ps = $conn->prepare($query);
    $ps->execute($params);
    $data = $ps->fetchAll(PDO::FETCH_ASSOC);
    $count_rating = 0;
    foreach ($data as $row) {
        $count_rating = $row["count_rating"];
    }
    return $count_rating;
}
function Redirect($url)
{
    //header("Location:  " . $url);
    print "<script type='text/javascript'>
        window.location = '". $url ."';
    </script>";
    exit();
}
function checkRating($userEmail, $productId, $rating, $comments){
    try
    {
        $conn = getConnectionPDO();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = " select * from Rating " .
               " where userEmail = :user_email and productId = :product_id ";
        $params = array(':user_email' => $userEmail,
                         ':product_id' => $productId);
        $ps = $conn->prepare($sql);
        $ps->execute($params);
        $result = $ps->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return true;
        }
        return false;
    }
    catch (PDOException $ex)
    {
        echo 'ERROR: ' . $ex->getMessage();
    }
    catch (Exception $ex)
    {
        echo 'ERROR: ' . $ex->getMessage();
    }
}
function insertRating($userEmail, $productId, $rating, $comments){
    try
    {
        $conn = getConnectionPDO();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = " insert into Rating (userEmail, productId, rating, comments) " .
               " values (:user_email, :product_id, :rating, :comments) ";
        $params = array(':user_email' => $userEmail,
                         ':product_id' => $productId,
                         ':rating' => $rating,
                         ':comments' => $comments);
         $ps = $conn->prepare($sql);
         return $ps->execute($params);
    }
    catch (PDOException $ex)
    {
        echo 'ERROR: ' . $ex->getMessage();
    }
    catch (Exception $ex)
    {
        echo 'ERROR: ' . $ex->getMessage();
    }
}
function updateRating($userEmail, $productId, $rating, $comments){
    try
    {
        $conn = getConnectionPDO();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = " update Rating set rating = :rating, comments = :comments where userEmail = :user_email and productId = :product_id ";
        $params = array(':user_email' => $userEmail,
                         ':product_id' => $productId,
                         ':rating' => $rating,
                         ':comments' => $comments);
         $ps = $conn->prepare($sql);
         return $ps->execute($params);
    }
    catch (PDOException $ex)
    {
        echo 'ERROR: ' . $ex->getMessage();
    }
    catch (Exception $ex)
    {
        echo 'ERROR: ' . $ex->getMessage();
    }
}
function getMarketProduct($link) {
        // Initialize cURL session
      $ch = curl_init();
      // Set the URL of the page file to download.
      curl_setopt($ch, CURLOPT_URL, $link);
      // Ask cURL to write the contents to a file
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      //Execute the c session
      $content = curl_exec($ch);
      // Close cURL session
      curl_close($ch);
      // Close file
      return $array = json_decode(trim($content), TRUE);
}
function createNewUser($useremail, $userfirst, $userlast, $usergender,
    $cellphone, $homephone, $address, $city, $state, $zip,
     $userpass, $userrole, $search){
     try
    {
        $conn = getConnectionPDO();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ((strlen($useremail) > 0) && (strlen($userpass) > 0))
        {
            $sql = " select userEmail from User" .
                                " where userEmail = :user_email";
            $ps = $conn->prepare($sql);
            $ps->bindParam(':user_email', $useremail);
            $ps->execute();
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);
            if (count($result) > 0)
            {
                alert("This email already exists.");
                echo "This email already exists.";
                //return False;
                return "This email already exists.";
            }
            else
            {
                $sql = " insert into User (userEmail, userFirst, userLast, userGender, cellPhone, address, city " .
                       " , state, zip, homePhone, userRole, userPass, search)" .
                       " values (:user_email, :user_first, :user_last, :user_gender, :cell_phone " .
                       " , :address, :city, :state, :zip, :home_phone, :user_role, :user_pass, :search)";
                $params = array(':user_email' => $useremail,
                        ':user_first' => $userfirst,
                        ':user_last' => $userlast,
                        ':user_gender' => $usergender,
                        ':cell_phone' => $cellphone,
                        ':address' => $address,
                        ':city' => $city,
                        ':state' => $state,
                        ':zip' => $zip,
                        ':home_phone' => $homephone,
                        ':user_role' => $userrole,
                        ':user_pass' => $userpass,
                        ':search' => $search);
                $ps = $conn->prepare($sql);
                $ps->execute($params);
                return "Lala";
            }
        }
    }
    catch (PDOException $ex)
    {
        echo 'ERROR: ' . $ex->getMessage();
    }
    catch (Exception $ex)
    {
        echo 'ERROR: ' . $ex->getMessage();
    }
}
?>