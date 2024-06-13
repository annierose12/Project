<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "shop_db";

session_start();

$data = mysqli_connect($host,$user,$password,$db);
if($data===false)
{
   die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
   $username=$_POST["username"];
   $password=$_POST["password"];

   $sql = "select * from login where username='".$username."' AND password='".$password."'
   ";

   $result=mysqli_query($data,$sql);
   $row=mysqli_fetch_array($result);

   if($row["usertype"]=="user")
   {  
    
      header("location:admin.php");
   }

     elseif($row["usertype"]=="admin")
   {
  
    header("location:admin.php");
   }
    
   else
   {
     echo "username or password incorrect";
   }


}



?>

<!DOCTYPE html>
<html>
    <head>
     <meta charset="UTF-8">
     <meta name="width=device-width, initial-scale=1.0">
    <title>User Login Form</title>
    
</head>
<style>
  body{
    background-color:maroon; 
    
  }
</style>


<body>

  <center>
    <h1>Login Form</h1>
    <br><br><br><br>
      <div style ="background-color: gray; width: 500px;">
       <br><br>

       <form action="#" method="POST">
      <div>
        <label>username</label>
        <input type="text" name="username" required>
      </div>
       <br><br>
      <div>
        <label>password<label>
          <input type="password" name="password" required>
      </div>
      <br><br>
      <div>
        <input type ="submit" value="login">
      </div>
    </form>


      <br><br>
    </div>
  </center>


</body>
</html>