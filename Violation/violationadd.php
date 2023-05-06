<?php 
require_once("include/initialize.php");
?>

<div class="container">
    <form method="post" class="text-center">
        <div class="row mt-3">
            <h4><span class="bi-list"></span> Add Violation</h4>
            <hr>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <div class="form-floating mb-2 text-start">
                    <input type="text" class="form-control" value="" name="Violation" id="floatingInput" placeholder="Violation" required>
                    <label for="floatingInput">Violation</label>
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>
        <div class="row g-1 mb-1">
                <div class="col-12">
                    <button type="submit" name="btnSubmit" class="btn btn-outline-success btn-sm "><span class="bi-arrow-up-right-circle-fill"></span> Submit</button>
                    <a href="index.php?q=violationlist" ><button type="button" class="btn btn-outline-danger btn-sm"><span class="bi-x-circle-fill"></span> Cancel</button></a>
                </div>
            </div>
    </form>
</div>

<?php
if(isset($_POST["btnSubmit"]))
{
    $MyClass = New Violation;
    $MyClass->Violation= $_POST["Violation"];
    $MyClass->create();

    echo '<script>alert("Violation Created!")</script>';
    redirect("index.php?q=violationlist");
}
?>
