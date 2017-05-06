<?php
$g_login_session_key = "LOGIN_SESSION_KEY";


//using pdo
function getConnectionPDO()
{
   try {
    $conn = new PDO("mysql:host=localhost;dbname=dbname", "user", "password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
   }     
   catch(PDOException $e)
   {
        echo "Connection failed: " . $e->getMessage();
   }         
   return $conn;         
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


function Redirect($url)
{
    //header("Location:  " . $url);
    print "<script type='text/javascript'>
        window.location = '". $url ."';
    </script>";
    exit();
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
                return false;
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

                return $ps->execute($params);

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