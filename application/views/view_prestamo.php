<script type="text/javascript">
            /*prestamo*/
            $(document).ready(function() {
                $('#prestamos').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
</script>
<div id="container">
    <h2 align="center">MÓDULO PRESTAMO</h2>
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
<a href="<?php echo base_url();?>index.php/prestamo/nuevo" class="btn btn-success">REGISTRAR NUEVO PRESTAMO</a> 
<br><br>
<center>  
<table id="prestamos" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
<th>PRODUCTO</th>
<th>PLAZO</th>
<th>FECHA INICIO</th>
<th>FECHA FINAL</th>
<th>TASA INTERES</th>
<th>CAPITAL</th>
<th>DEUDA</th>
<th>USUARIO</th>
<th>ESTADO</th>
<th>CLIENTE</th>
<th>ACCION</th>
</tr>
</thead>
<tbody>
 <?php 
 if(!empty($arrayprestamos)){
    foreach($arrayprestamos as $prestamo){
        echo '<tr>';
        echo '<td>'.$prestamo->producto.'</td>';
        echo '<td>'.$prestamo->plazo.'</td>';
        echo '<td>'.$prestamo->fechaInicio.'</td>';
        echo '<td>'.$prestamo->fechaFinal.'</td>';
                echo '<td>% '.$prestamo->tasaInteres.'</td>';
                echo '<td>'.number_format($prestamo->capital,2).'</td>';
                echo '<td>'.number_format($prestamo->deuda,2).'</td>';
                echo '<td>'.$prestamo->nombreU.'</td>';
                if($prestamo->estado=='0'){
                    echo '<td>'.'Activo'.'</td>';
                }else{
                    echo '<td>'.'Inactivo'.'</td>';
                }
                echo '<td>'.$prestamo->nombreC.'</td>';?>
                <td>
                <a href="<?php echo base_url();?>index.php/prestamo/detalle/<?php echo $prestamo->idPrestamo; ?>" class="btn btn-success">Detalle</a>
                </td>
        <?php echo '</tr>';
    } 
 }
 ?>
</tbody>
</table>
</center>
</div>