<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/instructorController.php';


$inst_controller=new InstructorController();

if(isset($_POST['submit']))
        {
            if(empty($_POST['name']))
            {
                $name_error="Please Fill Your Instructor Name!";
            }
            else{
                $name=$_POST['name'];
            }

            if(empty($_POST['email']))
            {
                $email_error="Please Enter Your Instructor Email!";
            }
            else{
                $email=$_POST['email'];
            }
                
            if(empty($_POST['phone']))
            {
                $phone_error="Please Fill Your Instructor Phone Number!";
            }
            else{
                $phone=$_POST['phone'];
            }
                
            if(empty($_POST['address']))
            {
                $address_error="Please Fill Your Instructor Address!";
            }
            else{
                $address=$_POST['address'];
            }
            
          if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['address']))
            {
                $error=true;
            }
            else
            {
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $phone=$_POST['phone'];
                    $address=$_POST['address'];
                $status=$inst_controller->addInstructor($name,$email,$phone,$address);
                if($status)
                {
                    echo '<script>location.href="instructor.php?status='.$status.'"</script>';
                        
                }
            }
        }
        


?>
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add New instructor</strong> Dashboard</h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" enctype="multipart/form-data" method="post">
                                
                                    <div>
                                        <label for="" class="form-label">Instructor Name</label>
                                        <input type="text" name="name" class="form-control" value="<?php if(isset($name)) echo $name; ?>">
                                        <?php if(isset($error) && isset($name_error)) echo "<span class='text-danger'>$name_error</span>"; ?>
                                    </div>
                                    <div>
                                        <label for="" class="form-label">Instructor Email</label>
                                        <input type="text" name="email" class="form-control" value="<?php if(isset($email)) echo $email; ?>">
                                        <?php if(isset($error) && isset($email_error)) echo "<span class='text-danger'>$email_error</span>"; ?>
                                    </div>
                                    <div>
                                        <label for="" class="form-label">Instructor Phone</label>
                                        <input type="text" name="phone" class="form-control" value="<?php if(isset($phone)) echo $phone; ?>">
                                        <?php if(isset($error) && isset($phone_error)) echo "<span class='text-danger'>$phone_error</span>"; ?>
                                    </div>
                                    <div>
                                        <label for="" class="form-label">Instructor Address</label>
                                        <input type="text" name="address" class="form-control" value="<?php if(isset($address)) echo $address; ?>">
                                        <?php if(isset($error) && isset($address_error)) echo "<span class='text-danger'>$address_error</span>"; ?>
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

		