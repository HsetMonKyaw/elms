<?php
include_once __DIR__.'/../model/project.php';

class ProjectController extends Project{
    public function getProject()
    {
        return $this->getProjectList();
    }
    
    public function addProject($title,$desp,$start_date,$rate,$batch_id)
    {
        return $this->createProject($title,$desp,$start_date,$rate,$batch_id);
    }
    public function getProjects($id)
    {
        return $this->getProjectInfo($id);
    }
    public function editProject($id,$title,$desp,$start_date,$rate,$batch_id)
    {
        return $this->updateProject($id,$title,$desp,$start_date,$rate,$batch_id);
    }
    public function deleteProject($id)
    {
        return $this->deleteProjectInfo($id);
    }

    // public function getForm()
    // {
    //     return $this->formInfo();
    // }
   
    // public function getTraineeInfos($id)
    // {
    //     return $this->getTraineeInfo($id);
    // }
    
    // public function editTrainee($id,$name,$email,$phone,$city,$education,$remark,$status)
    // {
    //     return $this->updateTrainee($id,$name,$email,$phone,$city,$education,$remark,$status);
    // }




    // public function getProjects($pid)
    // {
    //     return $this->getProjectInfo($pid);
    // }
    // public function getTraineeByBatch($bid)
    // {
    //     return $this->getTrainee($bid);
    // }

}

?>