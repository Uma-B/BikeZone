<?php
include 'db_connection.php';

if(isset($_REQUEST['BtnSubmit'])){
    $name=$_POST['Keyword'];
    $email=$_POST['Category'];
    $sql=" SELECT * FROM usedbikes WHERE Brand like '%".$name."%' OR Model ='%".$email."%'";
    $q=mysql_query($sql);
}
else{
    $sql="SELECT * FROM usedbikes";
    $q=mysql_query($sql);
}
?>

<table>
    <tr>
        <td>Name</td>
        <td>Email</td>
        <td>Address</td>
    </tr>
    <?php
    while($res=mysql_fetch_array($q)){
    ?>
    <tr>
        <td><?php echo $res['Brand'];?></td>
        <td><?php echo $res['Model'];?></td>
        <td><?php echo $res['State'];?></td>
    </tr>
    <?php }?>
</table>