<?php
include_once __DIR__.'/../controller/batchController.php';

$id=$_POST['id'];
$batch_con=new BatchController();
$result=$batch_con->deleteBatch($id);
if($result)
{
    $var="success";
    echo json_encode($var);
}
else
{
    echo "You can't delete as it has related child data";
}

?> 