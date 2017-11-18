<?php
	require 'conection.php';
try{

	$sql= 'INSERT INTO venta(rut,nombre,telefono,fecha,id_campana,id_supervisor,user_neotel,monto,user_as400,seg_vida,seg_cesantia,trx)
	VALUE(:rut,:nombre,:telefono,:fecha,:id_campana,:id_supervisor,:user_neotel,:monto,:user_as400,:seg_vida,:seg_cesantia,:trx)';
	$result= $conn->prepare($sql);
	$result->bindParam(':rut',$_POST['rut']);
	$result->bindParam(':nombre',$_POST['fullname']);
	$result->bindParam(':telefono',$_POST['telefono']);
	$result->bindParam(':fecha',$_POST['fecha']);
	$result->bindParam(':id_campana',$_POST['campana']);
	$result->bindParam(':id_supervisor',$_POST['supervisor']);
	$result->bindParam(':user_neotel',$_POST['neotel']);
	$result->bindParam(':monto',$_POST['monto']);
	$result->bindParam(':user_as400',$_POST['roble']);
	$result->bindParam(':seg_vida',$_POST['vida']);
	$result->bindParam(':seg_cesantia',$_POST['cesantia']);
	$result->bindParam(':trx',$_POST['trx']);
	$result->execute();

?>	
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Venta Ingresada</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css"/>
	<link rel="stylesheet" href="vendor/bootstrap/css/modern-business.css"/>

	<script type="text/javascript" src="vendor/jquery/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>
</head>

<body>
	<!-- Inicio nav-bar Static-->
	<nav class="navbar navbar-default navbar-fixed-top" role="navegation">
		<div class="container-fluid">
			<div class="navbar-head">
				<a class="navbar-brand" href="index.php"><img src="vendor/img/logo.png" width="120" height="30"></a>
			</div>

				<div class="collapse navbar-collapse" id="myNavbar">
       				<ul class="nav navbar-nav navbar-right" >
        			<!--<form class="navbar-form navbar-left" role="search">
                		 (boton de busqueda) <div class="form-group">
                  		 <input type="text" class="form-control" placeholder="Buscar">
                    	<button type="submit" class="btn btn-default">Buscar</button> 
         			</form> -->              
    			</div>
		</div>			
	</nav>
	<!-- fin nav-bar Static -->

		<!--barra lateral izquierda-->
	<div class="container-fluid text-center" style="margin-top: 51px">
		<div class="row content">
			<div class="col-sm-1 "> <!-- sidenav-->
			
			</div>
		<!--fin barra lateral izquierda-->

			<!-- Centro -->
		 <div class="col-sm-10 text-left">
			 <form id="shippingForm" role="form" back action="target.php"> <!-- atento a modificar-->
				 <div class="col-md-11 form-area">
					 <h2 style="margin-bottom: 35px; text-align: center">La venta se ingreso satisfactoriamente</h2>
					 

         		<a type="button" id="volver" class="btn btn-primary btn-block " href="index.php">Ingresar nueva venta</a>
               <a type="button" id="submit" class="btn btn-primary btn-block " href="ventadia.php">Ver ventas del día</a>
               <a type="button" id="submit" class="btn btn-primary btn-block " href="ventames.php">Ver ventas mes actual</a>


         			  <b>  
        		 </div>
		 </div>

		 	</form>			
	
					<!-- fin centro-->

			<!--Barra lateral derecha -->
			<div class="col-sm-1">
			
			</div>
			<!-- fin barra lateral derecha-->
		</div>		
	</div>
	<!-- fin container -->


</body>

<!--pie de pagina-->
<footer >
	<p>&#169 Synergo Action Center 2017</p>
</footer>
<!--fin pie de pagina-->
</html>
<?php
}catch (PDOException $e) {

echo $e->getMessage();;
echo 'No se pudo ingresar su venta por favor pongase en contacto con el administrador';
} 

?>