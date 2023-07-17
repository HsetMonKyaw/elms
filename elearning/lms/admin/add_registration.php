<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/traineeController.php';
include_once __DIR__.'/../controller/batchController.php';

$batch_con=new BatchController();
$batchs=$batch_con->getBatch();

$trainee_con=new TraineeController();
$trainees=$trainee_con->getTrainee();
if(isset($_POST['submit']))
{
    $bname=$_POST['bname'];
    $tname=$_POST['tname'];
    $joined_date=$_POST['joined_date'];
    $status=$_POST['status'];
    $status=$trainee_con->addRegistration($bname,$tname,$joined_date,$status);
    if($status)
    {
        echo '<script>location.href="trainee_course.php?status='.$status.'"</script>';
    }

}
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add Registration Form</strong> Dashboard</h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class='my-3'>
                                    <label for="" class="form-label">Batch Name</label>
                                    <select name="bname" id="" class="form-select">
                                    <?php
                                    foreach($batchs as $batch)
                                    {
                                        echo "<option value=".$batch['id'].">".$batch['bname']."</option>";
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Trainee Name</label>
                                    <select name="tname" id="" class="form-select">                               
                                    <?php
                                    foreach($trainees as $trainee)
                                    {
                                        echo "<option value=".$trainee['id'].">".$trainee['name']."</option>";
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Joined Date</label>
                                    <input type="date" name="joined_date" class="form-control">
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Status</label>
                                    <input type="text" name="status" class="form-control"> 
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-dark" name="submit">Add</button>
                                </div>                                     
                            </form>   
                        </div>
                    </div>
                    
				</div>
			</main>

			
<?php
include_once __DIR__.'/../layouts/app_footer.php';
?>

		