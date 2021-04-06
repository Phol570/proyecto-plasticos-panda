<?php include('header.php'); ?>
<?php
	session_start();
	
	if (isset($_SESSION['id'])){
		$query=mysqli_query($conn,"select * from user where userid='".$_SESSION['id']."'");
		$row=mysqli_fetch_array($query);
		
		if ($row['access']==1){
			header('location:admin/');
		}
		else{
			header('location:user/');
		}
	}
?>
<body>
<div class="container">
	<div id="login_form" class="well">
		<h2><center><span class="glyphicon glyphicon-lock"></span> BIENVENIDO </center></h2>
		<hr>
		<form method="POST" action="login.php">
		Usuario: <input type="text" name="username" class="form-control" required>
		<div style="height: 10px;"></div>		
		Contraseña: <input type="password" name="password" class="form-control" required> 
		<div style="height: 10px;"></div>
		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Ingresar </button>
		<button class="btn btn-primary" onclick="location.href='https://plasticospanda.000webhostapp.com/index.html'"><span class="glyphicon glyphicon-home"></span> Regresar al inicio </button>
		<div style="height: 15px;"></div>
		<div style="color: red; font-size: 15px;">
			<center>
			<?php
				
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			?>
			</center>
		</div>
	</div>
</div>
<?php include('script.php'); ?>
</body>
</html>