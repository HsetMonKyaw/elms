<?php
include_once __DIR__.'/../vender/db/db.php';

class ProjectTrainee{
    public function getProjectTraineeList(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select project_trainee.id as id,project.title as title,
        project_trainee.status as status from project_trainee join project 
        on project_trainee.project_id=project.id";
        $statement=$con->prepare($sql);
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    public function getProjectTraineeInfo($pid)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select project.batch_id as bid,project.title as title 
        FROM project_trainee join project
        on project_trainee.project_id=project.id
        where project_trainee.id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$pid);
        if($statement->execute())
        {
            $result=$statement->fetch(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    public function getTrainee($bid)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select trainee_course.trainee_id as tid,trainee.name as tname
        from trainee_course join trainee 
        where trainee_course.trainee_id=trainee.id
        and trainee_course.batch_id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$bid);
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    public function addProjTrainInfo($project_id,$trainee_id,$status)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="insert into project_trainee(project_id,trainee_course_id,status) 
        value(:title,:tname,:pstatus)";
        $statement=$con->prepare($sql);
        $statement->bindParam(':title',$project_id);
        $statement->bindParam(':tname',$trainee_id);
        $statement->bindParam(':pstatus',$status);
        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getProjTrainInfo($id)
    {
         //1.db connection
         $con=Database::connect();
         $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         //2.write sql
         $sql="select * from project_trainee where id=:id";
         $statement=$con->prepare($sql);
         $statement->bindParam(':id',$id);
         if($statement->execute())
         {
             $result=$statement->fetch(PDO::FETCH_ASSOC);
             return $result ;
         }
    }
    public function updateProjTrain($id,$project_id,$trainee_id,$status)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="update project_trainee 
        set  project_id=:project_id,trainee_id=:trainee_id,status=:status
        where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        $statement->bindParam(':project_id',$project_id);
        $statement->bindParam(':trainee_id',$trainee_id);
        $statement->bindParam(':status',$status);
        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}

?>