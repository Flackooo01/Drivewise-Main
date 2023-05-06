<div class="container">
	<h4 class="mt-3"><span class="bi-list"></span> <?php echo $title;?></h4>
	<hr>
	<div class="rowmb-2">
		<div class="col-md-2">
			<a href="index.php?q=researchadd" class="btn btn-sm btn-outline-success"><i class="bi-file-earmark-plus"></i> Add</a>
		</div>
	</div>	
	<hr>

	<div class="row">
		<div class="table-responsive">
			<table id="example" class="table table-bordered  table-hover">
				<thead class="table-warning">
					<th class="text-center">#</th>
					<th>Reference</th> 
					<th>Reasearch</th> 
					<th>Tags</th> 
					<th class="text-center">Action</th>
				</thead>
				<tbody>
					<?php 
					$i = 1;
					$sql = "SELECT a.ResearchID,Concat('REF ', LPAD(a.ResearchID,10,0)) as Reference, 
					a.Research,a.Tags,a.Location
					FROM `research` a ";
					$mydb->setQuery($sql);
					$cur = $mydb->loadResultList();
					foreach ($cur as $result) {
						# code...
						echo '<tr>';
						echo '<td class="text-center">'.$i++.'</td>';
						echo '<td>'.$result->Reference.'</td>';
						echo '<td>'.$result->Research.'</td>';
						echo '<td>'.$result->Tags.'</td>';
						echo '<td class="text-center">
							<a href="index.php?q=researchedit&id='.$result->ResearchID.'" class="btn btn-sm btn-outline-primary"><i class="bi-pencil"></i></a>
							<a href="index.php?q=researchabstract&id='.$result->ResearchID.'" class="btn btn-sm btn-outline-success"><i class="bi-eye"></i></a>
							<!--<a href="'.$result->Location.'" target="_blank" class="btn btn-sm btn-outline-success"><i class="bi-eye"></i></a>-->
							</td>';
						echo '</tr>';
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

