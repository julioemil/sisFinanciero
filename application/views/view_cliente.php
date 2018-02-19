<script type="text/javascript">
            /*CLIENTES*/
            $(document).ready(function() {
                $('#cliente').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
</script>
<div id="container">
	<h2 align="center">MÓDULO CLIENTE</h2>
<?php
if(isset($_GET['save']))
{
    echo '<div class="alert alert-success text-center">La Información  se Almaceno Correctamente</div>';
}

if(isset($_GET['delete']))
{
    echo '<div class="alert alert-warning text-center">La Información  se ha Eliminado Correctamente</div>';
}

if(isset($_GET['update']))
{
    echo '<div class="alert alert-success text-center">La Información  se Actualizo Correctamente</div>';
}


?>
<a href="<?php echo base_url();?>index.php/cliente/nuevo" class="btn btn-success">REGISTRAR NUEVO CLIENTE</a> 
<br><br>
<center>  
<table id="cliente" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
<th>NOMBRE</th>
<th>APELLIDOS</th>
<th>DNI</th>
<th>TELEFONO</th>
<th>DIRECCIÓN</th>
<th>DISTRITO</th>
<th>PROVINCIA</th>
<th>ESTADO</th>
<th>ACCION</th>
</tr>
</thead>
<tbody>
 <?php 
 if(!empty($arraycliente)){
 	foreach($arraycliente as $clientes){
 		echo '<tr>';
 		echo '<td>'.$clientes->nombres.'</td>';
		echo '<td>'.$clientes->apellidos.'</td>';
		echo '<td>'.$clientes->dni.'</td>';
		echo '<td>'.$clientes->telefono.'</td>';
                echo '<td>'.$clientes->direccion.'</td>';
                echo '<td>'.$clientes->distrito.'</td>';
                echo '<td>'.$clientes->provincia.'</td>';
                echo '<td>'.$clientes->estado.'</td>'
 ?> 
                <td>
                <a href="<?php echo base_url();?>index.php/cliente/eliminar/<?php echo $clientes->idCliente; ?>" class="btn btn-danger">Eliminar</a>
                <a href="<?php echo base_url();?>index.php/cliente/editar/<?php echo $clientes->idCliente;?>" class="btn btn-success">Editar</a>
                </td>
 <?php   
 		echo '</tr>';
 	} 
 }

 ?>
</tbody>
</table>
</center>
</div>
