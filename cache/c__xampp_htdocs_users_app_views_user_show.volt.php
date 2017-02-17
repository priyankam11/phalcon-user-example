<h1>USERS</h1>
<div class="container">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Gender</th>
				<th>Education</th>
				<th>Skills</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($user_data as $data) { ?>
				<tr>
				<td><?= $data->first_name ?></td>
				<td><?= $data->last_name ?></td>
				<td><?= $data->email ?></td>
				<td><?= $data->gender ?></td>
				<td><?= $data->education ?></td>
				<td><?= $data->skill ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>