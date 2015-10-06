<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Чат</title>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<style>
	b{
		color: #3498DB;
	}
	.container{
		padding-top:60px; 
	}

	.Khaki{

		color: #ACFF19;
	}
</style>
	<div class="container">
		<div class="row">
			<div class="col-sm-6" id="msg">
				<p></p>
			</div>
			<div class="col-sm-6">
				<form>
				<div class="form-group">
					<input class="form-control" id="name" type="text" placeholder="login" name="login" required>
				</div>
				<div class="form-group">	
					<textarea class="form-control" required id="message" name="message" placeholder="enter a message" cols="30" rows="10"></textarea>
				</div>
					<button class="btn btn-default" type="button" id="send">Send</button>
				</form>
				
			</div>
		</div>
	</div>
	<script src="js/main.js"></script>
</body>
</html>