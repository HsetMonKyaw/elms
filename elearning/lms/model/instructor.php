<?php
include_once __DIR__.'/../vender/db/db.php';

class Instructor{
    public function getInstructorList(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select * from instructor";
        $statement=$con->prepare($sql);
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    
    public function createInstructor($name,$email,$phone,$address)
    {
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        // $vals=array(
        //     ':name'=>$name,
        //     ':email'=>$email,
        //     ':phone'=>$phone,
        //     ':address'=>$address,
        // );

        $sql="insert into instructor(name,email,phone,address) values (:name,:email,:phone,:address)";
        $statement=$con->prepare($sql);

        $result=$statement->execute(array(
            ':name'=>$name,
            ':email'=>$email,
            ':phone'=>$phone,
            ':address'=>$address,
        ));
        // $statement->bindParam(':name',$name);
        
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }
    public function getInstructorInfo($id)
    {
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="select * from instructor where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        if($statement->execute())
        {
            $result=$statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function updateInstructor($id,$name,$email,$phone,$address)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="update instructor 
        set name=:name,email=:email,phone=:phone,address=:address where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        $statement->bindParam(':name',$name);
        $statement->bindParam(':email',$email);
        $statement->bindParam(':phone',$phone);
        $statement->bindParam(':address',$address);
        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function deleteInstructorInfo($id)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        $sql="delete from instructor where id=:id";
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
        $sql="select * from instructor where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        if($statement->execute())
        {
            $result=$statement->fetch(PDO::FETCH_ASSOC);
            return $result['email'];
        }
    }
    
}

?>