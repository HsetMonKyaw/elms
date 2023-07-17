<?php
include_once __DIR__.'/../controller/courseController.php';

$id=$_POST['id'];
$cou_controller=new CourseController();
$result=$cou_controller->deleteCourse($id);
if($result)
{
    echo "success";
}
else
{
    echo "You can't delete course";
}

?>