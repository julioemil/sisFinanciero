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
            <td><h6>FECHA PRESTAMO: <?php echo $prestamo->fechaInicio;?></h6></td>
            <td><h6>FECHA VENCIMIENTO: <?php echo $prestamo->fechaFinal;?></h6></td>
        </tr>
        <tr>
            <td><h6>CAPITAL (S/.):   <?php echo $prestamo->capital;?></h6></td>
            <td><h6>INTERES:   <?php echo $prestamo->tasaInteres;?></h6></td>
            <td><h6>DEUDA INICIAL (S/.):   <?php echo $prestamo->deuda;?></h6></td>
            <td></td>
        </tr>
          <?php }}?>
        </tbody>
    </table>    
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
     if(!empty($arraycobranza)){ 
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
     }
 ?>
</tbody>
</table>   
</center>
</div>