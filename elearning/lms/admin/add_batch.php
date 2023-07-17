<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/batchController.php';
include_once __DIR__.'/../controller/courseController.php';


$batch_controller=new BatchController();
$cou_controller=new CourseController();
$courses=$cou_controller->getCourse();
if(isset($_POST['submit']))
{
    if(empty($_POST['name']))
    {
        $name_error="Please Fill Your Batch Name!";
    }
    else{
        $name=$_POST['name'];
    }

    if(empty($_POST['start_date']))
    {
        $start_date_error="Please Fill Your Start Date!";
    }
    else{
        $start_date=$_POST['start_date'];
    }

    if(empty($_POST['duration']))
    {
        $duration_error="Please Fill Your Duration!";
    }
    else{
        $duration=$_POST['duration'];
    }

    if(empty($_POST['fee']))
    {
        $fee_error="Please Fill Your Fee!";
    }
    else{
        $fee=$_POST['fee'];
    }

    if(empty($_POST['discount']))
    {
        $discount_error="Please Fill Discount!";
    }
    else{
        $discount=$_POST['discount'];
    }

    if(empty($_POST['course']))
    {
        $course_error="Please Fill Your Course!";
    }
    else{
        $course=$_POST['course'];
    }
    if(empty($_POST['name']) || empty($_POST['start_date']) || empty($_POST['duration']) || empty($_POST['fee']) || empty($_POST['discount'])|| empty($_POST['course']) )
    {
        $error=true;
    }
    else
    {
        $name=$_POST['name'];
        $start_date=$_POST['start_date'];
        $duration=$_POST['duration'];
        $fee=$_POST['fee'];
        $discount=$_POST['discount'];
        $course=$_POST['course'];
        $status=$batch_controller->addBatch($name,$start_date,$duration,$fee,$discount,$course);
        if($status)
        {
            echo '<script>location.href="batch.php?status='.$status.'"</script>';
        }
    }

}

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add New Batch</strong> Dashboard</h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div class='my-3'>
                                    <label for="" class="form-label">Batch Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php if(isset($name)) echo $name; ?>">
                                    <?php if(isset($error) && isset($name_error)) echo "<span class='text-danger'>$name_error</span>"; ?>
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Batch Start_Date</label>
                                    <input type="date" name="start_date" class="form-control" value="<?php if(isset($start_date)) echo $start_date; ?>">
                                    <?php if(isset($error) && isset($start_date_error)) echo "<span class='text-danger'>$start_date_error</span>"; ?>
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Batch Duration</label>
                                    <input type="text" name="duration" class="form-control" value="<?php if(isset($duration)) echo $duration; ?>">
                                    <?php if(isset($error) && isset($duration_error)) echo "<span class='text-danger'>$duration_error</span>"; ?>
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Batch Fee</label>
                                    <input type="text" name="fee" class="form-control"  value="<?php if(isset($fee)) echo $fee; ?>">
                                    <?php if(isset($error) && isset($fee_error)) echo "<span class='text-danger'>$fee_error</span>"; ?>
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Batch Discount</label>
                                    <input type="text" name="discount" class="form-control" value="<?php if(isset($discount)) echo $discount; ?>">
                                    <?php if(isset($error) && isset($discount_error)) echo "<span class='text-danger'>$discount_error</span>"; ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Batch Course</label>
                                    <select name="course" id="" class="form-select" value="<?php if(isset($course)) echo $course; ?>">     
                                    <?php
                                    foreach($courses as $course)
                                    {
                                    ?>
                                    <option value="<?php echo $course['id']; ?>"
                                    <?php
                                    if(isset($_POST['course']))
                                    if($_POST['course']==$course['id'])
                                    {
                                        echo "selected";
                                    }
                                    ?>>
                                    <?php echo $course['cname'];?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-primary" name="submit">Add</button>
                                </div>                                     
                            </form>   
                        </div>
                    </div>
                    
				</div>
			</main>

			
<?php
include_once __DIR__.'/../layouts/app_footer.php';
?>

		