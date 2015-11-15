<?php
	require_once 'init.php';
?> 
<!DOCTYPE html>
<html>
	<head>
		<title>House Banking</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/admin.js"></script>
		<style>
		</style>
	</head>
	<body>
		<?php
			require_once 'navbar.php';
			if (get_session_status() === 'admin changed user') {
				echo '<div style="color:green">Successfully changed user information.</div>';
			}
		?>
			
		<form class="form-inline" role="form" action="admin.php?submission=verify_users" method="post" id="verify-user-form">
			<div class="table-responsive col-md-2">
				<h3>Verify Users:</h3>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>User</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php
						echo '<tr>' .
							'<td>All</td>' .
							'<div class="checkbox">' . 
							'<td>' . '<input type="checkbox" class="all" name="all" value="on">' . '</td>' .
							'</div>' .
							'</tr>';
						foreach ($users as $id => $user) {
							if (!$user['verified']) {
								echo '<tr>' .
									'<td>' . $id_to_user[$id] . '</td>' .
									'<div class="checkbox">' . 
									'<td>' . '<input type="checkbox" name="select' . $id . '" value="on">' . '</td>' .
									'</div>' .
									'</tr>';
							}
						}
					?>	
					</tbody>
				</table>
			<input type="hidden" name="session_token" value=<?php echo '"' . htmlspecialchars($curr_user->session_token) . '"' ?>>
			<button type="submit" class="btn btn-default">Submit</button>
			</div>
		</form>

		<form class="form-inline" role="form" action="admin.php?submission=make_admins" method="post" id="make-admin-form">
			<div class="table-responsive col-md-2">
				<h3>Make Admins:</h3>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>User</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php
						echo '<tr>' .
							'<td>All</td>' .
							'<div class="checkbox">' . 
							'<td>' . '<input type="checkbox" class="all" name="all" value="on">' . '</td>' .
							'</div>' .
							'</tr>';
						foreach ($users as $id => $user) {
							if (!$user['admin']) {
								echo '<tr>' .
									'<td>' . $id_to_user[$id] . '</td>' .
									'<div class="checkbox">' . 
									'<td>' . '<input type="checkbox" name="select' . $id . '" value="on">' . '</td>' .
									'</div>' .
									'</tr>';
							}
						}
					?>	
					</tbody>
				</table>
			<input type="hidden" name="session_token" value=<?php echo '"' . htmlspecialchars($curr_user->session_token) . '"' ?>>
			<button type="submit" class="btn btn-default">Submit</button>
			</div>
		</form>

		<form class="form-inline" role="form" action="admin.php?submission=delete_users" method="post" id="delete-user-form">
			<div class="table-responsive col-md-2">
				<h3>Delete Users:</h3>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>User</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php
						echo '<tr>' .
							'<td>All</td>' .
							'<div class="checkbox">' . 
							'<td>' . '<input type="checkbox" class="all" name="all" value="on">' . '</td>' .
							'</div>' .
							'</tr>';
						foreach ($users as $id => $user) {
							if (!$user['deleted']) {
								echo '<tr>' .
									'<td>' . $id_to_user[$id] . '</td>' .
									'<div class="checkbox">' . 
									'<td>' . '<input type="checkbox" name="select' . $id . '" value="on">' . '</td>' .
									'</div>' .
									'</tr>';
							}
						}
					?>	
					</tbody>
				</table>
				<input type="hidden" name="session_token" value=<?php echo '"' . htmlspecialchars($curr_user->session_token) . '"' ?>>
				<button type="submit" class="btn btn-default">Submit</button>
			</div>
		</form>
	</body>
</html>
<?php
	require_once 'closer.php';
?>