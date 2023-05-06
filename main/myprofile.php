<?php 
require_once("include/initialize.php");

$Users = New Users();
$res = $Users->single_Users($_SESSION["UserID"]);
$Firstname = $res->Firstname;
$Middlename =  $res->Middlename;
$Lastname = $res->Lastname;
$Birthdate = $res->Birthdate;
$Address = $res->Address;
$Contact = $res->Contact;
$Email = $res->Email;
$UserID = $res->UserID;
?>

<div class="container">
    <form method="post">
        <div class="row mt-3">
            <h4><span class="bi-person-circle"></span> My Profile</h4>
            <hr>
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" value="<?php echo $Firstname ?>" name="Firstname" id="floatingPassword" placeholder="Firstname">
                    <label for="floatingPassword">Firstname</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" value="<?php echo $Middlename ?>" name="Middlename" id="floatingPassword" placeholder="Middlename">
                    <label for="floatingPassword">Middlename</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" value="<?php echo $Lastname ?>" name="Lastname" id="floatingPassword" placeholder="Lastname">
                    <label for="floatingPassword">Lastname</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="date" class="form-control" value="<?php echo $Birthdate ?>" name="Birthdate" id="floatingPassword" placeholder="Birthdate">
                    <label for="floatingPassword">Birthdate</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" value="<?php echo $Address ?>" name="Address" id="floatingPassword" placeholder="Address">
                    <label for="floatingPassword">Address</label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" onkeypress="return onlyNumberKey(event)"  maxlength="11" class="form-control" value="<?php echo $Contact ?>" name="Contact" id="floatingPassword" placeholder="Mobile #">
                    <label for="floatingPassword">Mobile #</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="text" class="form-control" value="<?php echo $Email ?>" name="Email" id="floatingPassword" placeholder="Email">
                    <label for="floatingPassword">Email</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" class="form-control" value="" name="Password" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="alert alert-success" role="alert">
                    * If you don't want to change your password, leave it blank. 
                </div>
            </div>
        </div>
        <div class="row g-1 mb-1">
                <div class="col-12 text-center">
                    <button type="submit" name="btnSubmit" class="btn btn-outline-success btn-md "><span class="bi-arrow-up-right-circle-fill"></span> Submit</button>
                    <a href="index.php?q=trackfile" ><button type="button" class="btn btn-outline-danger btn-md"><span class="bi-x-circle-fill"></span> Cancel</button></a>
                </div>
            </div>
    </form>
</div>
<?php
if (isset($_POST['btnSubmit'])) {
    # code...  
    $CurrentDate = date("Y-m-d");

    if($_POST['Birthdate']>$CurrentDate) {
        echo '<script>alert("Invalid birth date!")</script>';
    }
    
    else {
        if($_POST['Password'] == "")
        {
            $Users = new Users();
            $Users->Firstname         = $_POST['Firstname'];
            $Users->Middlename         = $_POST['Middlename'];
            $Users->Lastname         = $_POST['Lastname'];
            $Users->Birthdate       = $_POST['Birthdate'];
            $Users->Address         = $_POST['Address'];
            $Users->Contact         = $_POST['Contact'];
            $Users->Email      = $_POST['Email'];
            //$Users->Password      = sha1($_POST['Password']);
            $Users->UserType      = "Admin";
            $Users->update($UserID);

            echo '<script>alert("Account Updated!.")</script>';
            redirect("index.php?q=myprofile");
        }
        else
        {
            $Users = new Users();
            $Users->Firstname         = $_POST['Firstname'];
            $Users->Middlename         = $_POST['Middlename'];
            $Users->Lastname         = $_POST['Lastname'];
            $Users->Birthdate       = $_POST['Birthdate'];
            $Users->Address         = $_POST['Address'];
            $Users->Contact         = $_POST['Contact'];
            $Users->Email      = $_POST['Email'];
            $Users->Password      = sha1($_POST['Password']);
            $Users->UserType      = "Admin";
            $Users->update($UserID);

            echo '<script>alert("Account Updated!.")</script>';
            redirect("index.php?q=myprofile");
        }

    }
}

?>
<script>
    function onlyNumberKey(evt) {
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
        return true;
    }

    $(function() {
        $("#Birthdate").datepicker({  maxDate: 0 });
    });
</script>

