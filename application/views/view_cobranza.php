<script type="text/javascript">
            /*CLIENTES*/
            $(document).ready(function() {
                $('#cobranza').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
</script>

<div id="container">
    <h2 align="center">MÓDULO COBRANZA</h2>
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
<br><br>
<center>  
<table id="cobranza" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
<th>N°</th>
<th>APELLIDOS Y NOMBRES</th>
<th>CAPITAL</th>
<th>TASA INTERES</th>
<th>DEUDA INICIAL</th>
<th>SALDO ACTUAL</th>
<th>ACCION</th>
</tr>
</thead>
<tbody>
 <?php 
 if(!empty($arraycobranza)){
     $i=0;
    foreach($arraycobranza as $cobranza){
        $i++;
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        echo '<td>'.$cobranza->nombresC.' '.$cobranza->apellidosC.'</td>';
        echo '<td>'.$cobranza->capital.'</td>';
        echo '<td>'.$cobranza->tasaInteres.'</td>';
        echo '<td>'.$cobranza->deuda.'</td>';
?>
        <?php 
        $sumapago=0;
        $arraypago=$this->model_cobranza->getPago($cobranza->idPrestamo);
        foreach($arraypago as $datos){ 
            $sumapago=$sumapago+ $datos->pago;          
        }
        $saldo=$cobranza->deuda-$sumapago;
        echo '<td>'.$saldo.'</td>'
         ?>
        <td><a href="<?php echo base_url();?>index.php/cobranza/nuevo/<?php echo $cobranza->idPrestamo ?>" class="btn btn-success">Pago</a></td> 
<?php
        echo '</tr>';
    } 
 }
 ?>
</tbody>
</table>
</center>
</div>
