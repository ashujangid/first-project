<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>	
</head>
<body>
	<div class="container">
		<h3 align="center">User Table Data</h3>
		<table align="center">
			<tr>
			<td>Sr No.</td>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Email Address</td>
			<td>Password</td>
			</tr>

			<?php if (isset($result)):
			$i=1;
			?>
			<?php foreach ($result as $row): ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row->first_name; ?></td>
					<td><?php echo $row->last_name; ?></td>
					<td><?php echo $row->email; ?></td>
					<td><?php echo $row->password; ?></td>
					<td><?php echo anchor('dashboard/edit_user?id='. $row->id, 'Edit', '$id ="$row->id"'); ?></td>
					<td><?php echo anchor('dashboard/edit_user?id='.$row->id, 'Delete', '$id="$row->id"') ?></td>
				</tr>
				<?php $i++; ?>
				<?php endforeach; ?>
		<?php endif; ?>

		</table><p align="center">
		<?php echo anchor('dashboard/logout', 'Logout'); ?>
	</p>
	</div>
</body>
</html>