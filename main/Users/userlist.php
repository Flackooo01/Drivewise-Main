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
					<th>Password</th> 
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
						echo '<td>'.$result->Password.'</td>';
						echo '</tr>';
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
