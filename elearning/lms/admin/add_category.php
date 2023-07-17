<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/categoryController.php';

// ob_start();
$cat_controller=new CategoryController();
if(isset($_POST['submit']))
{
    if(empty($_POST['name']))
    {
        $name_error="Please Fill Your Category Name!";
    }
    else{
        $name=$_POST['name'];
    }

    if(empty($_POST['name']))
    {
        $error=true;
    }
    else
    {
        $name=$_POST['name'];
        $status=$cat_controller->addCategory($name);
        if($status)
        {
            echo '<script>location.href="category.php?status='.$status.'"</script>';
        }
    }
}
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add New Category</strong> Dashboard</h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div>
                                    <label for="" class="form-label">Category Name</label>
                                    <input type="text" name="name" class="form-control">
                                    <?php if(isset($error) && isset($name_error)) echo "<span class='text-danger'>$name_error</span>"; ?>
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

		