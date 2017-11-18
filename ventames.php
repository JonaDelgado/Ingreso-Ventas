<?php
include ("conection.php");

$sql2 = 'SELECT c.nombre cam, s.nombre sup, SUM(v.trx) trx, SUM(v.seg_cesantia) cesantia, SUM(v.seg_vida) vida, SUM(v.monto) total FROM venta v, supervisor s, campana c WHERE v.id_campana=c.id and v.id_supervisor=s.id and MONTH(v.fecha)=Month(curdate()) and YEAR(v.fecha)=YEAR(curdate()) GROUP BY v.id_supervisor, v.id_campana order by sup';
$result2= $conn->prepare($sql2);
$result2->execute();
$cruce_venta=$result2->fetchall();

$sql3 = 'SELECT c.nombre nombre, SUM(v.trx) trx, SUM(v.seg_cesantia) cesantia, SUM(v.seg_vida) vida, SUM(v.monto) total FROM venta v, campana c where v.id_campana=c.id and MONTH(v.fecha)=Month(curdate()) and YEAR(v.fecha)=YEAR(curdate()) GROUP BY v.id_campana ORDER BY total desc';
$result3=$conn->prepare($sql3);
$result3->execute();
$venta_campana=$result3->fetchall();

$sql4 = 'SELECT s.nombre nombre, SUM(v.trx) trx, SUM(v.seg_cesantia) cesantia, SUM(v.seg_vida) vida, SUM(v.monto) total FROM venta v, supervisor s where v.id_supervisor=s.id and MONTH(v.fecha)=Month(curdate()) and YEAR(v.fecha)=YEAR(curdate()) GROUP BY v.id_supervisor order by total desc';
$result4=$conn->prepare($sql4);
$result4->execute();
$venta_supervisor=$result4->fetchall();
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Ranking Acumulado Mensual</title>
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
				<a class="navbar-brand" href="index.html"><img src="vendor/img/logo.png" width="120" height="30"></a>
			</div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Ingreso venta</a></li>
        <li><a href="ventadia.php">Cuadro dia Actual</a></li>
        <li><a href="ventames.php">Cuadro mes Actual</a></li>
      </ul>
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
			<div class="col-sm-1 " style="padding-top:120px"> <!-- sidenav-->
      <p><a class="btn btn-primary btn-sm btn-block" href="index.php">Ingresar venta</a></p>
			<p><a class="btn btn-primary btn-sm btn-block" href="ventames.php">Mes Actual</a></p>
      <p><a class="btn btn-primary btn-sm btn-block" href="ventadia.php">Dia Actual</a></p>      
			</div>
		<!--fin barra lateral izquierda-->

			<!-- Centro -->
		 <div class="col-sm-9 text-center form-area">
      <h2>Ventas Acumuladas Mes <?php echo date('m');?> del <?php echo date('Y'); ?></h2>
        <div class="col-sm-6 text-left">
          <table class="table table-bordered">
                <thead>
                  <tr class="info">
                    <th>Campaña</th>
                    <th>TRX</th>
                    <th>Seg. Cesantía</th>
                    <th>Seg. Vida</th>
                    <th>Monto</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <?php
                  foreach ($venta_campana as $key => $value) { ?>
                  <tr class="warning">
                    <th><?php echo $value['nombre'] ;?></th>
                    <th><?php echo $value['trx'] ;?></th>
                    <th><?php echo $value['cesantia'] ;?></th>
                    <th><?php echo $value['vida'] ;?></th>
                    <th><?php setlocale(LC_MONETARY, 'es_CL');
                    echo "$"; echo number_format($value['total'],0,",",".") ;?></th>
                  </tr>
                  
                  <?php } ?>
                  </tr>
                </tbody>                
              </table>
            </div>

            <div class="col-sm-6 text-left">
              <table class="table table-bordered">
                <thead>
                  <tr class="info">
                    <th>Supervisor</th>
                    <th>TRX</th>
                    <th>Seg. Cesantía</th>
                    <th>Seg. Vida</th>
                    <th>Monto</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <?php
                  foreach ($venta_supervisor as $key => $value) { ?>
                  <tr class="warning">
                    <th><?php echo $value['nombre'] ;?></th>
                    <th><?php echo $value['trx'] ;?></th>
                    <th><?php echo $value['cesantia'] ;?></th>
                    <th><?php echo $value['vida'] ;?></th>
                    <th><?php setlocale(LC_MONETARY, 'es_CL');
                    echo "$"; echo number_format($value['total'],0,",",".") ;?></th>
                  </tr>
                  
                  <?php } ?>
                  </tr>
                </tbody>                
              </table>        
        </div>
        <div class="col-sm-12 tex-center">
            <h3>Ventas Supervisor X campaña</h3>
              <table class="table table-bordered">
                <thead>
                  <tr class="info">
                    <th>Supervisor</th>
                    <th>Campaña</th>
                    <th>TRX</th>
                    <th>Seg. Cesantía</th>
                    <th>Seg. Vida</th>
                    <th>Monto</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <?php
                  foreach ($cruce_venta as $key => $value) { ?>
                  <tr class="warning">
                    <th><?php echo $value['sup'] ;?></th>
                    <td><?php echo $value['cam'] ;?></td>
                    <td><?php echo $value['trx'] ;?></td>
                    <td><?php echo $value['cesantia'] ;?></td>
                    <td><?php echo $value['vida'] ;?></td>
                    <td><?php setlocale(LC_MONETARY, 'es_CL');
                    echo "$"; echo number_format($value['total'],0,",",".") ;?></td>
                  </tr>
                  
                  <?php } ?>
                  </tr>
                </tbody>                
              </table> 
   	    </div>   
    </div>	
					<!-- fin centro-->

			<!--Barra lateral derecha -->
			<div class="col-sm-1">
			
			</div>
			<!-- fin barra lateral derecha-->
		</div>		
	</div>
	<!-- fin container -->
  <script type="text/javascript">
    $(document).ready(function() {
        $('#ingresoVentas').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              fullname: {
                      validators: {
                            notEmpty: {
                                message: 'Debe ingresar el nombre completo'
                              }
                            }
                    },                                
                },                
        });
    });
  </script>
</body>

<!--pie de pagina-->
<footer >
	<p>&#169 Synergo Action Center 2017</p>
</footer>
<!--fin pie de pagina-->
</html>