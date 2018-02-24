        <br><br>        
<center>  
<table border="0" class="ventanas" cellspacing="0" cellpadding="0">
    <tr>
        <td><legend align="center"><h3>.:DETALLE REGISTRO EMPLEADO:.</h3></legend></td>
    </tr>
    <tr>        
    <td>    
<table  border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<?php  
if(!empty($usuarios)){
 	foreach($usuarios as $usuario){ ?>
<tr>
<th>OFICINA SEDE:</th>  
<td><?php echo $usuario->OFICINA;?></td>
<td colspan="4"></td>
</tr>
<tr>
    <td colspan=6><hr/></td>
</tr>
<tr>
<th>APELLIDOS:</th>
<td><?php echo $usuario->APELLIDOS;?></td>
<th>NOMBRES:</th>
<td><?php echo $usuario->NOMBRE;?></td>
<th>DNI:</th>
<td><?php echo $usuario->DNI;?></td>
</tr>
<tr>
    <td colspan="6"></td>
</tr>
<tr>
<th>TELEFONO:</th>
<td><?php echo $usuario->TELEFONO;?></td>
<th>CORREO:</th>
<td><?php echo $usuario->EMAIL;?></td>
<th>SEXO:</th>
<td><?php echo $usuario->SEXO;?></td>
</tr>
<tr>
    <td colspan="6"></td>
</tr>
<tr>
<th>FECHA NACIMIENTO:</th>
<td><?php echo $usuario->FECHA_NACIMIENTO;?></td>
<th>CARGO:</th>
<td><?php echo $usuario->TIPO;?></td>
<th>SUELDO:</th>
<td><?php echo $usuario->SUELDO;?></td>
</tr>
<tr>
    <td colspan="6"></td>
</tr>
<tr>
<th>FECHA DE REGISTRO:</th>
<td><?php echo $usuario->FECHA_REGISTRO;?></td>
<th>TIPO:</th>
<td><?php echo $usuario->ESTATUS;?></td>
<th>DIRECCIÓN:</th>
<td><?php echo $usuario->DIRECCION;?></td>
</tr>
<tr>
    <td colspan="6"></td>
</tr>
<tr>
<th>DEPARTAMENTO:</th>
<td><?php if($usuario->DEPARTAMENTO){
$departamento = $this->model_ciudad->getNombDepartamento($usuario->DEPARTAMENTO); foreach($departamento as $datos){ echo $datos->nomb_ciudad;}
}
?></td>
<th>PROVINCIA:</th>
<td><?php if($usuario->PROVINCIA){
$provincia = $this->model_ciudad->getNombProvincia($usuario->PROVINCIA); foreach($provincia as $datos){ echo $datos->nomb_provincia;}
}?>
</td>
<th>DISTRITO:</th>
<td><?php if($usuario->DISTRITO){
 $distrito=$this->model_ciudad->getNombDistrito($usuario->DISTRITO); foreach($distrito as $datos){ echo $datos->nomb_distrito;}
 }?>
</td>
</tr>
<tr>
    <td colspan=6><hr/></td>
</tr>
<tr>
    <td colspan="3" align="center">   
    <a href="<?php echo base_url(); ?>index.php/usuarios/excel/<?php echo $usuario->ID?>" class="btn btn-success">EXPORTAR EXCEL</a>
    </td> 
    <td colspan="3" align="center">   
    <a href="<?php echo base_url();?>index.php/usuarios" class="btn btn-info">VOLVER</a>
    </td> 
</tr> 
<?php }} ?>
</thead>
</table>
    </td>
    </tr>
</table>
</center>        

