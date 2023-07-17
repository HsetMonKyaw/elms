<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/batchController.php';

$batch_con=new BatchController();
$batchs=$batch_con->getBatch()
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Batch</strong> Dashboard</h1>
					<?php
                      if(isset($_GET['status'])&& $_GET['status']==1)
                      {
                        echo "<div class='alert alert-success text-success'> New batch has been successfully created</div>";
                      }
                      elseif(isset($_GET['status'])&& $_GET['status']==2)
                      {
                        echo "<div class='alert alert-success text-success'>Batch has been successfully updated</div>";
                      }
					  ?>
					<div class="row">
                        <div class="col-md-3">
                            <a href="add_batch.php" class="btn btn-primary">Add New Batch</a>
                        </div>
                    </div> 
                    
					<div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
										<th>Start_Date</th>
										<th>Duration</th>
                                        <th>Fee</th>
                                        <th>Discount</th>
                                        <th>Batch Course</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count=1;
                                    foreach($batchs as $batch)
                                    {
                                        echo "<tr>";
                                        echo "<td>".$count++."</td>";
                                        echo "<td>".$batch['bname']."</td>";
										echo "<td>".$batch['date']."</td>";
										echo "<td>".$batch['duration']."</td>";	
                                        echo "<td>".$batch['fee']."</td>";
										echo "<td>".$batch['discount']."</td>";
										echo "<td>".$batch['couname']."</td>";	
                                        echo "<td id='".$batch['id']."'> <a class='btn btn-warning mx-1' <a href='edit_batch.php?id=". $batch['id']."'>Edit</a><button class='btn btn-danger btn4_delete'>Delete</button> </td>";
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

		