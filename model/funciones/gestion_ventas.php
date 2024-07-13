<?php $fecha_actual=date('Y-m-d');

	if (isset($_POST['registrar'])){	
		
		$valor_total = $_POST['valor_total'];
		$cliente = $_POST['cliente'];

		if($cliente == ""){
			echo '<script>alert("Por favor seleccione el cliente");</script>';
			echo '<script>window.location="reg_venta.php"</script>';
		}elseif ($valor_total==0){
			echo '<script>alert("Para registrar debe añadir al menos un producto");</script>';
			echo '<script>window.location="reg_venta.php"</script>';
		}
		else	{

		$insertSQL = $con->prepare("INSERT INTO ventas(fecha, cliente)Value('$fecha_actual', $cliente)");
		$insertSQL->execute();		

		$sql= $con -> prepare ("SELECT * FROM ventas WHERE fecha='$fecha_actual' ANd valor_total=0 AND cliente = $cliente");
		$sql -> execute();
		$fila = $sql->fetch();

		$identificador = $fila['id_venta'];

		$insertSQL = $con->prepare("UPDATE detalle_venta SET id_venta=$identificador WHERE id_venta=0");
		$insertSQL->execute();		

		$insertSQL = $con->prepare("UPDATE ventas SET valor_total = $valor_total WHERE id_venta = $identificador");
		$insertSQL->execute();
		echo '<script>alert("Compra registrada exitosamente");</script>';
		echo '<script>window.location="reg_venta.php"</script>';
	}
	}

	
if (isset($_POST['eliminar'])){	
	
	$producto = $_POST['id_eliminado'];
	$cantidad_eliminada = $_POST['cantidad_eliminada'];

	$inventario= $con -> prepare ("SELECT * FROM productos WHERE id_producto=$producto");
	$inventario -> execute();
	$fila = $inventario->fetch();
	$disponible = $fila['cantidad'];

	$cant_actualizada=$disponible+$cantidad_eliminada;
	
	$actualizar_cant = $con->prepare("UPDATE productos SET cantidad=$cant_actualizada WHERE id_producto=$producto");
	$actualizar_cant->execute();

	$Eliminar = $con->prepare("DELETE FROM  detalle_venta WHERE id_producto=$producto");
	$Eliminar->execute();		
	echo '<script>alert("Se ha eliminado el producto");</script>';
	echo '<script>window.location="reg_venta.php"</script>';
}
if (isset($_POST['cancelar'])){	

	$con_paquetes = $con->prepare("SELECT * FROM detalle_venta Where detalle_venta.id_venta=0");
	$con_paquetes->execute();
	$paquetes = $con_paquetes->fetchAll(PDO::FETCH_ASSOC);
	
	foreach ($paquetes as $fila) { 
		$id_producto = $fila['id_producto'];
		$cantidad_eliminada = $fila['cantidad'];
		
		$inventario= $con -> prepare ("SELECT * FROM productos WHERE id_producto=$id_producto ");
		$inventario -> execute();
		$fila = $inventario->fetch();
		$disponible = $fila['cantidad'];

		
		$cant_actualizada=$disponible+$cantidad_eliminada;
		
		$actualizar_cant = $con->prepare("UPDATE productos SET cantidad=$cant_actualizada WHERE id_producto=$id_producto");
		$actualizar_cant->execute();
		
	}
	$Eliminar = $con->prepare("DELETE FROM  detalle_venta WHERE id_venta=''");
	$Eliminar->execute();
	echo '<script>alert("Compra cancelada");</script>';
	echo '<script>window.location="reg_venta.php"</script>';
}
//
if (isset($_POST['reg_producto'])){	
		
	$producto = $_POST['producto'];
	$cantidad = $_POST['cantidad'];
	
	$inventario= $con -> prepare ("SELECT * FROM productos WHERE id_producto=$producto");
	$inventario -> execute();
	$fila = $inventario->fetch();
	$disponible = $fila['cantidad'];
	$valor = $fila['valor'];

	if($producto == "" || $cantidad == ""){
		echo '<script>alert("Por favor complete todos los campos");</script>';
		echo '<script>window.location="reg_venta.php"</script>';
	}
	else if ($cantidad <= $disponible){
	
	$cant_actualizada=$disponible-$cantidad;
	
	$insertSQL = $con->prepare("UPDATE productos SET cantidad=$cant_actualizada WHERE id_producto=$producto");
	$insertSQL->execute();

	$valor_neto = $cantidad * $valor; 

	$insertSQL = $con->prepare("INSERT INTO detalle_venta(id_producto, cantidad, valor_neto)Values($producto, $cantidad, '$valor_neto')");
	$insertSQL->execute();		
	echo '<script>alert("Producto añadido exitosamente");</script>';
	echo '<script>window.location="reg_venta.php"</script>';
}else{
	echo '<script>alert("No contamos con esa cantidad de productos");</script>';
	echo '<script>window.location="reg_venta.php"</script>';
}
}
?>