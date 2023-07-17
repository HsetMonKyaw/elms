<?php
include_once __DIR__.'/../vender/db/db.php';

class Trainee{
    public function getTraineeList(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select * from trainee";
        $statement=$con->prepare($sql);
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function createTrainee($name,$email,$phone,$city,$education,$remark,$status)
    {
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="insert into trainee(name,email,phone,city,education,remark) 
        values (:name,:email,:phone,:city,:education,:remark)";
        $statement=$con->prepare($sql);
        $statement->BindParam(':name',$name);
        $statement->BindParam(':email',$email);
        $statement->BindParam(':phone',$phone);
        $statement->BindParam(':city',$city);
        $statement->BindParam(':education',$education);
        $statement->BindParam(':remark',$remark);
        // $statement->BindParam(':status',$status);
        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getTraineeInfo($id)
    {
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="select * from trainee where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        if($statement->execute())
        {
            $result=$statement->fetch(PDO::FETCH_ASSOC);
            return $result ;
        }
    }

    public function updateTrainee($id,$name,$email,$phone,$city,$education,$remark,$status)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="update trainee 
        set name=:name,email=:email,phone=:phone,city=:city,education=:education,remark=:remark 
        where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        $statement->bindParam(':name',$name);
        $statement->bindParam(':email',$email);
        $statement->bindParam(':phone',$phone);
        $statement->bindParam(':city',$city);
        $statement->bindParam(':education',$education);
        $statement->bindParam(':remark',$remark);
        // $statement->bindParam(':status',$status);
        if($statement->execute())
        {
            return true ;
        }
        else
        {
            return false;
        }
    }

    public function deleteTraineeInfo($id)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        $sql="delete from trainee where id=:id";
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
    public function getMail($id)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="select * from trainee where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        if($statement->execute())
        {
            $result=$statement->fetch(PDO::FETCH_ASSOC);
            return $result['email'];
        }
    }
    public function registrationInfo()
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select trainee_course.id as id,batch.name as bname,trainee.name as tname,
        trainee_course.joined_date as date, trainee_course.status as status,
         from trainee join trainee_course join batch 
        where trainee.id=trainee_course.trainee_id and batch.id=trainee_course.batch_id";
        $statement=$con->prepare($sql);

        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    public function createRegistration($bname,$tname,$joined_date,$status)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="insert into trainee_course(batch_id,trainee_id,joined_date,status) 
        value (:bname,:tname,:joined_date,:status)";
        $statement=$con->prepare($sql);
        $statement->bindParam(':bname',$bname);
        $statement->bindParam(':tname',$tname);
        $statement->bindParam(':joined_date',$joined_date);
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
    public function getRegistrationmail($id)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="select * from trainee_course where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        if($statement->execute())
        {
            $result=$statement->fetch(PDO::FETCH_ASSOC);
            return $result['email'];
        }
    }
    public function emailstatus($id)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select trainee_course.id as id,trainee.name as tname,batch.name as batname,
        batch.course.name as coname from trainee_course join trainee join batch join course
        on trainee_course.trainee_id=trainee.id and trainee_course.batch_id=batch.id
        and course.id=batch.course_id where trainee_course.id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        if($statement->execute())
        {
            $result=$statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function traineeMailReport($id)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="update trainee_course set email = 1 where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
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