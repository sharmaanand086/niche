<?php

session_start();
include'conn.php';
if(isset($_POST['login_user']))
{

                         $email = $_POST['email'];
                         $password = $_POST['password'];
                         
                        $sql2 = "SELECT * FROM 2_user where username = '$email' AND password='$password'"; 
                        $result2 = mysqli_query($conn,$sql2);
                        $count_id2 = mysqli_num_rows($result2);
                        $row2 =  mysqli_fetch_assoc($result2);
                   
                        $id=$row2["id"];
                        $_SESSION["id"] = $row2["id"];
                        $_SESSION["name"] =$row2["name"];
                        $_SESSION["username"] =$row2["username"];
                        if(mysqli_num_rows($result2) > 0){
                            $total = 3;
                            $sql = "SELECT * FROM userdata_subsubtopic WHERE `uid` = '$id'"; 
                            $result1=mysqli_query($conn,$sql);
                             $rowcount=mysqli_num_rows($result1);
                              if($rowcount <= $total ){
                                ?>
                                     <script type="text/javascript">
                                       window.location.href = "dashboard.php";
                                    </script> 
                                    <?php
                                  
                              }else{
                                  ?>
                                     <script type="text/javascript">
                                       window.location.href = "result.php";
                                    </script> 
                                    <?php
                              }
                            
                        }else{
                             $error = "Your Login Username or Password is invalid"; 
                             $_SESSION["error"] = $error;
                            ?>
                             <script type="text/javascript">
                                       window.location.href = "index.php";
                                    </script> 
                            <?php
                        }
                        
                    
         
}
