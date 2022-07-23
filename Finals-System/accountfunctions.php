<?php
session_start();

require 'php/dbconnect.php';




if(isset($_POST['loginme'])){


if(isset($_SESSION['buyer_id']) || isset($_SESSION['seller_id']) ){
               $_SESSION['validate_account'] = "DUAL"; 
               header("Location: index.php"); 
}


else{
if(!empty($_POST['email']) && !empty($_POST['password'])){

   $email =  str_replace("'", "&#039;", $_POST['email']);
    $pass =  str_replace("'", "&#039;", $_POST['password']);

$sql = "SELECT * FROM account where email = '$email' AND passw = '$pass'";

$res = mysqli_query($conn, $sql);

$numrow = mysqli_num_rows($res);

$row = mysqli_fetch_object($res);


  if($numrow == 1){
    
    if( $row->account_type == 'Buyer')
    {
           $_SESSION['buyer_id']  = $row->account_id;
           $_SESSION['buyer_acc_name'] = $email;
           $_SESSION['buyer_fullname'] = $row->lname . ', ' . $row->fname . ' ' . $row->mname;
           $_SESSION['buyer_location']  = $row->strt_brgy .', '. $row->city_municipality. ', '. $row->province;
            header("Location: homepage.php"); 
    }
    else{
        $_SESSION['seller_id']  = $row->account_id;
          $_SESSION['seller_acc_name'] = $email;
           $_SESSION['seller_fullname'] =  $row->lname . ', ' . $row->fname . ' ' . $row->mname;
           $_SESSION['seller_location']  = $row->strt_brgy .', '. $row->city_municipality. ', '. $row->province;
            header("Location: sellerdashboard.php"); 

    }

        }
        else{
           $_SESSION['validate_account'] = "ERROR";
                       header("Location: login.php"); 

        }


}
else{
    echo " WALA FILL UPAN";

}

}
}


if(isset($_POST['signme'])){



 $email =  str_replace("'", "&#039;", $_POST['email']);

$sql = "SELECT * FROM account where email = '$email'";


$res = mysqli_query($conn, $sql);

$numrow = mysqli_num_rows($res);

$row = mysqli_fetch_object($res);


  if($numrow == 1){
    
 
        $_SESSION['validate_email']  = "ERROR";
            header("Location: signup.php"); 

    }
    else{


   $email =  str_replace("'", "&#039;", $_POST['email']);
    $pass =  str_replace("'", "&#039;", $_POST['password']);
     $fname =  str_replace("'", "&#039;", $_POST['firstname']);
    $lname =  str_replace("'", "&#039;", $_POST['lastname']);
     $mname =  str_replace("'", "&#039;", $_POST['middlename']);
    $st_brgy =  str_replace("'", "&#039;", $_POST['st_brgy']);
     $c_m =  str_replace("'", "&#039;", $_POST['city_muni']);
    $pro =  str_replace("'", "&#039;", $_POST['province']);
    $bd =  str_replace("'", "&#039;", $_POST['birthdate']);
    $acc_type =  str_replace("'", "&#039;", $_POST['flexRadioDefault']);



         $sql = "INSERT INTO account ( email, passw, fname, lname, mname, strt_brgy, city_municipality, province, biirthdate, account_type) values ('$email', '$pass' ,'$fname', '$lname', '$mname', '$st_brgy', '$c_m', '$pro', '$bd', '$acc_type')";
        
        $res  = $conn->query($sql);
        
        if($res){
                $_SESSION['validate_account'] ="CREATED";
            header("Location: login.php"); 

        }
        else{
            header("Location: signup.php"); 
        }



    }





}







?>