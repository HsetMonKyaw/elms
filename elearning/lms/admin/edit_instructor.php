<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/instructorController.php';

$id=$_GET['id'];
$inst_con=new InstructorController();
$instructor=$inst_con->getInstructors($id);

if(isset($_POST['submit']))
{
    if(empty($_POST['name'])){
        $nameerror="Please Fill Your Instructor Name!";
    }
    else{
        $name=$_POST['name'];
    }

    if(empty($_POST['email'])){
        $emailerror="Please Fill Your Instructor Email!";
    }
    else{
        $email=$_POST['email'];
    }

    if(empty($_POST['phone'])){
        $phoneerror="Please Fill Your Instructor Phone!";
    }
    else{
        $phone=$_POST['phone'];
    }

    if(empty($_POST['address'])){
        $addresserror="Please Fill Your Instructor Address!";
    }
    else{
        $address=$_POST['address'];
    }

    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) ||empty($_POST['address']))
    {
        $error=true;
    }
    else
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $status=$inst_con->editInstructor($id,$name,$email,$phone,$address);
        if($status)
        {
            $message=2;
            echo '<script>location.href="instructor.php?status='.$message.'"</script>';
        }
    }

}

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Edit Instructor</strong></h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div>
                                    <label for="" class="form-label">Instructor Name</label>
                                    <input type="text" name="name" id="" class="form-control" value="<?php echo $instructor['name']; ?>">
                                    <?php if(isset($error) && isset($nameerror)) echo "<span class='text-danger'>$nameerror</span>"; ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Instructor email</label>
                                    <input type="text" name="email" id="" class="form-control" value="<?php echo $instructor['email']; ?>">
                                    <?php if(isset($error) && isset($emailerror)) echo "<span class='text-danger'>$emailerror</span>"; ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Instructor Phone</label>
                                    <input type="text" name="phone" id="" class="form-control" value="<?php echo $instructor['phone']; ?>">
                                    <?php if(isset($error) && isset($phoneerror)) echo "<span class='text-danger'>$phoneerror</span>"; ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Instructor Address</label>
                                    <input type="text" name="address" id="" class="form-control" value="<?php echo $instructor['address']; ?>">
                                    <?php if(isset($error) && isset($addresserror)) echo "<span class='text-danger'>$addresserror</span>"; ?>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-primary" name="submit">Update</button>
                                </div>                                     
                            </form>   
                        </div>
                    </div>
                    
				</div>
			</main>

			
<?php
include_once __DIR__.'/../layouts/app_footer.php';
?>

		