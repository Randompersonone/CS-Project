<?php
//echo "flag0";
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
$name="";
$pass="";
$id="";
$errors=array();

if(isset($_POST['okayish'])) {
  $id=mysqli_real_escape_string($conn,$_POST['id']); 
  $pass=mysqli_real_escape_string($conn,$_POST['pass']);
  $name=mysqli_real_escape_string($conn,$_POST['name']);
  if(empty($user)){
    array_push($errors, "Username is required");
  }
  if(empty($pass)){
    array_push($errors, "Password is Required");
  }
  if(empty($id)){
    array_push($errors, "Login-ID is Required");
  }
  if(count($errors)==0) {
    //$password= md5($pass); //Encrypting password
    $sql="select * FROM reg_user WHERE password = '$pass' AND loginID = '$id'";
    $q=mysqli_query($conn,$sql);
    if(!$q || (mysqli_num_rows($q))==1){
      alert("You are already registered as a user, please login!");
    //  die("YES, THIS WORKS.");
      //$_SESSION["username"]=$user;
      //$_SESSION["success"]="You are now logged in";
      header('location: login.html');
    }
  } //redirect to home page
  else if(!$q || mysqli_num_rows($q)==0){
      $sql="INSERT INTO reg_users VALUES('$name',$id','$pass')";
      // mysqli_query($conn,$sql);
      if(!mysqli_query($conn,$sql))
      {
          die(mysqli_query($conn,$sql));
      }
      else{ array_push($errors,"Success"); 
      $_SESSION["username"]=$id;
      $_SESSION["success"]="You are now logged in";
      header('location:user_site.php'); //redirect to home page
    }
  }
  else{
    array_push($errors,"Not a valid Username/Password");
  }
}
if(isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header('location: user.php');
}
?>

