<div class="container">
	<h4 class="mt-3"><span class="bi-list"></span> <?php echo $title;?></h4>
	<hr>

	<div class="row">
		<div class="table-responsive">
			<table id="example" class="table table-bordered  table-hover">
				<thead class="table-dark">
					<th class="text-center">#</th>
					<th>Reference</th> 
					<th>Violation</th> 
					<th>Vehicle Type</th> 
					<th>Date and Time</th> 
					<th>Status</th> 
					<th>Action</th> 
				</thead>
				<tbody>
					<?php 
					$i = 1;
					$sql = "SELECT a.ID ,Concat('REF ', LPAD(a.ID ,10,0)) as Reference,
							a.Vehicle_Type,
							a.Vehicle_Plate_No,
							a.Vehicle_Violation,
							a.Vehicle_Color,
							a.Remark,
							a.Report_Image,
							a.Fullname,a.Status,
							DATE_FORMAT(a.Date_Report,'%m/%d/%Y %r') as DateReported
							FROM `lto_report` a";
					$mydb->setQuery($sql);
					$cur = $mydb->loadResultList();
					foreach ($cur as $result) {
						# code...
						echo '<tr>';
						echo '<td class="text-center">'.$i++.'</td>';
						echo '<td>'.$result->ID.'</td>';
						echo '<td>'.$result->Vehicle_Violation.'</td>';
						echo '<td>'.$result->Vehicle_Type.'</td>';
						echo '<td>'.$result->DateReported.'</td>';

						if ($result->Status=="PENDING")
						{
							echo '<td><span class="badge bg-secondary">PENDING</span></td>';
						}
						elseif ($result->Status=="ONGOING")
						{
							echo '<td><span class="badge bg-primary">ONGOING</span></td>';
						}
						else
						{
							echo '<td><span class="badge bg-success">SOLVED</span></td>';
						}
					
						echo '<td class="text-center">
								<a href="index.php?q=viewreport&id='.$result->ID.'" class="btn btn-sm btn-outline-secondary"><i class="bi-eye"></i></a>
								<a href="" data-id='.$result->ID.' class="btn btn-sm btn-outline-primary ongoing"><i class="bi-recycle"></i></a>
								<a href="" data-id='.$result->ID.' class="btn btn-sm btn-outline-success solved"><i class="bi-check"></i></a>
							</td>';
					
						echo '</tr>';
					}

						
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
