<?php
session_start();
include "php/dbconnect.php";


if(isset($_POST['submit']) && isset($_POST['rating']) && isset($_POST['review_comment'])  ){

$points = $_POST['rating'];
$buyid = $_POST['userid'];
$pid = $_POST['prodid'];
$buyer = $_POST['name'];

$comment = $_POST['review_comment'];

$_SESSION['view_prid'] = $pid;


$sql = "UPDATE rated_product_table SET rated_points = '$points', rate_status = 'RATED' WHERE userid = '$buyid'  AND product_id = '$pid' ";

if( $conn->query($sql)===true){
    echo "SUCCESS";
       
    //Send review to database after rating//


      if( implode($_FILES['review_files']['tmp_name']) != ""){
                        

                                            foreach($_FILES['review_files']['tmp_name'] as $key => $tmp_name)
                                                                        {
                                                $file_name = $key.$_FILES['review_files']['name'][$key] ;

                                            $new_file_name = str_replace(" ","", $file_name);

                                             $file_size =$_FILES['review_files']['size'][$key];
                                             $file_tmp =$_FILES['review_files']['tmp_name'][$key];
                                            $file_type=$_FILES['review_files']['type'][$key];  
                              

                                            if( $file_type != ".mp4"){

                                            
                                              $sql_inset_image = "INSERT INTO review_table (pid, buyer_name,comment, image_video) values ('$pid', '$buyer', '$comment', '$new_file_name')";
                                                      
                                              
                                              $conn->query($sql_inset_image);
                                                                            
                                              move_uploaded_file($file_tmp,"comment_media/".$new_file_name);
                                        }
                                        else{
                                             $sql_inset_video = "INSERT INTO review_table (pid, buyer_name,comment, image_video) values ('$pid', '$buyer', '$comment', '$new_file_name')";
                                                                                  
                                              $conn->query($sql_inset_video);
                                                                            
                                              move_uploaded_file($file_tmp,"comment_media/".$new_file_name);
                                        }
                                    }     
                      }
                    
                      header("Location: viewproductbuyer.php");
}
else{
    echo "ekix";


}


}
else{
    echo "Please fill up";





}

function writeReview(  ){




}




?>
