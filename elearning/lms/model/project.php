<?php
include_once __DIR__.'/../vender/db/db.php';

class Project{
    public function getProjectList(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select project.id as id,project.title as title,project.description as desp,
        project.start_date as date,batch.name as bname from project join batch
        on project.batch_id=batch.id";
        $statement=$con->prepare($sql);
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    
    public function createProject($title,$desp,$start_date,$rate,$batch_id)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="insert into project(title,description,start_date,rate,batch_id) 
        values (:title,:desp,:start_date,:rate,:batch_id)";
        $statement=$con->prepare($sql);
        $statement->bindParam(':title',$title);
        $statement->bindParam(':desp',$desp);
        $statement->bindParam(':start_date',$start_date);
        $statement->bindParam(':rate',$rate);
        $statement->bindParam(':batch_id',$batch_id);
        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getProjectInfo($id)
    {
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="select * from project where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        if($statement->execute())
        {
            $result=$statement->fetch(PDO::FETCH_ASSOC);
            return $result ;
        }
    }
    public function updateProject($id,$title,$desp,$start_date,$rate,$batch_id)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="update project 
        set  title=:title,description=:description,start_date=:start_date,rate=:rate,batch_id=:batch_id
        where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        $statement->bindParam(':title',$title);
        $statement->bindParam(':description',$desp);
        $statement->bindParam(':start_date',$start_date);
        $statement->bindParam(':rate',$rate);
        $statement->bindParam(':batch_id',$batch_id);
        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function deleteProjectInfo($id)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="delete from project where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        try{
            $statement->execute();
            return true;
        }
        catch(PDOException $e)
        {
            return false;
        }
    }



    // public function FormInfo()
    // {
    //     $con=Database::connect();
    //     $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //     $sql="SELECT project.title as title,trainee.name as name,project_trainee.status as pstatus 
    //     FROM project JOIN project_trainee JOIN trainee JOIN trainee_course
    //     WHERE project.id=project_trainee.project_id
    //     AND  trainee_course.trainee_id=trainee.id
    //     GROUP BY title";
    //     $statement=$con->prepare($sql);
    //     if($statement->execute())
    //     {
    //         $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    //     }
    //     return $result;
    // }
    


    

}
    
?>