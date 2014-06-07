<div class="users">
	<h1>Users</h1>
	<table class="table table-striped">
		<thead>
			<th>Name</th>
			<th>Mobile Number</th>
			<th>Email</th>
			<th></th>
		</thead>
		<tbody>
			<?php foreach ($users as $user) { ?>
				<tr>
					<td><?php echo $user->name; ?></td>
					<td><?php echo $user->mobile; ?></td>
					<td><?php echo $user->email; ?></td>
					<td>
						<div class="icons right">
						<a href="#"><i class="fa fa-pencil-square-o"></i> Edit</a> |
				                       <form class="delete" action="" method="POST">
							<i class="fa fa-trash-o"></i><input type="submit" value="Delete" />
				                       </form>
						</div>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>