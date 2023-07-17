<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/courseController.php';
include_once __DIR__.'/../controller/categoryController.php';

$id=$_GET['id'];
$cat_controller=new CategoryController();
$categories=$cat_controller->getCategories();

$course_con=new CourseController();
$course=$course_con->getCourses($id);
// var_dump($course);

if(isset($_POST['submit']))
{
    if(empty($_POST['name']))
    {
        $name_error="Please Fill Your Course Name!";
    }
    else{
        $name=$_POST['name'];
    }

    if(empty($_POST['category']))
    {
        $category_error="Please Fill Your Course Category!";
    }
    else{
        $category=$_POST['category'];
    }

    if(empty($_POST['outline']))
    {
        $outline_error="Please Fill Your Course Outline!";
    }
    else{
        $outline=$_POST['outline'];
    }

    if(empty($_FILES['image']['name']))
    {
        $image_error="Please Fill Your Course Image!";
    }
    else{
        $image=$_FILES['image'];
    }

    if(empty($_POST['name']) || empty($_POST['category']) || empty($_POST['outline']) || empty($_FILES['image']['name']))
    {
        $error=true;
    }
    else
    {
        $name=$_POST['name'];
        $category=$_POST['category'];
        $outline=$_POST['outline'];
        $image=$_FILES['image'];
        $status=$course_con->editCourse($id,$name,$category,$outline,$image);
        if($status)
        {
            $message=2;
            echo '<script>location.href="course.php?status='.$message.'"</script>';
        }
    }
}
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Edit Course</strong></h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div>
                                    <label for="" class="form-label">Course Name</label>
                                    <input type="text" name="name" id="" class="form-control" value="<?php echo $course['name']; ?>">
                                    <?php if(isset($error) && isset($name_error)) echo "<span class='text-danger'>$name_error</span>"; ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Course Category</label>
                                    <select name="category" id="" class="form-select">
                                    <?php
                                    // foreach($categories as $category)
                                    // {
                                    //     if($category['id']==$course['cat_id'])
                                        
                                    //     echo "<option value=".$category['id']." selected>".$category['name']."</option>";
                                    //     else 
                                    //     echo "<option value=".$category['id'].">".$category['name']."</option>";

                                    // }
                                    ?>
                                    </select>
                                    <?php if(isset($error) && isset($category_error)) echo "<span class='text-danger'>$category_error</span>"; ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Course Outline</label>
                                    <textarea name="outline" id="" cols="30" rows="10" class="form-control"><?php echo $course['outline']; ?></textarea>
                                    <?php if(isset($error) && isset($outline_error)) echo "<span class='text-danger'>$outline_error</span>"; ?>
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Course Featured Image</label>
                                    <input type="file" name="image" id="" class="form-control" value="<?php echo $course['image'];?>">
                                    <?php if(isset($error) && isset($image_error)) echo "<span class='text-danger'>$image_error</span>"; ?>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-dark" name="submit">Update</button>
                                </div>                                     
                            </form>   
                        </div>
                    </div>
                    
				</div>
			</main>

			
<?php
include_once __DIR__.'/../layouts/app_footer.php';
?>

		