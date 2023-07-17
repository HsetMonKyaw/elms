<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/project_traineeController.php';

$projtrain_con=new ProjectTraineeController();
$projtrainees=$projtrain_con->getProjectTrainee();
// var_dump($projtrainees);
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Project Trainee</strong> Dashboard</h1>
                    <?php
                      if(isset($_GET['result'])&& $_GET['result']==1)
                      {
                        echo "<div class='alert alert-success text-success'> New project_trainee has been successfully created</div>";
                      }
                      elseif(isset($_GET['result'])&& $_GET['result']==2)
                      {
                        echo "<div class='alert alert-success text-success'>Project_trainee has been successfully updated</div>";
                      }
                    ?>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="add_project_trainee.php" class="btn btn-dark">Add Project Trainee</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Project Title</th>
                                        <th>Status</th>
                                        <!-- <th>Trainee</th>   -->
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $count=1;
                                    foreach($projtrainees as $projtrainee)
                                    {
                                        echo "<tr>";
                                        echo "<td>".$count++."</td>";
                                        echo "<td>".$projtrainee['title']."</td>"; 
                                        echo "<td>".$projtrainee['status']."</td>"; 
                                        echo "<td id='".$projtrainee['id']."'> <a class='btn btn-info mx-3' href='add_ojt_trainee.php?id=".$projtrainee['id']."'>Trainee</a></td>";
                                        // echo "<td id='".$projtrainee['id']."'> <a class='btn btn-warning mx-3' href='edit_project_trainee.php?id=".$projtrainee['id']."'>Edit</a><button class='btn btn-danger mx-3 '>Delete</button> </td>";
                                        echo "</tr>";                                       
                                    }
                                ?>                                                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
				</div>
			</main>

			
<?php
include_once __DIR__.'/../layouts/app_footer.php';
?>

		