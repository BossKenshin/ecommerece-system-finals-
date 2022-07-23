<?php

session_start();

require 'php/dbconnect.php';
$selid = $_SESSION['seller_id'];


$idko = $_SESSION['id_product'];

 if(isset($_POST['editproduct'])){


             if($_POST['product'] && $_POST['size'] && $_POST['price'] &&  $_POST['quantity']){
                 
    //UPDATE IF NEW IMAGE IS ADDED         
                          $pro =  str_replace("'", "&#039;", $_POST['product']);
                  $si =  str_replace("'", "&#039;", $_POST['size']);

                  $price =  $_POST['price'];
                  $quan =  $_POST['quantity'];


                  $cat = $_POST['cat'];
                  $sub = $_POST['sub'];
                    


        
                          
                        $sql = "UPDATE product_table SET product_name = '$pro', category = '$cat' , sub_category = '$sub' ,size = '$si',price = '$price', quantity = '$quan' where id= '$idko' AND seller_id= ' $selid'";
                        
                    
                        if ($conn->query($sql) === TRUE) {

                      if( implode($_FILES['new_image']['tmp_name']) != ""){
                        

                                      $sql_delete_image = "DELETE FROM image_table WHERE prod_id = '$idko'";
                                         $conn->query($sql_delete_image);

                                            foreach($_FILES['new_image']['tmp_name'] as $key => $tmp_name)
                                                                        {
                                                $file_name = $key.$_FILES['new_image']['name'][$key] ;

                                              $new_file_name = str_replace(" ","", $file_name);
                                             $file_size =$_FILES['new_image']['size'][$key];
                                             $file_tmp =$_FILES['new_image']['tmp_name'][$key];
                                            $file_type=$_FILES['new_image']['type'][$key];  
                              
                                              $sql_inset_image = "INSERT INTO image_table (prod_id, image_name) values ('$idko', '$new_file_name' )";
                                                                                  
                                              $conn->query($sql_inset_image);
                                                                            
                                              move_uploaded_file($file_tmp,"image/".$new_file_name);
                                    }     
                      }
                     
                    
                                        
                                 
                                    
                                      
                                         $_SESSION['status'] = "PRODUCT UPDATED";
                                          header("Location: sellerdashboard.php");    
                      
                } else { 
                    $_SESSION['status'] = "CANNOT UPDATE";
                        header("Location: sellerdashboard.php"); 

                }

            

            }
            else{

                    //UPDATE IF NO IMAGE IS ADDED         

                  $pro =  str_replace("'", "&#039;", $_POST['product']);
                  $si =  str_replace("'", "&#039;", $_POST['size']);

                  $price =  $_POST['price'];
                  $quan =  $_POST['quantity'];


                          
        $sql = "UPDATE product_table SET product_name = '$pro', category = '$cat' , sub_category = '$sub', size = '$si', price = '$price', quantity = '$quan' where id= '$idko'";
        
       
        if ($conn->query($sql) === TRUE) {

  $_SESSION['status'] = "EDITTED SUCCESSFULLY";
           header("Location: sellerdashboard.php"); 
} else { 
    $_SESSION['status'] = "CANNOT UPDATE";
           header("Location: sellerdashboard.php"); 

}

            }

        }
        else{
                header("Location: sellerdashboard.php"); 
        }


        
//////////////////////////////////////////////////////////


 if(isset($_POST['deleteproduct'])){



$sql = "DELETE FROM product_table WHERE id='$idko' AND seller_id= ' $selid'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
if($resultset) {
 $_SESSION['status'] = "DELETED SUCCESSFULLY";
           header("Location: sellerdashboard.php"); 
} else { 
    $_SESSION['status'] = "CANNOT BE DELETED";
           header("Location: sellerdashboard.php"); 

}


 } 
 else{

 }



    unset($_SESSION['id_product']);

///////////////////////////////////////////////////



 if(isset($_POST['submit'])){


           if($_POST['product'] && $_POST['size'] && $_FILES['img'] && $_POST['price'] &&  $_POST['quantity']){
                 

          
                  $pro =  str_replace("'", "&#039;", $_POST['product']);
                  $si =  str_replace("'", "&#039;", $_POST['size']);
                 
                  $price =  $_POST['price'];
                  $quan =  $_POST['quantity'];

                  $cate = $_POST['cat'];
                  $subs = $_POST['sub'];

                  

        $sql = "INSERT INTO product_table (product_name, category , sub_category, size, price, quantity, seller_id) values ('$pro' , '$cate' , '$subs' , '$si', '$price' , '$quan' , '$selid')";
        

if ($conn->query($sql) === TRUE) {

  $last_id = $conn->insert_id;
  $_SESSION['latest_id'] = $last_id;

    foreach($_FILES['img']['tmp_name'] as $key => $tmp_name)
{
  $file_name = $key.$_FILES['img']['name'][$key] ;

    $new_file_name = str_replace(" ", "", $file_name);
    $file_size =$_FILES['img']['size'][$key];
    $file_tmp =$_FILES['img']['tmp_name'][$key];
    $file_type=$_FILES['img']['type'][$key];  

    if($file_type === "mp4"){
        echo "MP4 DETECTED";
    }
    
        $sql_inset_image = "INSERT INTO image_table (prod_id, image_name) values ('$last_id', '$new_file_name' )";
        
   if ($conn->query($sql_inset_image) === TRUE) {

      move_uploaded_file($file_tmp,"image/".$new_file_name);
   } else{
     
 $_SESSION['latest_id'] =  $conn->error;
 header("Location: tester.php");
   }

}     

   $_SESSION['status'] = "ADDED SUCCESSFULLY";
      header("Location: sellerdashboard.php"); 


} 

else {

 die(mysqli_error($conn));     //UPDATE  $_SESSION['status'] = "ERROR";
         //   header("Location: sellerdashboard.php"); 
}


      
      }
        else  {

        die(mysqli_error($conn));
  
    }
   
  }
  
  
    else{
        header ("sellerdashboard.php");
    }





?>