<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/traineeController.php';
include_once __DIR__.'/../controller/project_traineeController.php';


$pid=$_GET['id'];

$projtrain_con=new ProjectTraineeController();
$projtrains=$projtrain_con->getProjectTrainees($pid);

$bid=$projtrains['bid'];
$trainees=$projtrain_con->getTraineeByBatch($bid);
// var_dump($trainees);

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add New Trainee</strong> Dashboard</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Project Title : <?php echo $projtrains['title'] ;?></p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="rows">
                                    <div class='row my-3'>
                                        <!-- <label for="" class="form-label">Select Trainee Name</label> -->
                                        <div class="col-md-8">
                                            <select name="trainee" id="" class="form-select">                               
                                            <?php
                                            foreach($trainees as $trainee)
                                            {
                                                echo "<option value=".$trainee['tid'].">".$trainee['tname']."</option>";
                                            }
                                            ?>
                                            </select>  
                                        </div>                         
                                    
                                        <div class="col-md-4" id="<?php echo $bid; ?>">
                                            <button class="btn btn-primary btn_add" name="submit">Add More +</button>
                                        </div>
                                    </div>
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

		