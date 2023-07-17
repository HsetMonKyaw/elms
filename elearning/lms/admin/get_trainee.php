<?php
// include_once __DIR__.'/../controller/projectController.php';
include_once __DIR__.'/../controller/project_traineeController.php';

 $bid=$_POST['id'];
 $projtrain_con=new ProjectTraineeController();
 $trainees=$projtrain_con->getTraineeByBatch($bid);

$html="";
$html.="<div class ='row my-3'>";
$html.="<div class='col-md-8'>";

$html.="<select name='trainee[]' class='form-select'>";
foreach($trainees as $trainee)
{
    $html.="<option value='".$trainee['tid']."'>".$trainee['tname']."</option>";

}
 $html.="</select>";
 $html.="</div>";
 $html.="<div class='col-md-3'> <button class='btn btn-danger'>Remove</button></div>";
 $html.="</div>";

 echo $html;
?>