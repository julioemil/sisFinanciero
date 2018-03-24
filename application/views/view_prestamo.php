<script type="text/javascript">
            /*prestamo*/
            $(document).ready(function() {
                $('#prestamos').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            });
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

if(isset($_GET['limitePrestamos']))
{
    echo '<div class="alert alert-success text-center">Se alcanzo el limite maximo de reprogramaciones.</div>';              
}
?>

<?php
    $fechaInicio = array(
    'name'        => 'fechaInicio',
    'id'          => 'fechaInicio',
    'size'        => 20,
    'value'       => set_value('fechaInicio',@$fechaInicio),
    'type'        => 'date',
    );
    $fechaFin = array(
    'name'        => 'fechaFin',
    'id'          => 'fechaFin',
    'size'        => 20,
    'value'       => set_value('fechaFin',@$fechaFin),
    'type'        => 'date',
    );
?>
<a href="<?php echo base_url();?>index.php/prestamo/nuevo" class="btn btn-success">REGISTRAR NUEVO PRESTAMO</a> 

<table border=0 class="ventanas" width="850" cellspacing="0" cellpadding="0">
    
    <tr>
        <td colspan=3>
        <?php $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
              //echo form_open("clientes/Save", $attributes);
                echo form_open("/prestamo");
         ?> 
            
            <table border=0>                                        
            <tr>
                <td><?php echo form_label("Fecha Inicio",'fechaInicio'); ?></td>
                <td><?php echo form_input($fechaInicio);?></td>
                <td><font color="red"><?php echo form_error('fechaInicio');?></font></td>

                <td><?php echo form_label("Fecha Fin",'fechaFin');?></td>
                <td><?php echo form_input($fechaFin);?></td>
                <td><font color="red"><?php echo form_error('fechaFin');?></font></td>

                <td><center> <input type="submit" class="btn btn-success" value="BUSCAR" name="buscar"></center></td>
                <td>
                <center>
                <a href="<?php echo base_url();?>index.php/prestamo" class="btn btn-danger">CANCELAR</a>
                </center>
                </td>
            </tr>            
            </table>
        <?php echo form_close();?> 
        </td>
    </tr>
</table>
<center>  
<table id="prestamos" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
<th>N°</th>
<th>CLIENTE</th>
<th>PRODUCTO</th>
<th>PLAZO</th>
<th>F. PRESTAMO</th>
<th>F. VENCIMIENTO</th>
<th>TASA INTERES</th>
<th>CAPITAL</th>
<th>DEUDA</th>
<th>USUARIO</th>
<th>ESTADO</th>
<th>ACCION</th>
</tr>
</thead>
<tbody>
 <?php 
 if(!empty($arrayprestamos)){
    foreach($arrayprestamos as $prestamo){
        echo '<tr>';
        echo '<td>'.$prestamo->idPrestamo.'</td>';
        echo '<td>'.$prestamo->nombreC.' '.$prestamo->apellidoC.'</td>';
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
        ?>
        <td>
        <!--GENERACION DE PLAN DE PAGO DIARIO FALTA-->
        

        <?php if($prestamo->producto=='diario' && $fechaActual>=$prestamo->fechaFinal){
            $datetime1 = new DateTime($fechaActual);
            $datetime2 = new DateTime($prestamo->fechaFinal);
            $interval = $datetime2->diff($datetime1);
            $dataPrestamo = $prestamo->idPrestamo;//."*".$fechaActual."*".$prestamo->fechaFinal."*".$interval->format('%a')."*".$prestamo->deuda."*".$prestamo->tasaInteres;
        ?>

        <a href="<?php echo base_url();?>index.php/prestamo/reprogramar/<?php echo $prestamo->idPrestamo; ?>" class="btn btn-info">R</a>
        <button role="button" class="btn btn-primary btn-prestamo" data-toggle="modal" data-target="#myModal2" value="<?php echo $dataPrestamo;?>">De.</button>
        <?php $dataPrestamo = 0;}?>

        <!--GENERACION DE PLAN DE PAGO DIARIO FALTA-->
        <?php if($prestamo->producto=='mensual'){ ?>
            <a href="<?php echo base_url();?>index.php/prestamo/detalle/<?php echo $prestamo->idPrestamo; ?>" class="btn btn-success">P</a>
        <?php }?>

        <?php if($prestamo->producto=='mensual' && $fechaActual >= $prestamo->fechaFinal){
            $datetime1 = new DateTime($fechaActual);
            $datetime2 = new DateTime($prestamo->fechaFinal);
            $interval = $datetime2->diff($datetime1);
            $dataPrestamo = $prestamo->idPrestamo;//."*".$fechaActual."*".$prestamo->fechaFinal."*".$interval->format('%a')."*".$prestamo->deuda."*".$prestamo->tasaInteres;
        ?>
        <a href="<?php echo base_url();?>index.php/prestamo/reprogramar/<?php echo $prestamo->idPrestamo; ?>" class="btn btn-info">R</a>
        <button role="button" class="btn btn-primary btn-prestamo" data-toggle="modal" data-target="#myModal2" value="<?php echo $dataPrestamo;?>">De.</button>
        <?php $dataPrestamo=0;} ?>
        </td>
        <?php echo '</tr>';
    } 
 }
 ?>
</tbody>
</table>
</center>
</div>
<div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Deuda Total</h3>
  </div>
  <div class="modal-body">
    
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <!--<button class="btn btn-primary">Save changes</button>-->
  </div>
</div>

<script>
    $(".btn-prestamo").on("click",function(){
        var idPrestamo = $(this).val();
            //alert(prestamo);
            $.ajax({
                data: {"idPrestamo":idPrestamo},
                url: 'http://localhost:8080/sisFinanciero/index.php/prestamo/obtenerDatosPrestamo',
                type: 'post',
                dataType: "json",
                success: function(response,status){
                    //alert("Respueta: "+response+" Estado "+status);

                    TEAC = Math.pow((1 + response['tasaInteres']/100),12) - 1;
                    TEDC = Math.pow((1 + TEAC),1/360) - 1;

                    TEAM = Math.pow((1 + response['tasaInteresMoratorio']/100),12) - 1;
                    TEDM = Math.pow((1 + TEAM),1/360) - 1;

                    deudaGeneral = parseFloat(response['capital']*Math.pow((1+TEDC),30)).toFixed(2);

                    deuda = deudaGeneral - response['sumaPagos'];

                    interes = parseFloat((response['tasaInteres']/100)/(1 + response['tasaInteres']/100)*deuda);
                    capital = parseFloat(deuda-interes);
                    
                    interesCompensatorio = parseFloat(capital*Math.pow((1+TEDC),response['diasVencidos'])-capital);
                    interesMoratorio = parseFloat(capital*Math.pow((1+TEDM),response['diasVencidos'])-capital);
                    deudaTotal = parseFloat(deuda + interesCompensatorio + interesMoratorio);

                    html = "<p><strong>Prestamo:</strong>"+response['idPrestamo']+"</p>"
                    html += "<p><strong>Fecha Actual:</strong>"+response['fechaActual']+"</p>"
                    html += "<p><strong>Fecha Vencimiento:</strong>"+response['fechaVencimiento']+"</p>"
                    html += "<p><strong>Dias Vencidos:</strong>"+response['diasVencidos']+"</p>"
                    html += "<p><strong>Deuda:</strong>"+deuda+"</p>"
                    html += "<p><strong>Tasa Interes Compensatorio:</strong>% "+response['tasaInteres']+"</p>"
                    html += "<p><strong>Tasa Interes Moratorio:</strong>% "+response['tasaInteresMoratorio']+"</p>"
                    html += "<p><strong>---------------------------</strong></p>"
                    html += "<p><strong>Interes:</strong>"+interes.toFixed(2)+"</p>"
                    html += "<p><strong>Capital:</strong>"+capital.toFixed(2)+"</p>"
                    html += "<p><strong>Interes Compensatorio:</strong>"+interesCompensatorio.toFixed(2)+"</p>"
                    html += "<p><strong>Interes Moratorio:</strong>"+interesMoratorio.toFixed(2)+"</p>"
                    html += "<p><strong>Deuda Total:</strong>"+deudaTotal.toFixed(2)+"</p>"

                    //html = "<p><strong>Deuda Total:</strong>"+response+"</p>"
                    
                    $("#myModal2 .modal-body").html(html);
                    //{"idPrestamo":"55","producto":"mensual","plazo":"6","deuda":"1297.92","tasaInteres":"8","nombreC":"Juan","apellidoC":"Basquez Miranda","fechaVencimiento":"2017-09-01","fechaActual":"2018-03-12","diasVencidos":"192"}
                }

            });
    });
</script>