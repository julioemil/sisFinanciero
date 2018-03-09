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
?>
<br><br>
<center>  
<table id="cobranza" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
<th>N°</th>
<th>APELLIDOS Y NOMBRES</th>
<th>FECHA VENCIMIENTO</th>
<th>CAPITAL</th>
<th>TASA INTERES</th>
<th>DEUDA INICIAL</th>
<th>CUOTA</th>
<th>VEZ</th>
<th>SALDO ACTUAL</th>
<th>ACCION</th>
</tr>
</thead>
<tbody>
 <?php 
 if(!empty($arraycobranza)){
    foreach($arraycobranza as $cobranza){
        echo '<tr>';
        echo '<td>'.$cobranza->idPrestamo.'</td>';
        echo '<td>'.$cobranza->nombresC.' '.$cobranza->apellidosC.'</td>';
        echo '<td>'.$cobranza->fechaFinal.'</td>';
        echo '<td>'.$cobranza->capital.'</td>';
        echo '<td>'.$cobranza->tasaInteres.'</td>';
        echo '<td>'.$cobranza->deuda.'</td>';
        echo '<td>'.round($cobranza->cuota,2).'</td>';
        echo '<td>'.$cobranza->vez.'</td>';
        
?>
        <?php
        $sumapago=0;
        if($cobranza->vez==0){
        $arraypago=$this->model_cobranza->getPago($cobranza->idPrestamo);
        foreach($arraypago as $datos){ 
            $sumapago=$sumapago+ $datos->pago;          
        }
        }
        if($cobranza->vez==1){
        $arraypago=$this->model_cobranza->getPago1($cobranza->idPrestamo);
        foreach($arraypago as $datos){ 
            $sumapago=$sumapago+ $datos->pago;          
        }
        }
        if($cobranza->vez==2){
        $arraypago=$this->model_cobranza->getPago2($cobranza->idPrestamo);
        foreach($arraypago as $datos){ 
            $sumapago=$sumapago+ $datos->pago;          
        }
        }
        if($cobranza->vez==3){
        $arraypago=$this->model_cobranza->getPago3($cobranza->idPrestamo);
        foreach($arraypago as $datos){ 
            $sumapago=$sumapago+ $datos->pago;          
        }
        }
        $saldo=$cobranza->deuda-$sumapago;
        echo '<td>'.$saldo.'</td>'
         ?>
        <td>
            <a href="<?php echo base_url();?>index.php/cobranza/nuevo/<?php echo $cobranza->idPrestamo ?>" class="btn btn-info">P</a>
            <a href="<?php echo base_url();?>index.php/cobranza/listado/<?php echo $cobranza->idPrestamo ?>" class="btn btn-success">D</a>
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
