<!-- JAVA SCRIPT -->

<div id="JAVASCRIPT">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.js"></script>

    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>    
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>    
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script> 

  <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>jquery/jquery.min.js"></script>
  <script src="<?php echo web_root; ?>js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo web_root; ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="<?php echo web_root; ?>js/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>
  <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/jquery.dataTables.js"></script>
  <script src="<?php echo web_root; ?>assets/iCheck/icheck.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script type="text/javascript" src="<?php echo web_root; ?>js/jquery-ui.js"></script>
  <script type="text/javascript" src="<?php echo web_root; ?>js/autofunc.js"></script>

  <script src="nice-select2/dist/js/nice-select2.js"></script>
  <script src="nice-select2/docs/demo/fastclick.js"></script>
  <script src="nice-select2/docs/demo/prism.js"></script>
</div>


<script>
  $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

    // or instead:
    // var maxDate = dtToday.toISOString().substr(0, 10);

    //alert(maxDate);
  
    $('#ScheduleDate').attr('min', maxDate);

  
});
  function checkall(selector) {
    if (document.getElementById('chkall').checked == true) {
      var chkelement = document.getElementsByName(selector);
      for (var i = 0; i < chkelement.length; i++) {
        chkelement.item(i).checked = true;
      }
    } else {
      var chkelement = document.getElementsByName(selector);
      for (var i = 0; i < chkelement.length; i++) {
        chkelement.item(i).checked = false;
      }
    }
  }

  function checkNumber(textBox) {
    while (textBox.value.length > 0 && isNaN(textBox.value)) {
      textBox.value = textBox.value.substring(0, textBox.value.length - 1)
    }
    textBox.value = trim(textBox.value);
  }
  //
  function checkText(textBox) {
    var alphaExp = /^[a-zA-Z]+$/;
    while (textBox.value.length > 0 && !textBox.value.match(alphaExp)) {
      textBox.value = textBox.value.substring(0, textBox.value.length - 1)
    }
    textBox.value = trim(textBox.value);
  }




  function SearchStatus() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("Status");
    filter = input.value.toUpperCase();
    table = document.getElementById("example");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[5];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
  
  $(document).ready(function () {
    $('#example').DataTable();
});



$(document).on("click", ".savethis", function() {
    var itemid = $(this).data('id');
    //alert(itemid);

    $.ajax({
      type: "POST",
      url: "addtocart.php",
      dataType: "text",
      data: {
        ItemID: itemid
      },
      success: function(data) {
        alert(data);
        document.location.reload(true)
      },
      error: function(result) {
        //alert('error');
      }
    });
  });

  $(document).on("click", ".ongoing", function() {
    var itemid = $(this).data('id');
    //alert(itemid);

    $.ajax({
      type: "POST",
      url: "ongoing.php",
      dataType: "text",
      data: {
        ItemID: itemid
      },
      success: function(data) {
       // alert(data);
        document.location.reload(true)
      },
      error: function(result) {
        //alert('error');
      }
    });
  });

  $(document).on("click", ".solved", function() {
    var itemid = $(this).data('id');
    //alert(itemid);

    $.ajax({
      type: "POST",
      url: "solved.php",
      dataType: "text",
      data: {
        ItemID: itemid
      },
      success: function(data) {
       // alert(data);
        document.location.reload(true)
      },
      error: function(result) {
        //alert('error');
      }
    });
  });

  $(document).on("click", ".citethis", function() {
    var itemid = $(this).data('id');
    //alert(itemid);

    $.ajax({
      type: "POST",
      url: "citethis.php",
      dataType: "text",
      data: {
        ItemID: itemid
      },
      success: function(data) {
        //alert(data);
        document.location.reload(true)
      },
      error: function(result) {
        //alert('error');
      }
    });
  });

  $(document).on("click", ".citethisdelete", function() {
    var itemid = $(this).data('id');
    //alert(itemid);

    $.ajax({
      type: "POST",
      url: "citethisdelete.php",
      dataType: "text",
      data: {
        ItemID: itemid
      },
      success: function(data) {
       // alert(data);
        document.location.reload(true)
      },
      error: function(result) {
        //alert('error');
      }
    });
  });

  $(document).on("click", ".addview", function() {
    var itemid = $(this).data('id');
    //alert(itemid);

    $.ajax({
      type: "POST",
      url: "addview.php",
      dataType: "text",
      data: {
        ItemID: itemid
      },
      success: function(data) {
       // alert(data);
        document.location.reload(true)
      },
      error: function(result) {
        //alert('error');
      }
    });
  });




</script>