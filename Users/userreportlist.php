<?php
session_start();

require_once("DatabaseV2/config.php");

$ID = $_GET['ID'];

?>
						<table class="table table-striped table-bordered table-hover " id="tblUSER">
							<thead>
								<tr>
									<th>#</th>
									<th class="">Doc No.</th>
									<th class="">Posting Date</th>
									<th class="">Due Date</th>
									<th class="">Customer Name</th>
									<th class="">Remarks</th>
								</tr>
							</thead>
							<tbody>
								
							

		</tbody>
	</table>
	
	<script>
    $(document).ready(function() 
	{
        $('#tblUSER').dataTable({
			"bLengthChange": false,
		});
	});
    </script>
