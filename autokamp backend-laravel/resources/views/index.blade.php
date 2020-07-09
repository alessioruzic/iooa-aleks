<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>IS AUTOKAMP</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Alegreya:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<style>
a:link, a:visited {
  background-color:chocolate;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: red;
}
	</style>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<form action="{{ route('vue.pretrazivanje') }}">
							<div class="row no-margin">
								<div class="col-md-3">
									<div class="form-header">
										<h2>Rezerviraj</h2>
									</div>
								</div>
								<div class="col-md-7">
									<div class="row no-margin">
										<div class="col-md-4">
											<div class="form-group">
												<span class="form-label">Dolazak</span>
												<input class="form-control" type="date" id="datumpocetak" name="datumpocetak">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<span class="form-label">Odlazak</span>
												<input class="form-control" type="date" id="datumkraj" name="datumkraj">
											</div>
										</div>
										<!--<div class="col-md-2">
											<div class="form-group">
												<span class="form-label">Guests</span>
												<select class="form-control">
													<option>1</option>
													<option>2</option>
													<option>3</option>
												</select>
												<span class="select-arrow"></span>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<span class="form-label">Kids</span>
												<select class="form-control">
													<option>0</option>
													<option>1</option>
													<option>2</option>
												</select>
												<span class="select-arrow"></span>
											</div>
										</div>-->
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-btn">
										<button class="submit-btn">Pretraži smještaj</button>
									</div>
								</div>
								
							</div>
							
						</form>
						@auth
							<div class="col-md-2">
									<a href="{{ url('/') }}" target="_blank">Odustani</a>
								
							</div>
							@endauth
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>