<?php
include('compdetails.php');
 if(isset($_SESSION['success'])){
    $comp=mysqli_real_escape_string($conn,$_POST['compname']);
    $_SESSION['comp']=$comp;
    echo "<script>window.onlocation.href='compdetails1.php'</script>";
  }
?>
