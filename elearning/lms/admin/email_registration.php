<?php

include_once __DIR__.'/../controller/traineeController.php';
include_once __DIR__.'/../controller/batchController.php';

$id=$_GET['id'];
$trainee_controller=new TraineeController();

$status=$trainee_controller->mailRegistration($id);
if($status==true)
{
    $message=3;
    echo "<script>location.href='trainee_course.php?status=$message'</script>";
}

?>