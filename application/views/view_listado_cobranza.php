<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
<body>
<div id="container">
    <h2 align="center">DETALLE DE COBRANZA </h2>
<br><br>
  <table  border='0' cellpadding="0" cellspacing="0" class="pretty">
      <tbody>
         <?php if(!empty($arrayusuario)){
             foreach($arrayusuario as $usuario){?>
      <tr>
          <td><h6>EMPLEADO: <?php echo $usuario->APELLIDOS.', '.$usuario->NOMBRE;?></h6></td>
          <td><h6>CARGO: <?php echo $usuario->TIPO;?></h6></td>
          <td colspan="2"><h6>CELULAR:  <?php echo $usuario->TELEFONO;?></h6></td>
      </tr>
        <tr>
            <td><h6>CLIENTE:   <?php echo $usuario->apellidos.', '.$usuario->nombres;?></h6></td>
            <td><h6>DOCUMENTO DE IDENTIDAD:  <?php echo $usuario->dni;?></h6></td>
        </tr>
                
        <tr>
            <td><h6>CAPITAL  <?php echo $usuario->capital0;?></h6></td>
            <td><h6>TASA INTERES (%) :  <?php echo $usuario->tasaInteres0;?></h6></td>
            <td><h6>DEUDA: <?php echo round($usuario->capital0*(1+$usuario->tasaInteres0/100),2)?></h6></td>
        </tr>
        <tr>
            <td><h6>CAPITAL  <?php echo $usuario->capital;?></h6></td>
            <td><h6>TASA INTERES (%) :  <?php echo $usuario->tasaInteres;?></h6></td>
            <td><h6>DEUDA: <?php echo round($usuario->capital*(1+$usuario->tasaInteres/100),2);?></h6></td>
        </tr>
        <tr>
            <td><h6>CAPITAL  <?php echo $usuario->capital1;?></h6></td>
            <td><h6>TASA INTERES (%) :  <?php echo $usuario->tasaInteres1;?></h6></td>
            <td><h6>DEUDA: <?php echo round($usuario->capital1*(1+$usuario->tasaInteres1/100),2);?></h6></td>
        </tr>
        <tr>
            <td><h6>CAPITAL  <?php echo $usuario->capital2;?></h6></td>
            <td><h6>TASA INTERES (%) :  <?php echo $usuario->tasaInteres2;?></h6></td>
            <td><h6>DEUDA: <?php echo round($usuario->capital2*(1+$usuario->tasaInteres2/100),2)?></h6></td>
        </tr>
          <?php }}?>
        </tbody>
    </table>    

<?php  if(!empty($arraycobranza)){ 
    ?>
<center>     
<table id="cobranza" border="1" cellpadding="0" cellspacing="0" class="pretty">  
<thead>
<tr>
<th>N°</th>
<th>FECHA Y HORA DE PAGO</th>
<th>DEUDA</th>
<th>PAGO</th>
<th>SALDO</th>
</tr>
</thead>
<tbody>
 <?php
     $i=0;
    foreach($arraycobranza as $cobranza){
        $i++;
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        echo '<td>'.$cobranza->fechaCobranza.'</td>';
        echo '<td>'.$cobranza->deudaActual.'</td>';
        echo '<td>'.$cobranza->pago.'</td>';
        echo '<td>'.$cobranza->saldo.'</td>';
        echo '</tr>';
    } 
 ?>
</tbody>
</table>   
</center>
<?php 
    }
if(!empty($arraycobranza1)){
?> 
<center>     
<table id="cobranza" border="1" cellpadding="0" cellspacing="0" class="pretty">  
<thead>
    <tr>
        <td colspan="5"><h5>Reprogramación N° 01</h5></td>
    </tr>    
<tr>
<th>N°</th>
<th>FECHA Y HORA DE PAGO</th>
<th>DEUDA</th>
<th>PAGO</th>
<th>SALDO</th>
</tr>
</thead>
<tbody>
 <?php
     $i=0;
    foreach($arraycobranza1 as $cobranza){
        $i++;
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        echo '<td>'.$cobranza->fechaCobranza.'</td>';
        echo '<td>'.$cobranza->deudaActual.'</td>';
        echo '<td>'.$cobranza->pago.'</td>';
        echo '<td>'.$cobranza->saldo.'</td>';
        echo '</tr>';
    } 
 ?>
</tbody>
</table>   
</center>
<?php }
     if(!empty($arraycobranza2)){ ?>
<center>     
<table id="cobranza" border="1" cellpadding="0" cellspacing="0" class="pretty">  
<thead>
    <tr>
        <td colspan="5"><h5>Reprogramación N° 02</h5></td>
    </tr>
<tr>
<th>N°</th>
<th>FECHA Y HORA DE PAGO</th>
<th>DEUDA</th>
<th>PAGO</th>
<th>SALDO</th>
</tr>
</thead>
<tbody>
 <?php
     $i=0;
    foreach($arraycobranza2 as $cobranza){
        $i++;
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        echo '<td>'.$cobranza->fechaCobranza.'</td>';
        echo '<td>'.$cobranza->deudaActual.'</td>';
        echo '<td>'.$cobranza->pago.'</td>';
        echo '<td>'.$cobranza->saldo.'</td>';
        echo '</tr>';
    } 
 ?>
</tbody>
</table>   
</center>
<?php }
     if(!empty($arraycobranza3)){
?>
<center>     
<table id="cobranza" border="1" cellpadding="0" cellspacing="0" class="pretty">  
<thead>
    <tr>
        <td colspan="5"><h5>Reprogramación N° 03</h5></td>
    </tr>
<tr>
<th>N°</th>
<th>FECHA Y HORA DE PAGO</th>
<th>DEUDA</th>
<th>PAGO</th>
<th>SALDO</th>
</tr>
</thead>
<tbody>
 <?php 
     $i=0;
    foreach($arraycobranza3 as $cobranza){
        $i++;
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        echo '<td>'.$cobranza->fechaCobranza.'</td>';
        echo '<td>'.$cobranza->deudaActual.'</td>';
        echo '<td>'.$cobranza->pago.'</td>';
        echo '<td>'.$cobranza->saldo.'</td>';
        echo '</tr>';
    } 
 ?>
</tbody>
</table>   
</center>

     <?php }?>
</div>
    <br>
<center>
    <table class="pretty" cellpadding="0" cellspacing="0">
    <tr>
        <td></td>
        <td></td>
        <td></td>
       <td>
    <button class="btn-warning" onclick="printContent('container')">IMPRIMIR</button>
    </td>
    <td>
    <button class="btn btn-info" href="<?php echo base_url();?>index.php/cobranza">Volver</button>
    </td>
    </tr>
    </table>
</center>
</body>
