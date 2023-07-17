<!-- <?php
// include_once __DIR__.'/../layouts/sidebar.php';
// include_once __DIR__.'/../controller/traineeController.php';
// include_once __DIR__.'/../controller/projectController.php';
// include_once __DIR__.'/../controller/project_traineeController.php';

// $project_con=new ProjectController();
// $projects=$project_con->getProject();

// $trainee_con=new TraineeController();
// $trainees=$trainee_con->getTrainee();

// $projtrain_con=new ProjectTraineeController();
// $projtrain=$projtrain_con->getProjtrain($id);

// if(isset($_POST['submit']))
// {
//     $project_id=$_POST['project_id'];
//     $status=$_POST['status'];
//     $trainee_id=$_POST['trainee_id'];
//     $status=$projtrain_con->editProjTrain($id,$project_id,$trainee_id,$status);
//     if($status)
//     {
//         echo '<script>location.href="project_trainee.php?status='.$status.'"</script>';
//     }
// }

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Edit Project Trainee</strong> Dashboard</h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class='my-3'>
                                        <label for="" class="form-label">Project Title</label>
                                        <select name="project_id" id="" class="form-select">
                                        <?php
                                        // foreach($projects as $project)
                                        // {
                                        //     if($project['id']=$projtrain['project_id'])
                                        //     echo "<option value=".$project['id']." selected>".$project['title']."</option>";
                                        //     else
                                        //     echo "<option value=".$project['id'].">".$project['title']."</option>";
                                        // }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Status</label>
                                    <input type="text" name="status" class="form-control" value="<?php echo $projtrain['status']; ?>"> 
                                </div>
                                <div class="row my-2">
                                    <div class='col-md-8'>
                                        <label for="" class="form-label">Trainee Name</label>
                                        <select name="trainee_id" id="" class="form-select">                               
                                        <?php
                                        // foreach($trainees as $trainee)
                                        // {
                                        //     if($traiee['id']=$projtrain['trainee_course_id'])
                                        //     echo "<option value=".$trainee['id']."selected>".$trainee['name']."</option>";
                                        //     else
                                        //     echo "<option value=".$trainee['id'].">".$trainee['name']."</option>";
                                        // }
                                        ?>
                                        </select>                                   
                                    </div>
                                    <div class="col-md-4 mt-4">
                                            <button class="btn btn-primary" name="submit">Add Trainee</button>
                                    </div>
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
// include_once __DIR__.'/../layouts/app_footer.php';
?>

		 -->