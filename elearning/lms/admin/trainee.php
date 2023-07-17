<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/traineeController.php';

$train_controller=new TraineeController();
$trainees=$train_controller->getTrainee();
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Trainee</strong> Dashboard</h1>
                    <?php
                      if(isset($_GET['result'])&& $_GET['result']==1)
                      {
                        echo "<div class='alert alert-success text-success'> New Trainee has been successfully created</div>";
                      }
                      elseif(isset($_GET['result'])&& $_GET['result']==2)
                      {
                        echo "<div class='alert alert-success text-success'>Trainee has been successfully updated</div>";
                      }
                    ?>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="add_trainee.php" class="btn btn-primary">Add New Trainee</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>Education</th>
                                        <th>Remark</th>
                                        <!-- <th>Status</th> -->
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=1;
                                    foreach($trainees as $trainee)
                                    {
                                        echo "<tr>";
                                        echo "<td>".$count++."</td>";
                                        echo "<td>".$trainee['name']."</td>";
                                        echo "<td>".$trainee['email']."</td>";
                                        echo "<td>".$trainee['phone']."</td>";
                                        echo "<td>".$trainee['city']."</td>";
                                        echo "<td>".$trainee['education']."</td>";
                                        echo "<td>".$trainee['remark']."</td>";
                                        // echo "<td>".$trainee['status']."</td>";
                                        echo "<td> <a class='btn btn-info mx-3' href='email_trainee.php?id=".$trainee['id']."'>Send</a></td>";
                                        echo "<td id='".$trainee['id']."'> <a class='btn btn-warning mx-1' href='edit_trainee.php?id=".$trainee['id']."'>Edit</a><button class='btn btn-danger mx-1 btn3_delete'>Delete</button> </td>";
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

		