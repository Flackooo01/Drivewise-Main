

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
                    style="background-color: #A8A8A8; border-bottom-width: thick; border-color: #f0ad4e;">
                    <h4 class="modal-title w-100" id="myModalLabel" style="color:black">List of G/L Accounts</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <table class="table table-striped table-bordered table-hover" id="tblGL" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Account Number</th>
                                <th>Account Name</th>
                                <th>Account Balance</th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- GL Modal -->
