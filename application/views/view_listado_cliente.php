        <br><br>        
<center>  
<table border="0" class="ventanas" cellspacing="0" cellpadding="0">
    <tr>
        <td><legend align="center"><h3>.:DETALLE REGISTRO CLIENTE:.</h3></legend></td>
    </tr>
    <tr>        
    <td>    
<table  border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<?php  
if(!empty($clientes)){
 	foreach($clientes as $cliente){ ?>
<tr>
<th>OFICINA AFILIACIÓN:</th>  
<td><?php echo $cliente->oficinaAfiliacion;?></td>
<td colspan="2"></td>
<th>EMPLEADO RESPONSABLE:</th>
<td><?php if($cliente->idUsuario){
$usuario = $this->model_usuarios->BuscarID($cliente->idUsuario); foreach($usuario as $datos){ echo $datos->APELLIDOS.' '.$datos->NOMBRE;}
}?></td>
</tr>
<tr>
    <td colspan=6><hr/></td>
</tr>
<tr>
<th>APELLIDOS:</th>
<td><?php echo $cliente->apellidos;?></td>
<th>NOMBRES:</th>
<td><?php echo $cliente->nombres;?></td>
<th>DNI:</th>
<td><?php echo $cliente->dni;?></td>
</tr>
<tr>
    <td colspan="6"></td>
</tr>
<tr>
<th>TELEFONO 1:</th>
<td><?php echo $cliente->telefono;?></td>
<th>TELEFONO 2:</th>
<td><?php echo $cliente->telefono2;?></td>
<th>CORREO:</th>
<td><?php echo $cliente->email;?></td>
</tr>
<tr>
    <td colspan="6"></td>
</tr>
<tr>
<th>SEXO:</th>
<td><?php echo $cliente->sexo;?></td>
<th>FECHA NACIMIENTO:</th>
<td><?php echo $cliente->fechaNacimiento;?></td>
<th>FECHA Y HORA  REGISTRO:</th>
<td><?php echo $cliente->fechaCreacion;?></td>
</tr>
<tr>
    <td colspan="6"></td>
</tr>
<tr>
    <th>ESTADO:</th>
    <td colspan="6"><?php echo $cliente->estado;?></td>
</tr>
<tr>
    <td colspan="6"><hr/></td>
</tr>
<tr>
    <td colspan="6"><h5>DATOS DE DIRECCIÓN DE DOMICILIO:</h5></td>
</tr>
<tr>
<th>DEPARTAMENTO:</th>
<td><?php echo $cliente->departamentoNegocio;?></td>
<th>PROVINCIA:</th>
<td><?php echo $cliente->provinciaNegocio;?></td>
<th>DISTRITO:</th>
<td><?php echo $cliente->distritoNegocio; ?></td>
</tr>
<tr>
    <td colspan="6"></td>
</tr>
<tr>
<th>DIRECCIÓN:</th>
<td colspan="6"><?php echo $cliente->direccionNegocio;?></td>
</tr>
<tr>
    <td colspan=6><hr/></td>
</tr>
<tr>
    <td colspan="6"><h5>DATOS DE DIRECCIÓN DE NEGOCIO:</h5></td>
</tr>
<tr>
<th>DEPARTAMENTO:</th>
<td><?php echo $cliente->departamento;?></td>
<th>PROVINCIA:</th>
<td><?php echo $cliente->provincia;?></td>
<th>DISTRITO:</th>
<td><?php echo $cliente->distrito; ?></td>
</tr>
<tr>
    <td colspan="6"></td>
</tr>
<tr>
<th>DIRECCIÓN:</th>
<td colspan="6"><?php echo $cliente->direccion;?></td>
</tr>
<tr>
    <td colspan="3" align="center">   
    <a href="<?php echo base_url(); ?>index.php/cliente/excel/<?php echo $cliente->idCliente?>" class="btn btn-success">EXPORTAR EXCEL</a>
    </td> 
    <td colspan="3" align="center">   
    <a href="<?php echo base_url();?>index.php/cliente" class="btn btn-info">VOLVER</a>
    </td> 
</tr> 
<?php }} ?>
</thead>
</table>
    </td>
    </tr>
</table>
</center> 
