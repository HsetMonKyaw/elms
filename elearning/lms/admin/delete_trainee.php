<?php
include_once __DIR__.'/../controller/traineeController.php';

$id=$_POST['id'];
$trainee_con=new TraineeController();
$result=$trainee_con->deleteTrainees($id);
if($result)
{
    echo "success";
}
else
{
    echo "You can't delete instructor";
}


?>