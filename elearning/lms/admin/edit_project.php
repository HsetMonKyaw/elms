<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/projectController.php';
include_once __DIR__.'/../controller/batchController.php';

$id=$_GET['id'];

$batch_con=new BatchController();
$batchs=$batch_con->getBatch();

$project_con=new ProjectController();
$projects=$project_con->getProjects($id);

if(isset($_POST['submit']))
{
    $title=$_POST['title'];
    $desp=$_POST['desp'];
    $start_date=$_POST['start_date'];
    $rate=$_POST['rate'];
    $batch_id=$_POST['batch_id'];
    $status=$project_con->editProject($id,$title,$desp,$start_date,$rate,$batch_id);
    if($status)
    {
        echo '<script>location.href="project.php?status='.$status.'"</script>';
    }

}

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Edit Project</strong> Dashboard</h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class='my-3'>
                                    <label for="" class="form-label">Project Title</label>
                                    <input type="text" name="title" class="form-control" value="<?php echo $projects['title'];?>">
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Project Description</label>
                                    <input type="text" name="desp" class="form-control" value="<?php echo $projects['description'];?>">
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Project Start Date</label>
                                    <input type="date" name="start_date" class="form-control" value="<?php echo $projects['start_date'];?>">
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Project Rate</label>
                                    <input type="text" name="rate" class="form-control" value="<?php echo $projects['rate'];?>">
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Batch Name</label>
                                    <select name="batch_id" id="" class="form-select">                               
                                    <?php
                                    foreach($batchs as $batch)
                                    {
                                        if($batch['id']==$projects['batch_id'])
                                        echo "<option value=".$batch['id']." selected>".$batch['bname']."</option>";
                                        else
                                        echo "<option value=".$batch['id'].">".$batch['bname']."</option>";
                                    }
                                    ?>
                                    </select>
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

