<?php
if (defined("ALLOWED") === false) {
	die("Anda tidak boleh membuka halaman ini secara langsung!");
}
?>

<!doctype html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="./assets/login/css/style.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-user-o"></span>
						</div>

						<?php
						if (isset($_GET['err'])) {
							$err = $_GET['err'];
							if ($err == 1) {
								echo "<div class='alert alert-danger'>Username atau password anda salah!</div>";
							} elseif ($err == 2) {
								echo "<div class='alert alert-danger'>Anda harus login sebelum mengakses halaman tersebut!</div>";
							}
						}
						if (isset($_GET['msg'])) {
							$msg = $_GET['msg'];

							if ($msg == 1) {
								echo "<div class='alert alert-success'>Logout berhasil! Good bye!</div>";
							}
						}
						?>


						<form action="?page=login_proses" class="login-form" method="POST">
							<div class="form-group">
								<input type="text" class="form-control rounded-left" name="username" placeholder="Masukkan Username Anda" required>
							</div>
							<div class="form-group d-flex">
								<input type="password" class="form-control rounded-left" name="password" placeholder="Masukkan Password Anda" required>
							</div>
							<div class="form-group">
								<button style="top:-18px!important; position: unset;" type="submit" class="btn btn-primary rounded submit p-3 px-5" value="Login">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>

</html>