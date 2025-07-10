<?php
require_once __DIR__ . '/../config/connection.inc.php';

$msg = '';
if (isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$secure_pwd = md5($password);

	$sql = "SELECT * FROM userregistration WHERE email='$email'";
	$sql_qry = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($sql_qry);

	if ($count > 0) {
		$msg = "EMAIL ID ALREADY EXISTS";
	} else {
		$insert_sql = "INSERT INTO userregistration (name,email,password) VALUES('$name','$email','$secure_pwd')";
		$insert_qury = mysqli_query($conn, $insert_sql);
		header('location:login.php');
	}
}

?>









<?php include '../../include_common/header.php'; ?>
<section class="h-100">
	<div class="container h-100 p-5">
		<div class="row justify-content-sm-center h-100 border border-success">
			<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
				<div class="text-center my-1">
					<img src="../../assets/img/logo.jpg" alt="logo" width="150">
				</div>
				<div class="card shadow-lg alert alert-success">
					<?php if ($msg) : ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $msg; ?>
						</div>
					<?php endif; ?>

					<div class="card-body p-5">
						<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
						<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
							<div class="mb-3">
								<label class="mb-2 text-muted" for="name">Name</label>
								<input id="name" type="text" class="form-control" name="name" value="" required autofocus>
								<div class="invalid-feedback">
									Name is required
								</div>
							</div>

							<div class="mb-3">
								<label class="mb-2 text-muted" for="email">E-Mail Address</label>
								<input id="email" type="email" class="form-control" name="email" value="" required>
								<div class="invalid-feedback">
									Email is invalid
								</div>
							</div>

							<div class="mb-3">
								<label class="mb-2 text-muted" for="password">Password</label>
								<input id="password" type="password" class="form-control" name="password" required>
								<div class="invalid-feedback">
									Password is required
								</div>
							</div>
							<p class="form-text text-muted mb-3">
								By registering you agree with our terms and condition.
							</p>
							<div class="align-items-center d-flex">
								<button type="submit" name="submit" class="btn btn-info ms-auto text-dark">
									Register
								</button>
							</div>
						</form>
					</div>
					<div class="card-footer py-3 border-0 bg-light">
						<div class="text-center">
							Already have an account? <a href="login.php" class="text-dark">Login</a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>

<?php
include '../../include_common/footer.php'

?>