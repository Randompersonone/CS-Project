<?php
include("buystock.php");
          $comp="";
          if(isset($_POST['submit'])){
            $comp=mysqli_real_escape_string($conn,$_POST['compname']);
            $no=mysqli_real_escape_string($conn,$_POST['stock']);
            $user=$_SESSION["username"];
            if($comp)
            {
              $sql1="SELECT price FROM companies WHERE c_name='$comp';";
             $q1=mysqli_query($conn,$sql1);
             $x=$q1->fetch_assoc();
             $price=$x['price'];

             $sql2="SELECT c_name FROM stock_quote;";
             $q2=mysqli_query($conn,$sql2);
             $arr1=array();
             while($y=$q2->fetch_assoc())
             {
               array_push($arr1, $y["c_name"]);
             }
             if(!in_array($comp,$arr1))
             {
                echo "<script><alert>The company you have askedd for does not sell stocks as of now, please choose a different company!</alert>window.location.href='buy.html';</script>";
             }
             $gl=rand(-40,40)/10;
              $sql2="UPDATE companies SET volume=volume+'$no' WHERE c_name='$comp';";
              $sql3="UPDATE stock_quote SET volume=volume+'$no' WHERE c_name='$comp';";
              $sql4="UPDATE user_balance SET U_shares=U_shares+'$no' WHERE loginID='$user';";
              $sql5="UPDATE user_balance SET money_spent=money_spent+('$no'*'$price') WHERE loginID='$user';";
              $sql6="UPDATE user_balance SET balance=balance-money_spent WHERE loginID='$user';";
              $sql7="UPDATE shareholders SET curr_balance=(SELECT balance FROM user_balance WHERE loginID='$user') WHERE loginID='$user';";
              $sql13="INSERT into shareholder_companies VALUES('$comp',(SELECT serial_no FROM shareholders as S where S.loginID='$user'))";
              $sql14="INSERT into investor_companies VALUES('$comp',(SELECT rank FROM leaderboard as L where L.loginID='$user'))";

              $sql10="UPDATE leaderboard SET balance=(SELECT balance FROM user_balance WHERE loginID='$user') WHERE loginID='$user';";
              $sql11="UPDATE leaderboard SET I_shares=I_shares+'$no' WHERE loginID='$user';";
              $sql12="UPDATE leaderboard SET shares_value=shares_value+('$no'*'$price') WHERE loginID='$user';";
              $sql15="UPDATE leaderboard SET gain_loss='$gl' WHERE loginID='$user';";
              $sql15="UPDATE shareholders SET gain_loss='$gl' WHERE loginID='$user';";
              $q2=mysqli_query($conn,$sql2);
              $q3=mysqli_query($conn,$sql3);
              $q4=mysqli_query($conn,$sql4);
              $q5=mysqli_query($conn,$sql5);
              $q6=mysqli_query($conn,$sql6);
               $q7=mysqli_query($conn,$sql7);
               $q10=mysqli_query($conn,$sql10);
               $q11=mysqli_query($conn,$sql11);
               $q12=mysqli_query($conn,$sql12);
               $q13=mysqli_query($conn,$sql13);
               $q14=mysqli_query($conn,$sql14);
               $q15=mysqli_query($conn,$sql15);
               $q16=mysqli_query($conn,$sql16);

                  

                echo "<script>alert('Great! Stocks have been added to your account, we wish you good luck!')</script>";
              
          }
        }
          ?>