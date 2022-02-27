<?php

session_start();
include ('include/connection.php');

if(isset($_SESSION['user-email'])){
    header("location:signin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Chat-Home </title>
    <link rel="stylesheet" href="css/home.css">

    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js" integrity="sha512-7dlzSK4Ulfm85ypS8/ya0xLf3NpXiML3s6HTLu4qDq7WiJWtLLyrXb9putdP3/1umwTmzIvhuu9EW7gHYSVtCQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->
</head>
<body>
    <div class="container main-section">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
                <div class="input-group searchbox">
                    <div class="input-group-btn">
                        <center>
                            <a href="include/find_friends.php">
                                  <button class="btn btn-default search-icon bg-light" name="search_user" type="submit" >Add new users</button>
                           </a>
                        </center>
                    </div>
                </div>
                <div class="left-chat">
                    <ul>
                        <?php include("include/get_user_data.php"); ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
                <div class="row">
                    <!-- get user information who logged in -->
                    <?php  
                    $user=$_SESSION['user_email'];
                    $get_user="select * from user where user_email='$user'";
                    $run_user=mysqli_query($con, $get_user);
                    $row=mysqli_fetch_array($run_user);

                    $user_id=$row['id'];
                    $user_name=$row['user_name'];
                    ?>

                        <!--  getting user data on which user click-->
                    <?php

                        if(isset($_GET['user_name'])){
                            global $con;
                            $get_username=$_GET['user_name'];
                            $get_user="select * from user where user_name='$get_username'";

                            $run_user=mysqli_query($con, $get_user);

                            $row_user=mysqli_fetch_array($run_user);

                            $username=$row_user['user_name'];

                            $user_profile_image=$row_user['user_profile'];

                        }

                        $total_messages ="select * from user_chat where (sender_username='$user_name'
                        AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username')";

                        $run_messages=mysqli_query($con, $total_messages);

                        $total=mysqli_num_rows($run_messages);


                    ?>

                    <div class="col-md-12 right-header">
                        <div class="right-header-img">
                            <img src="<?php echo "$user_profile_image" ?>" alt="">
                        </div>
                        <div class="right-header-detail">
                            <form action="" method="post">
                                <!-- $username=receiver user name -->
                                <p><?php echo "$username"; ?></p> 
                                <span><?php echo $total ?>&nbsp Messages</span> &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp
                                <button class="btn btn-danger" name="logout">Log Out</button>
                            </form>

                            <?php 
// update logged users status update from online to offline
                                if(isset($_POST['logout'])){
                                    $update_msg=mysqli_query($con,"UPDATE user SET log_in='offline' WHERE user_name='$user_name'");
                                    header("Location:logout.php");
                                    exit();
                                }
                            ?>
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
                        <?php
                        

                            $updated_msg=mysqli_query($con, "UPDATE user_chat SET msg_status='read' WHERE sender_username='$username'
                             AND receiver_username='$user_name'");

                             $sel_msg="SELECT * from user_chat WHERE (sender_username='$user_name' AND receiver_username='$username')
                             OR (receiver_username='$user_name' AND sender_username='$username' ) ORDER by 1  ASC";

                            $run_messages=mysqli_query($con, $sel_msg);

                           while($row =mysqli_fetch_array($run_messages)){

                            $sender_username='';
                            $receiver_username='';
                            $msg_content='';
                            $msg_date='';
                           
                            $sender_username=$row['sender_username'];
                            $receiver_username=$row['receiver_username'];
                            $msg_content=$row['msg_content'];
                            $msg_date=$row['msg_date'];
                           
                           
                        ?>
                        <ul>
                            <?php
                            if($user_name == $sender_username AND $username == $receiver_username){

                                echo "
                                  <li>
                                         <div class='rightside-right-chat'>
                                         <span>$username <small>$msg_date</small></span>
                                         <p>$msg_content</p>
                                        </div>
                                  </li>
                                ";
                            }

                            else if($user_name == $receiver_username AND $username == $sender_username){

                                echo "
                                  <li>
                                         <div class='rightside-left-chat'>
                                         <span>$username <small>$msg_date</small></span>
                                         <p>$msg_content</p>
                                        </div>
                                  </li>
                                ";
                            }
                            else{
                                echo "error";
                            }

                            ?>
                        </ul>
                        <?php
                              }
                        ?>
                                                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 right-chat-textbox">
                        <form method="post">
                            <input type="text" style="height:73px" name="msg_content" placeholder="Write your msg...">
                            <button class="btn"  name="submit" type="submit">SEND
                          
                            </button>
                        </form>
                        <!-- <i class="fa-solid fa-paper-plane-top"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
        $msg=htmlentities($_POST['msg_content']);

            if($msg==""){

                echo "
                <div class='alert alert-danger'>
                    <strong><center>Msg was unable to send</center></strong>
                </div>
                ";
            }
            else if(strlen($msg)>100){
                echo "
                <div class='alert alert-danger'>
                    <strong><center>Msg is too long use only 10 characters</center></strong>
                </div>
                ";

            }
            else{
                $insert="insert into user_chat(sender_username,receiver_username,msg_content,msg_status,msg_date)
                VALUES('$user_name','$username','$msg','unread', NOW())";

                $run_insert=mysqli_query($con, $insert);
                if($run_insert){
                    echo 'correct';
                }
                else{
                    echo 'wrong';
                }

            }
        
    }
    // echo 'wrong';
    ?>

        <script>
            $('#scrolling_to_bottom').animate({
                scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight},1000);
            })
            
        </script>
        

        <script type="text/javascript">
            $(document).ready(function(){
                var height=$(window).height();
                $('.left-chat').css('height',(height-92) +'px');
                $('.right-header-contentChat').css('height',(height-92) +'px');
            })
        </script>

</body>
</html>