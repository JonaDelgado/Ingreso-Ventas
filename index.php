<?php
include("conection.php");
$sql = 'SELECT id, nombre FROM supervisor ORDER BY nombre';
$result= $conn->prepare($sql);
$result->execute();
$sup=$result->fetchall();


$sql2 = 'SELECT id,nombre FROM campana ORDER BY nombre';
$result2= $conn->prepare($sql2);
$result2->execute();
$cam=$result2->fetchall();

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Ingreso de Ventas</title>
	<meta http-equiv="Content-type" content="text/html" charset="utf-8">
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
		  <p><a class="btn btn-primary btn-sm btn-block" href="ventames.php">Mes Actual</a></p>
      <p><a class="btn btn-primary btn-sm btn-block" href="ventadia.php">Dia Actual</a></p>      
			</div>
		<!--fin barra lateral izquierda-->

			<!-- Centro -->
		 <div class="col-sm-10 text-left">
			 <form id="ingresoVentas"  method="POST" action="grabaventa.php" > <!-- atento a modificar-->
				 <div class="col-md-11 form-area">
					 <h2 style="margin-bottom: 35px; text-align: center">Ingreso Ventas</h2>
					 <!--datos cliente-->
					 <div class="col-md-5">
						 <h4 style="margin-bottom: 35px; text-align: center">Datos de cliente</h4>
						 <br style= "clear:both">

              <div class="form-group">
                <input type="text" class="form-control" id="rut" name="rut" placeholder="RUT Cliente sin guion"> 
              </div>

						 <div class="form-group">
							  <input type="text" class="form-control" id="fullname" name="fullname" placeholder= "Nombre Cliente" minlength="10" data-bv-stringlength-message="Debe ingresar el nombre completo">
						 </div>				
						 

						 <div class="form-group">
							 <input type="text" class="form-control" name="telefono" placeholder="Teléfono Cliente" minlength="9" maxlength="9" data-bv-stringlength-message="Telefono contiene 9 digitos"> 
						 </div>

						 <div class="form-group">
							 <input type="date" class="form-control" name="fecha" placeholder="fecha llamada (YYYY-MM-DD)"> 
						 </div>


					 </div>
					
					 <div class="col-md-5" style="margin-left: 90px">
						 <h4 style="margin-bottom: 35px; text-align: center;">Datos de venta</h4>
          				 

          				 <div class="form-group">
            				 <select type="text" style="margin-bottom:15px" class="form-control" id="campana" name="campana">
            				 <option disable value="" Selected hidden>Seleccione Campaña</option>
            				 <?php
                     foreach ($cam as $key => $value) { ?>
                       <option value="<?php echo $value['id'];?>"><?php echo $value['nombre']; ?></option>
                     <?php } ?>
            				 </select>
          				 </div>

          				 <div class="form-group">
            				 <select type="text" style="margin-bottom:15px" class="form-control" id="supervisor" name="supervisor">
            					 <option disable value="" Selected hidden>Seleccione supervisor</option>
            					 <?php
                       foreach ($sup as $key => $value) { ?>
                          <option value="<?php echo $value['id']; ?>"><?php echo $value['nombre']; ?></option>
                       <?php } ?>
         				 	 </select>
         				  </div>

          				 <div class="form-group">
            				 <input type="text" class="form-control" id="neotel" name="neotel" placeholder="Usiaro Neotel" minlength="4" maxlength="4" data-bv-stringlength-message="Ingrese solo número de usuario">            
          				 </div>
  

          				 <div class="form-group">
            				 <input type="text" class="form-control" id="monto" name="monto" placeholder= "Monto vendido" minlength="5" maxlength="9" data-bv-stringlength-message="Ingrese monto de venta">            
          				 </div>
          
          				 <div class="form-group">
            				 <input type="text" class="form-control" id="roble" name="roble" placeholder= "Usuario AS-400" minlength="5" maxlength="9" data-bv-stringlength-message="Ingrese monto de venta">            
          				 </div>

          				 <div class="form-alineado">
          				 	<div class="form-group">
            				 <input type="number" min="0" max="5" class="form-control" id="vida" name="vida" placeholder= "Seguro de Vida" data-bv-integer-message="Debe ingresar solo numeros">
             				 </div>
          				 </div>

          				 <div class="form-alineado">
          				 	<div class="form-group">
            				 <input type="number" min="0" max="5" class="form-control"  id="cesantia" name="cesantia" placeholder= "Seguro Cesantía" data-bv-integer-message="Debe ingresar solo numeros">
              				 </div>
          				 </div>

          				 <div class="form-alineado">
          				 	<div class="form-group">
            				 <input type="number" min="1" max="5" class="form-control" id="trx" name="trx" placeholder= "n° trx" data-bv-integer-message="Debe ingresar solo numeros">  
                        	</div>
          				 </div>       

        			 </div>
        			 <button type="submit" value="Ingresar venta" class="btn btn-primary btn-block " data-toggle="modal" data-target="#myModal">Ingresar venta</button>

                
              <!--<div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title">Venta ingresada OK</h4>
                      </div>
                      <div class="modal-body">
                        <p>Presione Cerrar para continuar</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary:focus" data-dismiss="modal">Cerrar</button>
                        
                      </div>
                    </div>
                  </div>
                </div> -->

                <b>  
             </div>

        </form>   		 
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

              		telefono: {
              				validators: {
              					digits:{
              						message:'Solo debe ingresar solo numeros'
              					},
                      			notEmpty: {
                          			message: 'Debe ingresar número de teléfono'
                             	}
                            }
              			},
        		
           		 	rut: {
                		validators: {
                			notEmpty:{
                				message:'Debe ingresar el RUT sin guión'
                			},
                			digits:{
                				message:'Solo debe ingresar numeros'
                			},
                    		id: {
                        		country: 'CL',
                        		message: 'El valor no corresponde a un RUT'
                    		}
               		 }
            		},
            		fecha: {
                  			validators: {
                  				notEmpty:{
                  					message:'Debe ingresar fecha'
                  				},
                  				date: {
                         			 format: 'YYYY-MM-DD',
                         			 message: 'Formato fecha YYYY-MM-DD'
                             	}
                            }
              		},
              		campana: {
              				validators: {
                      			notEmpty: {
                          			message: 'Por favor seleccione una campaña'
                             	}
                            }
              			},

              		supervisor: {
              				validators: {
                      			notEmpty: {
                          			message: 'Por favor seleccione supervisor'
                             	}
                            }
              			},

              		neotel: {
              				validators: {
              					digits:{
              						message:'Solo debe ingresar numeros'
              					},
                      			notEmpty: {
                          			message: 'Ingrese usuario Neotel de ejecutivo'
                             	}
                            }
              			},

              		monto: {
              				validators: {
              					digits:{
              						message:'Solo debe ingresar numeros'
              					},
                      			notEmpty: {
                          			message: 'Ingrese monto de venta'
                             	}
                            }
              			},	

              		roble: {
              				validators: {
                      			notEmpty: {
                          			message: 'Ingrese usuario roble venta'
                             	}
                            }
              			},

              			vida: {
              				validators: {
              					digits:{
              						message:'Solo debe ingresar numeros'
              					},
                      			notEmpty: {
                          			message: 'Seguros de vida entre 0 y 5'
                             	},
                             	lessThan:{
                             		value:5,
                             		message:'Debe ingresar un numero entre 0 y 5'
                             	},
                             	greaterThan:{
                             		value:0,
                             		message: 'Debe ingresar un numero entre 0 y 5'
                             	},
                            }
              			},

              		cesantia: {
              				validators: {
              					digits:{
              						message:'Solo debe ingresar numeros'
              					},
                      			notEmpty: {
                          			message: 'Seguros de cesantia entre 0 y 5'
                             	},
                             	lessThan:{
                             		value:5,
                             		message:'Debe ingresar un numero entre 0 y 5'
                             	},
                             	greaterThan:{
                             		value:0,
                             		message: 'Debe ingresar un numero entre 0 y 5'
                             	},
                            }
              			},

              		trx: {
              				validators: {
              					digits:{
              						message:'Solo debe ingresar numeros'
              					},
                      			notEmpty: {
                          			message: 'Cantidad de trx entre 1 y 5'
                             	},
                             	lessThan:{
                             		value:5,
                             		message:'Debe ingresar un numero entre 1 y 5'
                             	},
                             	greaterThan:{
                             		value:1,
                             		message: 'Debe ingresar un numero entre 1 y 5'
                             	},
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