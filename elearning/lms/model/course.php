<?php
include_once __DIR__.'/../vender/db/db.php';

class Course{
    public function getCourseList(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select course.id as id,course.name as cname,category.name as catname,course.outline as coutline, 
        course.image as image from course join category on course.cat_id=category.id";
        $statement=$con->prepare($sql);
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    public function getNumCourse(){
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="select category.name as name,count(course.cat_id) as total 
        from course join category on course.cat_id=category.id group by course.cat_id";
        $statement=$con->prepare($sql);
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    public function addNewCourse($name,$category,$outline,$filename)
    {
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="insert into course(name,cat_id,outline,image) value (:name,:category,:outline,:image)";
        $statement=$con->prepare($sql);
        $statement->bindParam(':name',$name);
        $statement->bindParam(':category',$category);
        $statement->bindParam(':outline',$outline);
        $statement->bindParam(':image',$filename);
        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getCourseInfo($id)
    {
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="select * from course where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        if($statement->execute())
        {
            $result=$statement->fetch(PDO::FETCH_ASSOC);
            return $result ;
        }
    }
    public function updateCourse($id,$name,$category,$outline,$filename)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="update course
        set name=:name,cat_id=:category,outline=:outline,image=:image  where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        $statement->bindParam(':name',$name);
        $statement->bindParam(':category',$category);
        $statement->bindParam(':outline',$outline);
        $statement->bindParam(':image',$filename);
        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function deleteCourseInfo($id)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        $sql="delete from course where id=:id";
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

}



?>