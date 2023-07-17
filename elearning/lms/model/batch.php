<?php
include_once __DIR__.'/../vender/db/db.php';

class Batch{
    public function getBatchList(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select batch.id as id,batch.name as bname,batch.start_date as date,
        batch.duration as duration,
        batch.fee as fee,batch.discount as discount,course.name as couname
        from batch join course on batch.course_id=course.id";
        $statement=$con->prepare($sql);
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    public function addNewBatch($name,$start_date,$duration,$fee,$discount,$course)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="insert into batch(name,start_date,duration,fee,discount,course_id) 
        value (:name,:start_date,:duration,:fee,:discount,:course)";
        $statement=$con->prepare($sql);
        $statement->bindParam(':name',$name);
        $statement->bindParam(':start_date',$start_date);
        $statement->bindParam(':duration',$duration);
        $statement->bindParam(':fee',$fee);
        $statement->bindParam(':discount',$discount);
        $statement->bindParam(':course',$course);
        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getBatchInfo($id)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select * from batch where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        if($statement->execute())
        {
            $result=$statement->fetch(PDO::FETCH_ASSOC);
            return $result ;
        }
    }
    public function updateBatch($id,$name,$start_date,$duration,$fee,$discount,$course)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="update batch
        set name=:name,start_date=:start_date,duration=:duration,fee=:fee,
        discount=:discount,course_id=:course  where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        $statement->bindParam(':name',$name);
        $statement->bindParam(':start_date',$start_date);
        $statement->bindParam(':duration',$duration);
        $statement->bindParam(':fee',$fee);
        $statement->bindParam(':discount',$discount);
        $statement->bindParam(':course',$course);
        if($statement->execute())
        {
            return true;
        }
        else{
            return false;
        }
    }
    public function deleteBatchInfo($id)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="delete from batch where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        try
        {
            $statement->execute();
            return true;
        }
        catch(PDOException $e)
        {
            return false;
        }
    }
    public function getBatchPerYear()
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="SELECT year(start_date) as year,count(id) as total
        FROM batch
        GROUP BY year(start_date)";
        $statement=$con->prepare($sql);
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
        
    }

    public function getBrowser()
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="SELECT course.name as cname,COUNT(trainee_course.trainee_id) as total
        FROM batch JOIN trainee_course JOIN course 
        WHERE batch.id=trainee_course.batch_id
        AND course.id=batch.course_id
        GROUP BY batch.course_id";
        $statement=$con->prepare($sql);
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
        
    }



}

?>