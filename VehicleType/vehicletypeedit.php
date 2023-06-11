<?php 
require_once("include/initialize.php");
$id = 	$_GET['id'];
$MyClass = New VehicleType();
$res = $MyClass->single_data($id);
$VehicleType = $res->VehicleType;
?>

<div class="container">
    <form method="post" class="text-center">
        <div class="row mt-3">
            <h4><span class="bi-list"></span> Edit Vehicle Type</h4>
            <hr>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-2 text-start">
                <input type="text" class="form-control" value="<?php echo $VehicleType ?>" name="VehicleType" id="floatingInput" placeholder="Vehicle Type" required>
                    <label for="floatingInput">Vehicle Type</label>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <div class="row g-1 mb-1">
                <div class="col-12">
                    <button type="submit" name="btnSubmit" class="btn btn-outline-success btn-sm "><span class="bi-arrow-up-right-circle-fill"></span> Update</button>
                    <a href="index.php?q=vehicletypelist" ><button type="button" class="btn btn-outline-danger btn-sm"><span class="bi-x-circle-fill"></span> Cancel</button></a>
                </div>
            </div>
    </form>
</div>
<?php
if(isset($_POST["btnSubmit"]))
{
    $MyClass = New VehicleType;
    $id = 	$_GET['id'];
    $MyClass->VehicleType= $_POST["VehicleType"];
    $MyClass->update($id);

    echo '<script>alert("Vehicle Type Updated!")</script>';
    redirect("index.php?q=vehicletypelist");
}
?>
