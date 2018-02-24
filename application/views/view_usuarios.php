
<script type="text/javascript">
            /*CLIENTES*/
            $(document).ready(function() {
                $('#usuarios').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
</script>

<div id="container">
	<h2 align="center">MÓDULO EMPLEADO</h2>
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

if(isset($_GET['permisos']))
{
    echo '<div class="alert alert-success text-center">Los Permisos fueron Asignados Correctamente</div>';
}

if(isset($_GET['password']))
{
    echo '<div class="alert alert-success text-center">La Contraseña fue actualizado Correctamente</div>';                
}
?>
<a href="<?php echo base_url(); ?>index.php/usuarios/excels" class="btn btn-success">EXPORTAR REGISTRO</a>
<br><br>
<center>  
<table id="usuarios" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
    <tr>
        <td colspan="3">
            <a href="<?php echo base_url();?>index.php/usuarios/nuevo" class="btn btn-success">NUEVO REGISTRO</a>  
        </td>
    </tr>
<tr>  
<th>N°</th>    
<th>APELLIDOS</th>
<th>NOMBRES</th></th>
<th>DNI</th>
<th>TELEFONO</th>
<th>CORREO</th>
<th>CARGO</th>
<th>ESTADO</th>
<th>ACCION</th>
</tr>
</thead>
<tbody>
 <?php 
 if(!empty($usuarios)){
        $i=0;
 	foreach($usuarios as $usuario){
                $i++;
 		echo '<tr>';
                echo '<td>'.$i.'</td>';
?>
<?php		
		echo '<td>'.$usuario->APELLIDOS.'</td>';
                echo '<td>'.$usuario->NOMBRE.'</td>';
		echo '<td>'.$usuario->DNI.'</td>';
		echo '<td>'.$usuario->TELEFONO.'</td>';
                echo '<td>'.$usuario->EMAIL.'</td>';
		echo '<td>'.$usuario->TIPO.'</td>';
                echo '<td>'.$usuario->ESTATUS.'</td>';
                echo '<td>';
?>
                <a href="<?php echo base_url();?>index.php/usuarios/listado/<?php echo $usuario->ID;?>" class="btn btn-success">D</a>
                <a href="<?php echo base_url();?>index.php/usuarios/editar/<?php echo $usuario->ID;?>" class="btn btn-warning">E</a>
                <a href="<?php echo base_url();?>index.php/usuarios/eliminar/<?php echo $usuario->ID; ?>" class="btn btn-danger">X</a>
                <a href="<?php echo base_url();?>index.php/usuarios/permisos/<?php echo $usuario->ID;?>" class="btn btn-info">P</a>
		<a href="<?php echo base_url();?>index.php/usuarios/password/<?php echo $usuario->ID; ?>" class="btn btn-default">Password</a>
<?php              
		echo '</td>';
 		echo '</tr>';
 	} 
 }

 ?>
</tbody>
</table>
</center>
</div>