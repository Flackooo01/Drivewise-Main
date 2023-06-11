<?php 
require_once("include/initialize.php");
?>

<div class="container">
    <form method="post" enctype="multipart/form-data"  class="text-center">
        <div class="row mt-3">
            <h4><span class="bi-list"></span> Add Research</h4>
            <hr>
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <div class="form-floating mb-2 text-start">
                    <input type="text" class="form-control" value="" name="Research" name="Research" id="floatingInput" placeholder="Title" required>
                    <label for="floatingInput">Title</label>
                </div>
                <div class="form-floating mb-2 text-start">
                    <textarea class="form-control" id="Abstract" name="Abstract" placeholder="Vaccination Site"></textarea>
                    <label for="Area">Abstract</label>
                </div>
                <div class="mb-2 text-start">
                    <input type="file" class="form-control" name="file" id="file" accept="application/pdf, .doc,.doc,.pdf" required>
                </div>

                <div class="row">
                    <div class="mb-2 text-start">
                        <select class="form-control input-md" Placeholder="Select Tags" name="SubCategory" id="SubCategory" aria-label=".form-select-sm example"  data-live-search="true" value="" onchange="changeFunc();">
                                <?php 
                                        $sql = "SELECT * FROM `subcategory` group by SubCategory";
                                        $mydb->setQuery($sql);
                                        $cur = $mydb->loadResultList();
                                        foreach ($cur as $res) {
                                        echo '<option value='.$res->SubCategoryID.'>'.$res->SubCategory.'</option>';
                                        }                                    
                                ?>
                        </select>
                    </div>
                </div>
                <div class="form-floating mb-2 text-start">
                    <textarea class="form-control" id="alltext" name="alltext" readonly></textarea>
                    <label for="alltext">Tags</label>
                </div>

            </div>
            <div class="col-md-3">

            </div>
        </div>
  
        <div class="row g-1 mb-1">
                <div class="col-12">
                    <button type="submit" name="btnSubmit" class="btn btn-outline-success btn-sm "><span class="bi-arrow-up-right-circle-fill"></span> Submit</button>
                    <a href="index.php?q=researchlist" ><button type="button" class="btn btn-outline-danger btn-sm"><span class="bi-x-circle-fill"></span> Cancel</button></a>
                </div>
            </div>
    </form>
</div>

<script>
   document.addEventListener("DOMContentLoaded", function(e){

     // default
     var els = document.querySelectorAll(".SubCategory");
     els.forEach(function(select){
       NiceSelect.bind(select);
     });

     // seachable 
     var options = {searchable: true};
     NiceSelect.bind(document.getElementById("SubCategory"), options); 
   });

   function changeFunc() {
 var selectBox = document.getElementById("SubCategory");
 var selectedValue = selectBox.options[selectBox.selectedIndex].text;
 //alert(selectedValue);

 if (selectedValue.length > 0 && document.getElementById("alltext").value.indexOf(selectedValue) > -1) {
    document.getElementById("alltext").value = document.getElementById("alltext").value.replace(selectedValue + ", ", "");
  } else {
    document.getElementById("alltext").value += selectedValue + ", ";
  }

}

  </script>

<?php

if(isset($_POST["btnSubmit"])){




    // File upload path
    $targetDir = "files/";
    $fileName = $_FILES["file"]["name"];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($fileName,PATHINFO_EXTENSION);
    // Allow certain file formats
    $allowTypes = array('doc','docx','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){

            $MyClass = New Research;
            $MyClass->Research= $_POST["Research"];
            $MyClass->Location= $targetFilePath;
            $MyClass->Abstract= $_POST["Abstract"];
            $MyClass->Tags= $_POST["alltext"];
            $MyClass->create();
            echo '<script>alert("Research Uploaded!")</script>';
           redirect("index.php?q=researchlist");
        }else{
            echo '<script>alert("Sorry, there was an error uploading your file.")</script>';
        }
    }else{
        echo '<script>alert("Sorry, only DOC, DOCX & PDF files are allowed to upload.")</script>';
    }
}

// Display status message
//echo $statusMsg;
?>
