<?php
include_once __DIR__.'/../controller/instructorController.php';

$id=$_POST['id'];
$inst_controller=new InstructorController();
$result=$inst_controller->deleteInstructor($id);
if($result)
{
    echo "success";
}
else
{
    echo "You can't delete instructor";
}



?>