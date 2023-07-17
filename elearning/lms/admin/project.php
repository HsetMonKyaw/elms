<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/projectController.php';

$project_con=new ProjectController();
$projects=$project_con->getProject();
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Project</strong> Dashboard</h1>
                    <?php
                      if(isset($_GET['status'])&& $_GET['status']==1)
                      {
                        echo "<div class='alert alert-success text-success'> New project has been successfully created</div>";
                      }
                      elseif(isset($_GET['status'])&& $_GET['status']==2)
                      {
                        echo "<div class='alert alert-success text-success'>Project has been successfully updated</div>";
                      }
					  ?>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="add_project.php" class="btn btn-primary">Add New Project</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>Batch</th>
                                        <th>Trainee</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $count=1;
                                    foreach($projects as $project)
                                    {
                                        echo "<tr>";
                                        echo "<td>".$count++."</td>";
                                        echo "<td>".$project['title']."</td>";
                                        echo "<td>".$project['desp']."</td>";
                                        echo "<td>".$project['date']."</td>";
                                        echo "<td>".$project['bname']."</td>";
                                        echo "<td> <a class='btn btn-info mx-3' href='add_ojt_trainee.php?id=".$project['id']."'>Trainee</a></td>";
                                        echo "<td id='".$project['id']."'> <a class='btn btn-warning mx-2' href='edit_project.php?id=".$project['id']."'>Edit</a> <button class='btn btn-danger mx-2 btn5_delete'>Delete</button> </td>";
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

		