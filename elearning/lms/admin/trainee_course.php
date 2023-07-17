<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/traineeController.php';
include_once __DIR__.'/../controller/batchController.php';

$trainee_con=new TraineeController();
$trainees=$trainee_con->getRegistration();

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Registration</strong> Dashboard</h1>
                    <?php
                      if(isset($_GET['result'])&& $_GET['result']==1)
                      {
                        echo "<div class='alert alert-success text-success'> New Registration has been successfully created</div>";
                      }
                      elseif(isset($_GET['result'])&& $_GET['result']==2)
                      {
                        echo "<div class='alert alert-success text-success'>Registration has been successfully updated</div>";
                      }
                    ?>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="add_registration.php" class="btn btn-dark">Add Registration Form</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Batch Name</th>
                                        <th>Trainee Name</th>
                                        <th>Join_Date</th>
                                        <th>Status</th>  
                                        <!-- <th>Email</th> -->
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
                                        echo "<td>".$trainee['bname']."</td>";
                                        echo "<td>".$trainee['tname']."</td>";
                                        echo "<td>".$trainee['date']."</td>"; 
                                        echo "<td>".$trainee['status']."</td>"; 
                                        // echo "<td>".$trainee['email']."</td>";
                                        if($trainee['email']==1)
                                           echo "<td>Already Send!</td>";
                                           else
                                           echo "<td id='".$trainee['id']."'> <a class='btn btn-info mx-3 add_email' href='email_registration.php?id=".$trainee['id']."'>Send</a></td>";
                                           echo "<td id='".$trainee['id']."'> <a class='btn btn-warning mx-3' href='edit_trainee_course.php?id=".$trainee['id']."'>Edit</a><button class='btn btn-danger mx-1 btn3_delete'>Delete</button> </td>";
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

		