<?php
include_once __DIR__.'/../controller/batchController.php';

$batch_con=new BatchController();
$batch_per_year=$batch_con->batchPerYear();

echo json_encode($batch_per_year);



?>