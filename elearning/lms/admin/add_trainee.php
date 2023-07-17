<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/traineeController.php';

$trainee_con=new TraineeController();
$trainees=$trainee_con->getTrainee();
if(isset($_POST['submit']))
{
    if(empty($_POST['name']))
    {
        $name_error="Please Fill Your Trainee Name!";
    }
    else{
        $name=$_POST['name'];
    }

    if(empty($_POST['email']))
    {
        $email_error="Please Fill Your Trainee Email!";
    }
    else{
        $email=$_POST['email'];
    }

    if(empty($_POST['phone'])){
        $phone_error="Please Fill Your Trainee Phone";
    }
    else{
        $phone=$_POST['phone'];
    }

    if(empty($_POST['city']))
    {
        $city_error="Please Fill Your Trainee City!";
    }
    else{
        $city=$_POST['city'];
    }

    if(empty($_POST['education']))
    {
        $education_error="Please Fill Your Trainee Education!";
    }
    else{
        $education=$_POST['education'];
    }

    if(empty($_POST['remark']))
    {
        $remark_error="Please Fill Your Trainee Remark!";
    }
    else{
        $remark=$_POST['remark'];
    }

    if(empty($_POST['status']))
    {
        $status_error="Please Fill Your Trainee Status!";
    }
    else{
        $status=$_POST['status'];
    }
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['city']) || empty($_POST['education']) || empty($_POST['remark']) ||empty($_POST['status']))
    {
        $error=true;
    }
    else
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $city=$_POST['city'];
        $education=$_POST['education'];
        $remark=$_POST['remark'];
        $status=$_POST['status'];
        $result=$trainee_con->addTrainee($name,$email,$phone,$city,$education,$remark,$status);
        if($result)
        {
            echo '<script>location.href="trainee.php?result='.$result.'"</script>';
        }
    } 
}

?>
            <main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add New Trainee</strong> Dashboard</h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div>
                                    <label for="" class="form-label">Trainee Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php if(isset($name)) echo $name; ?>">
                                    <?php if(isset($error) && isset($name_error)) echo "<span class='text-danger'>$name_error</span>"; ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Trainee Email</label>
                                    <input type="text" name="email" class="form-control" value="<?php if(isset($email)) echo $email; ?>">
                                    <?php if(isset($error) && isset($email_error)) echo "<span class='text-danger'>$email_error</span>"; ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Trainee Phone</label>
                                    <input type="text" name="phone" class="form-control" value="<?php if(isset($phone)) echo $phone; ?>">
                                    <?php if(isset($error) && isset($phone_error)) echo "<span class='text-danger'>$phone_error</span>"; ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Trainee City</label>
                                    <input type="text" name="city" class="form-control" value="<?php if(isset($city)) echo $city; ?>">
                                    <?php if(isset($error) && isset($city_error)) echo "<span class='text-danger'>$city_error</span>"; ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Trainee Education</label>
                                    <input type="text" name="education" class="form-control" value="<?php if(isset($education)) echo $education; ?>">
                                    <?php if(isset($error) && isset($education_error)) echo "<span class='text-danger'>$education_error</span>"; ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Trainee Remark</label>
                                    <input type="text" name="remark" class="form-control" value="<?php if(isset($remark)) echo $remark; ?>">
                                    <?php if(isset($error) && isset($remark_error)) echo "<span class='text-danger'>$remark_error</span>"; ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Trainee Status</label>
                                    <input type="text" name="status" class="form-control" value="<?php if(isset($status)) echo $status; ?>">
                                    <?php if(isset($error) && isset($status_error)) echo "<span class='text-danger'>$status_error</span>"; ?>   
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

