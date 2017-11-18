<?php
	require 'conection1.php';
try{
	$sql = 'INSERT INTO cliente(rut,nombre,telefono)
	VALUE(:rut,:nombre,:telefono)';
	$result= $conn->prepare($sql);
	$result->bindParam(':rut',$_POST['rut']);
	$result->bindParam(':nombre',$_POST['fullname']);
	$result->bindParam(':telefono',$_POST['telefono']);
	$result->execute();


	$sql= 'INSERT INTO venta(fecha,campana,supervisor,user_neotel,monto,user_as400,s_vida,s_cesantia,trx,id_cliente)
	VALUE(:fecha,:campana,:supervisor,:user_neotel,:monto,:user_as400,:s_vida,:s_cesantia,:trx,:id_cliente)';
	$result= $conn->prepare($sql);
	$result->bindParam(':fecha',$_POST['fecha']);
	$result->bindParam(':campana',$_POST['campana']);
	$result->bindParam(':supervisor',$_POST['supervisor']);
	$result->bindParam(':user_neotel',$_POST['neotel']);
	$result->bindParam(':monto',$_POST['monto']);
	$result->bindParam(':user_as400',$_POST['roble']);
	$result->bindParam(':s_vida',$_POST['vida']);
	$result->bindParam(':s_cesantia',$_POST['cesantia']);
	$result->bindParam(':trx',$_POST['trx']);
	$result->bindParam(':id_cliente',$_POST['rut']);
	$result->execute();

	<a
}catch (PDOException $e) {

echo $e->getMessage();;
} 

?>