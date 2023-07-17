<?php
include_once __DIR__.'/../model/project_trainee.php';

class ProjectTraineeController extends ProjectTrainee{
    public function getProjectTrainee()
    {
        return $this->getProjectTraineeList();
    }
    public function getProjectTrainees($pid)
    {
        return $this->getProjectTraineeInfo($pid);
    }
    public function getTraineeByBatch($bid)
    {
        return $this->getTrainee($bid);
    }
    public function addProjTrain($project_id,$trainee_id,$status)
    {
        return $this->addProjTrainInfo($project_id,$trainee_id,$status);
    }
    public function getProjtrain($id)
    {
        return $this->getProjTrainInfo($id);
    }
    public function editProjTrain($id,$project_id,$trainee_id,$status)
    {
        return $this->updateProjTrain($id,$project_id,$trainee_id,$status);
    }
    

}

?>