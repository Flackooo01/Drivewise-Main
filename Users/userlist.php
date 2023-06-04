<?php
require_once("include/initialize.php");
include("DatabaseV2/config.php");
?>

<div class="container">
	<h4 class="mt-3"><span class="bi-list"></span> <?php echo $title;?></h4>
	<hr>

	<div class="row">
		<div class="table-responsive">
			<table id="example" class="table table-bordered  table-hover">
				<thead class="table-dark">
					<th class="text-center">#</th>

					<th>Fullname</th> 
					<th>Email</th> 
					<th>Username</th> 
					<th>Action</th> 
				</thead>
				<tbody>
					<?php 
					$i = 1;
					$sql = "SELECT id  ,Concat('REF ', LPAD(id  ,10,0)) as Reference,
							Email,
							Username,`Password`,
							Fullname
							FROM `lto_userlist`";
					$mydb->setQuery($sql);
					$cur = $mydb->loadResultList();
					foreach ($cur as $result) {
						# code...
						echo '<tr>';
						echo '<td class="text-center">'.$i++.'</td>';
	
						echo '<td>'.$result->Fullname.'</td>';
						echo '<td>'.$result->Email.'</td>';
						echo '<td>'.$result->Username.'</td>';
						
						echo '<td class="text-center">
						
						<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#userModal">
						<i class="bi-eye"></i></button>
					
					</td>';
						
						echo '</tr>';


			
				echo '</tr>';
					}
					?>
				</tbody>
			</table>
		</div>
		
	</div>


</div>

 
	

    <!-- GL Modal -->
	<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document" style="width:100%">
            <!--Content-->
            <div class="modal-content-full-width modal-content">
                <!--Header-->
                <div class="modal-header"
                    style="background-color: #2c3333; ">
                    <h4 class="modal-title w-100" id="myModalLabel" style="color:white">List of User Reports</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:white">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <table class="table table-striped table-bordered table-hover" id="tblUser" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                
                                <th>Violation</th>
                                <th>Vehicle Plate No</th>
								<th>Date and Time</th>
								<th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php
			        $status = array("","PENDING","ONGOING","SOLVED");
					$qry = $con->query("SELECT * FROM lto_report order by unix_timestamp(Date_Report) desc ");
					while($row = $qry->fetch_array()):
					?>
					<tr class="<?php echo $row['Status'] == 1 ?  : '' ?>">
						<td><?php echo $row['Vehicle_Violation'] ?></td>
						<td><?php echo $row['Vehicle_Plate_No'] ?></td>
						<td><?php echo date('M d, Y h:i A',strtotime($row['Date_Report'])) ?></td>
						<td><?php echo $row['Status'] ?></td>
					</tr>
					<?php endwhile; ?>

							
                        </tbody>
                    </table>
                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #2c3333;">Close</button>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- GL Modal -->


	<script>
    $(document).ready(function() 
	{
        $('#tblUser').dataTable();
		$('div.dataTables_filter input').focus();
	});
    </script>					
