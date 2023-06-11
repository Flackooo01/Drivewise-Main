<div class="container">
	<h4 class="mt-3"><span class="bi-list"></span> <?php echo $title;?></h4>
	<hr>
	<div class="rowmb-2">
		<div class="col-md-2">
			<a href="index.php?q=violationadd" class="btn btn-sm btn-outline-success"><i class="bi-file-earmark-plus"></i> Add</a>
		</div>
	</div>	
	<hr>

	<div class="row">
		<div class="table-responsive">
			<table id="example" class="table table-bordered  table-hover">
				<thead class="table-dark">
					<th class="text-center">#</th>
					<th>Reference</th> 
					<th>Violation</th> 
					<th class="text-center">Action</th>
				</thead>
				<tbody>
					<?php 
					$i = 1;
					$sql = "SELECT ViolationID,Concat('REF ', LPAD(ViolationID,10,0)) as Reference,
							Violation FROM `violation`";
					$mydb->setQuery($sql);
					$cur = $mydb->loadResultList();
					foreach ($cur as $result) {
						# code...
						echo '<tr>';
						echo '<td class="text-center">'.$i++.'</td>';
						echo '<td>'.$result->Reference.'</td>';
						echo '<td>'.$result->Violation.'</td>';
						echo '<td class="text-center">
							<a href="index.php?q=violationedit&id='.$result->ViolationID.'" class="btn btn-sm btn-outline-primary"><i class="bi-pencil"></i></a>
							<!--<a href="index.php?q=viewpdf&id='.$result->ViolationID.'" class="btn btn-sm btn-outline-danger"><i class="bi-trash"></i></a>-->
							</td>';
						echo '</tr>';
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
