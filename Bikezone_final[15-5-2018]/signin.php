<?php
session_start();
include "db_connection.php";

//check if form is submitted
if (isset($_POST['BtnSubmit'])) {

    $email = mysql_real_escape_string($_POST['EmailId']);
    $password = mysql_real_escape_string($_POST['Password']);
    $result = mysql_query("SELECT * FROM userregistration WHERE MailId = '" . $email. "' and Password = '" . $password . "'");

    $count=mysql_num_rows($result);
        if($count==1){
            $_SESSION['login_user']=$email;
        header("Location: index1.php");
    ?>
    <script>alert('entered successfully')</script>
    <?php
           }
        else{

            echo "<script>alert('invalid name or password')</script>";
        }
        mysql_close($connection); // Closing Connection
}
?>