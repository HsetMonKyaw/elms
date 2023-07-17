<?php
include_once __DIR__.'/../model/batch.php';

class BatchController extends Batch{
    public function getBatch(){
        return $this->getBatchList();
    }
    public function addBatch($name,$start_date,$duration,$fee,$discount,$course)
    {
        return $this->addNewBatch($name,$start_date,$duration,$fee,$discount,$course);
    }
    public function getBatchs($id)
    {
        return $this->getBatchInfo($id);
    }
    public function editBatch($id,$name,$start_date,$duration,$fee,$discount,$course)
    {
        return $this->updateBatch($id,$name,$start_date,$duration,$fee,$discount,$course);
    }
    public function deleteBatch($id)
    {
        return $this->deleteBatchInfo($id);
    }
    public function batchPerYear()
    {
        return $this->getBatchPerYear();
    }

    public function browser()
    {
        return $this->getBrowser();
    }
}

?>