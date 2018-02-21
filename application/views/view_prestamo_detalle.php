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
    <h2 align="center">PLAN DE PAGOS</h2>
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

<br><br>
<center>  
<table id="prestamos" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
<th>PERIODO</th>
<th>FECHA</th>
<th>SALDO CAPITAL</th>
<th>CAPITAL</th>
<th>INTERES</th>
<th>CUOTA</th>
</tr>
</thead>
<tbody>
 <?php 
 //echo var_dump($arrayprestamo);
//$prestamo = json_decode($arrayprestamo);

 /*$hoy = $hoyYear.'/'.$hoyMonth.'/'.$hoydate;
      $date = new DateTime($hoy);
      echo $date->format('Y-m-d');*/

 $cuota = $arrayprestamo->cuota;
 $saldoCapital = $arrayprestamo->capital;
 $fechaInicio = $arrayprestamo->fechaInicio;

 $fechaYear = date("Y", strtotime($fechaInicio));
 $fechaMonth = date("m", strtotime($fechaInicio));
 $fechaDate = date("d", strtotime($fechaInicio));

 $tem = $arrayprestamo->tasaInteres;
 $periodo = $arrayprestamo->plazo;
    echo '<tr>';
        echo '<td>'.'0'.'</td>';
        echo '<td>'.$fechaInicio.'</td>';
        echo '<td>'.number_format($saldoCapital,2).'</td>';
        echo '<td>'.'0'.'</td>';
        echo '<td>'.'0'.'</td>';
        echo '<td>'.'DESEMBOLSO'.'</td>';
                
    echo '</tr>';
$count = 0;
$totalCapital = 0;
$totalInteres = 0;
$totalCuota = 0;

 while($periodo>0){
    $count = $count + 1;

    $interes = +$tem/100*$saldoCapital;
    $capital = +$cuota - $interes;
    $saldoCapital = +$saldoCapital - $capital;

    $totalCapital = $totalCapital + $capital;
    $totalInteres = $totalInteres + $interes;
    $totalCuota = $totalCuota + $cuota;

    echo '<tr>';
        echo '<td>'.$count.'</td>';?>
        <td>
            <?php
            
            if($fechaMonth + 1 <= 12){
                $fechaMonth = ($fechaMonth + 1);
                $fecha = $fechaYear.'/'.$fechaMonth.'/'.$fechaDate;
                $date = new DateTime($fecha);
                echo $date->format('Y-m-d');    
            }else{
                $fechaMonth = 1;
                $fechaYear = $fechaYear +1;
                $fecha = $fechaYear.'/'.$fechaMonth.'/'.$fechaDate;
                $date = new DateTime($fecha);
                echo $date->format('Y-m-d');
            }
            
            ?>
        </td>
        <?php
        echo '<td>'.number_format($saldoCapital, 2).'</td>';
        echo '<td>'.number_format($capital,2).'</td>';
        echo '<td>'.number_format($interes,2).'</td>';
        echo '<td>'.number_format($cuota,2).'</td>';                
    echo '</tr>';
    $periodo = $periodo - 1;
 }

 ?>
</tbody>
<tfoot>
    <tr>
      <th colspan="3">Total</th>
      <th><?php echo number_format($totalCapital,2);?></th>
      <th><?php echo number_format($totalInteres,2);?></th>
      <th><?php echo number_format($totalCuota,2);?></th>
    </tr>
  </tfoot>
</table>
</center>
</div>