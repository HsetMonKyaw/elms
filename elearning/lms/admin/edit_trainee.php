<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/traineeController.php';

$id=$_GET['id'];
$train_con=new TraineeController();
$trainees=$train_con->getTraineeInfos($id);
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
        $result=$train_con->editTrainee($id, $name, $email, $phone, $city, $education,$remark, $status);
        if($result)
        {
            $message=2;
            echo "<script>location.href='trainee.php?result=".$message."'</script>";
        }
    }
    
}

?>

            <main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Edit Trainee<strong></h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div>
                                    <label for="" class="form-label">Trainee Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $trainees['name'];?>">
                                    <?php if(isset($error) && isset($name_error)) echo "<span class='text-danger'>$name_error</span>"; ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Trainee Email</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $trainees['email'];?>">
                                    <?php if(isset($error) && isset($email_error)) echo "<span class='text-danger'>$email_error</span>"; ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Trainee Phone</label>
                                    <input type="text" name="phone" class="form-control" value="<?php echo $trainees['phone'];?>">
                                    <?php if(isset($error) && isset($phone_error)) echo "<span class='text-danger'>$phone_error</span>"; ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Trainee City</label>
                                    <input type="text" name="city" class="form-control" value="<?php echo $trainees['city'];?>">
                                    <?php if(isset($error) && isset($city_error)) echo "<span class='text-danger'>$city_error</span>"; ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Trainee Education</label>
                                    <input type="text" name="education" class="form-control" value="<?php echo $trainees['education'];?>">
                                    <?php if(isset($error) && isset($education_error)) echo "<span class='text-danger'>$education_error</span>"; ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Trainee Remark</label>
                                    <input type="text" name="remark" class="form-control" value="<?php echo $trainees['remark'];?>">
                                    <?php if(isset($error) && isset($remark_error)) echo "<span class='text-danger'>$remark_error</span>"; ?>
                                </div>
                                <div>
                                    <label for="" class="form-label">Trainee Status</label>
                                    <input type="text" name="status" class="form-control" value="<?php echo $trainees['status'];?>"> 
                                    <?php if(isset($error) && isset($status_error)) echo "<span class='text-danger'>$status_error</span>"; ?>  
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