<h2 align="center">MÓDULO REPORTE</h2>
<ul class="nav nav-tabs">
    <li class="active"><a href="#"><h5>Reporte Prestamos Pagados</h5></a></li>
  
  <li><a href="<?php echo base_url();?>index.php/reporte/prestamoPendiente">Reporte Prestamos Realizados</a></li>	
</ul>
 <div id="container">
	<table  border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>   
<tr>
<th>N°</th>
<th>CLIENTE</th>
<th>DISTRITO</th>
<th>DIRECCIÓN</th>
<th>EMPLEADO</th>
<th>FECHA COBRANZA</th>
<th>SALDO</th>
</tr>
</thead>
<tbody>
<?php
 if(!empty($arraycobranza)){
    foreach($arraycobranza as $cobranza){
        echo '<tr>';
        echo '<td>'.$cobranza->idPrestamo.'</td>';
        echo '<td>'.$cobranza->apellidos.', '.$cobranza->nombres.'</td>';
        $distrito=$this->model_ciudad->getNombDistrito($cobranza->distrito);
        foreach($distrito as $datos){ 
        echo '<td>'.$datos->nomb_distrito.'</td>';
        }
        echo '<td>'.$cobranza->direccion.'</td>';
        echo '<td>'.$cobranza->APELLIDOS.', '.$cobranza->NOMBRE.'</td>';
        echo '<td>'.$cobranza->fechaCobranza.'</td>';
        echo '<td>'.$cobranza->saldo.'</td>';
 }}
 ?>
</tbody>
</table>
</center>
 </div>
        
        