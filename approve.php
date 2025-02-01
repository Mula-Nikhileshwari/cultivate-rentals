<?php

require_once('connection.php');
$bookid=$_GET['id'];
$sql="SELECT *from booking where BOOK_Id=$bookid";
$result=mysqli_query($con,$sql);
$res = mysqli_fetch_assoc($result);
$equip_id=$res['EQUIP_ID'];
$sql2="SELECT *from equipments where EQUIP_ID=$equip_id";
$equipres=mysqli_query($con,$sql2);
$equipresult = mysqli_fetch_assoc($equipres);
$email=$res['EMAIL'];
$equipname=$equipresult['EQUIP_NAME'];
if($equipresult['AVAILABLE']=='Y')
{
if($res['BOOK_STATUS']=='APPROVED' || $res['BOOK_STATUS']=='RETURNED')
{
    echo '<script>alert("ALREADY APPROVED")</script>';
    echo '<script> window.location.href = "adminbook.php";</script>';
}
else{
    $query="UPDATE booking set  BOOK_STATUS='APPROVED' where BOOK_ID=$bookid";
    $queryy=mysqli_query($con,$query);
    $sql2="UPDATE equipments set AVAILABLE='N' where equip_id=$res[equip_id]";
    $query2=mysqli_query($con,$sql2);
    
    echo '<script>alert("APPROVED SUCCESSFULLY")</script>';
    // $to_email = $email;
    // $subject = "DONOT-REPLY";
    // $body = "YOUR BOOKING FOR THE EQUIPMENT $equipname IS BEEN APPROVED WITH BOOKING ID : $bookid";
    // $headers = "From: sender email";
    
    // if (mail($to_email, $subject, $body, $headers))
    
    // {
    //     echo "Email successfully sent to $to_email...";
    // }
    
    // else

    // {
    // echo "Email sending failed!";
    // }
    echo '<script> window.location.href = "adminbook.php";</script>';
}  
}
else{
    echo '<script>alert("EQUIPMENT IS NOT AVAILABLE")</script>';
    echo '<script> window.location.href = "adminbook.php";</script>';
}


?>