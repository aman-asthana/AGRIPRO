<?php
require_once __DIR__ . '/../config/connection.inc.php';
$msg = '';

if (isset($_POST['submit'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$secure_pwd = md5($password);

	$sql = "SELECT * FROM adminreg WHERE email = '$email' AND password = '$secure_pwd'";

	$sql_qry = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($sql_qry);

	if ($count > 0) {
		$_SESSION['USER_LOGIN'] = $email;
		header('LOCATION:../admin/adminindex.php');
	} else {
		$msg = 'Please Enter the correct Details';
	}
}

?>


<?php include '../../include_common/header.php'; ?>
<section class="h-100 ">
	<div class="container h-100 p-5">
		<div class="row justify-content-sm-center h-100 border border-success">
			<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
				<div class="text-center my-3">						<img src="../../assets/img/logo.jpg" alt="logo" width="150">
				</div>
				<div class="card shadow-lg alert alert-success">
					<?php if ($msg) : ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $msg; ?>
						</div>
					<?php endif; ?>
					<div class="card-body p-5 ">
						<h1 class="fs-4 card-title fw-bold mb-4 text-dark">Admin Login</h1>
						<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
							<div class="mb-3">
								<label class="mb-2 text-muted" for="email">E-Mail Address</label>
								<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
								<div class="invalid-feedback">
									Email is invalid
								</div>
							</div>

							<div class="mb-3">
								<div class="mb-2 w-100">
									<label class="text-muted" for="password">Password</label>
								</div>
								<input id="password" type="password" name="password" class="form-control" required>
								<div class="invalid-feedback">
									Password is required
								</div>
							</div>

							<div class="d-flex align-items-center">
								<button type="submit" name="submit" class="btn btn-info ms-auto text-white">
									Login
								</button>
							</div>
						</form>
					</div>
					<div class="card-footer py-3 border-2 alert alert-light">
						<div class="text-center">
							<!-- Don't have an account? <a href="adminregister.php" class="text-dark">Create One</a><br> -->
							<a href="login.php" class="text-dark">Goto user login</a>
						</div>
					</div>
				</div>
				<!-- <div class="text-center mt-1 text-muted">
					
				</div> -->
			</div>
		</div>
	</div>
</section>

<?php include '../../include_common/footer.php'; ?>