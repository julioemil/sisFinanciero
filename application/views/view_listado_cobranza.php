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
          <td><h6>CELULAR:  <?php echo $usuario->TELEFONO;?></h6></td>
          <td></td>
      </tr>
                
        <?php }}?>
        <?php if(!empty($arrayprestamo)){
          foreach($arrayprestamo as $prestamo){?>
        <tr>
            <td><h6>CLIENTE:   <?php echo $prestamo->apellidos.', '.$prestamo->nombres;?></h6></td>
            <td><h6>DOCUMENTO DE IDENTIDAD:  <?php echo $prestamo->dni;?></h6></td>
        </tr>
          <?php }}?>
        </tbody>
    </table>    

<?php  if(!empty($arraycobranza)){ ?>
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
        <td colspan="5"><h4>Reprogramación N° 01</h4></td>
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
        <td colspan="5"><h4>Reprogramación N° 02</h4></td>
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
        <td colspan="5"><h4>Reprogramación N° 03</h4></td>
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