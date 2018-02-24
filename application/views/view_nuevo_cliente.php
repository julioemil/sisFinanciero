    <?php
                        // Dibujando el campo nombres
                        $nombres 	  = array(
                        'name'        => 'nombres',
                        'id'          => 'nombres',
                        'size'        => 50,
                        'value'       => set_value('nombres',@$datos_cliente[0]->nombres),
                        'placeholder' => 'Nombres',
                        'type'        => 'text',
                        );
                        // Dibujando el campo apellidos
                        $apellidos = array(
                        'name'        => 'apellidos',
                        'id'          => 'apellidos',
                        'size'        => 50,
                        'value'       => set_value('apellidos',@$datos_cliente[0]->apellidos),
                        'placeholder' => 'Apellidos',
                        'type'        => 'text',
                        );
                        //Dibujando el campo dni
                        $dni       = array(
                        'name'        => 'dni',
                        'id'          => 'dni',
                        'size'        => 8, 
                        'value'	  => set_value('dni',@$datos_cliente[0]->dni),
                        'placeholder' => 'DNI',
                        'type'        => 'text',
                        );
                        //Dibujando el campo fecha nacimiento
                        $fechaNacimiento = array(
                        'name'        => 'fechaNacimiento',
                        'id'          => 'fechaNaciemiento',
                        'size'        => 10,
                        'value'	  => set_value('fecha_egreso',@$datos_cliente[0]->fechaNacimiento),
                        'type'        => 'date',
                        );                       
                        // Dibujando el campo correo electronico
                        $email 		  = array(
                        'name'        => 'email',
                        'id'          => 'email',
                        'size'        => 100,
                        'value'	  => set_value('email',@$datos_cliente[0]->email),
                        'placeholder' => 'Email',
                        'type'        => 'text',
                        );
                        
                        // Dibujando el campo telefono
                        $telefono       = array(
                        'name'        => 'telefono',
                        'id'          => 'telefono',
                        'size'        => 10,
                        'value'	  => set_value('telefono',@$datos_cliente[0]->telefono),
                        'placeholder' => 'Telefono',
                        'type'        => 'text',
                        );
                        
                                                // Dibujando el campo telefono
                        $telefono2       = array(
                        'name'        => 'telefono2',
                        'id'          => 'telefono2',
                        'size'        => 10,
                        'value'	  => set_value('telefono2',@$datos_cliente[0]->telefono2),
                        'placeholder' => 'Telefono2',
                        'type'        => 'text',
                        );
                                     
                        // Dibujando el campo sexo
                        $opcionSexo = array(
                        '0'             => 'Seleccione Sexo',
                        'Masculino'     => 'Masculino',
                        'Femenino'	=> 'Femenino',
                        );
                        
                        //Dibujando el campo direccion
                        $direccion       = array(
                        'name'        => 'direccion',
                        'id'          => 'direccion',
                        'value'	  => set_value('direccion',@$datos_cliente[0]->direccion),
                        'placeholder' => 'Dirección',
                        'type'        => 'text',
                        );
                        $direccionNegocio       = array(
                        'name'        => 'direccionNegocio',
                        'id'          => 'direccionNegocio',
                        'value'	  => set_value('direccion',@$datos_cliente[0]->direccionNegocio),
                        'placeholder' => 'Dirección',
                        'type'        => 'text',
                        );

                        // Dibujando el campo estado
                        $opcionEstado = array(
                        '0'   => 'Seleccione Estado',
                        'Activo'	 => 'Activo',
                        'Inactivo'      => 'Inactivo',
                        );
                        // Dibujando el oficina Afiliación
                        $opcionOficina = array(
                        '0'                 => 'Seleccione Oficina',
                        'Talavera'     => 'Talavera',
                        'Andahuaylas'	=> 'Andahuaylas',
                        'San Jeronimo' =>'San Jeronimo',
                        'Uripa'       => 'Uripa',
                        );
     
    ?>
<html>
    <body>
                 <?php $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
                      //echo form_open("clientes/Save", $attributes);
                        echo form_open();
                 ?> 
    <center>
    <table align="center" border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">
                    <tr>
                       <td height='10' class='tabla_ventanas_login' height='10' colspan='9'><legend align='center'>.: REGISTRAR CLIENTE:.</legend></td>
                    </tr>
                    <tr>
                        <td><?php echo form_label("Apellidos(*)",'apellidos');?></td>
                        <td><?php echo form_input($apellidos);?></td>
                        <td><font color="red"><?php echo form_error('apellidos');?></font></td>
                        <td><?php echo form_label("Nombres(*)",'nombres'); ?></td>
                        <td> <?php  echo form_input($nombres); ?></td>
                        <td><font color="red"><?php echo form_error('nombres');?></font></td>
                        <td><?php echo form_label(" DNI(*)",'dni');?></td>
                        <td><?php echo form_input($dni);?></td>
                        <td><font color="red"><?php echo form_error('dni'); ?></font></td>
                    </tr>

                    <tr>
                        <td><?php echo form_label("Telefono(*)",'telefono');?></td>
                        <td><?php echo form_input($telefono);?></td>
                        <td><font color="red"><?php echo form_error('telefono'); ?></font></td>
                        <td><?php echo form_label("Telefono2",'telefono2');?></td>
                        <td><?php echo form_input($telefono2);?></td>
                        <td></td>
                    </tr>
                    
                    <tr>
                        <td><?php echo form_label("Email",'email');?>
                        <td><?php echo form_input($email);?></td>
                        <td></td>
                        <td><?php echo form_label("Fecha Nacimiento",'fechaNacimiento');?></td>
                        <td><?php echo form_input($fechaNacimiento);?></td>
                        <td><font color="red"><?php echo  form_error('fechaNacimiento');?></font></td>
                        <td><?php echo form_label("Sexo(*)",'sexo');?></td>
                        <td><?php echo  form_dropdown('sexo', $opcionSexo, set_value('sexo',@$datos_cliente[0]->sexo));?></td>
                        <td><font color="red"><?php echo  form_error('sexo');?></font></td>
                    </tr>
                    <tr>
                        <td><?php echo form_label("Estado(*)",'estado');?></td>
                        <td><?php echo  form_dropdown('estado', $opcionEstado, set_value('estado',@$datos_cliente[0]->estado));?></td>
                        <td><font color="red"><?php echo form_error('estado');?></font></td>
                        <td><?php echo form_label("Oficina(*)",'oficinaAfiliacion');?></td>
                        <td><?php echo  form_dropdown('oficinaAfiliacion', $opcionOficina, set_value('oficinaAfiliacion',@$datos_cliente[0]->oficinaAfiliacion));?></td>
                        <td><font color="red"><?php echo  form_error('oficinaAfiliacion');?></font></td>
                        <td><label> Empleado </label></td>
                        <td> <?php echo @$datos_cliente[0]->idUsuario;?>
                        <select name="idUsuario">
                            <option value="0">Seleccione Empleado</option>
                        <?php foreach ($arrayusuarios as  $usuario) {
                            if($usuario->ID==@$datos_cliente[0]->idUsuario){
                        echo '<option selected  value="'.$usuario->ID.'">'.$usuario->NOMBRE.' '.$usuario->APELLIDOS.'</option>';
                        }else{
                           echo '<option value="'.$usuario->ID.'">'.$usuario->NOMBRE.' '.$usuario->APELLIDOS.'</option>'; 
                        }}
                        
                        ?>     
                        </select> 
                        </td>
                        <td><font color="red"><?php echo  form_error('idUsuario');?></font></td>
                    </tr>
                     <tr>
                        <td colspan=9><hr/></td>
                    </tr>     
                     <tr>
                         <td colspan=9><h5>DATOS DE  DIRECCIÓN DE DOMICILIO:</h5></td>
                    </tr>   
                    <tr>
                        <td><label>Departamento(*)</label></td>
                        <td>
                           <select id="idDepartamento" name="departamento"> 
                           <option value="0">Seleccione Departamento</option>
                           <?php foreach ($datos_departamento as $datos) {
                                 if($datos->id_ciudad==@$datos_cliente[0]->departamento){
                                  echo '<option selected value="'.$datos->id_ciudad.'">'.$datos->nomb_ciudad.'</option>';
                            } else{
                                  echo '<option value="'.$datos->id_ciudad.'">'.$datos->nomb_ciudad.'</option>';
                            }
                            }
                             ?>
                       </select>  
                       </td>
                       <td><font color="red"><?php echo form_error('departamento'); ?></font></td>
                        <td><label>Provincia(*)</label></td>
                        <td> 
                          <select id="idProvincia" name="provincia">
                              <?php if($datos_cliente[0]->provincia){ ?>
                              <option value="<?php echo @$datos_cliente[0]->provincia?>"><?php $provincia = $this->model_ciudad->getNombProvincia($datos_cliente[0]->provincia); foreach($provincia as $datos){ echo $datos->nomb_provincia;}?></option>
                              <?php } else {?>
                              <option value="0">Seleccione Provincia</option>
                              <?php }?>
                          </select>
                        </td>  
                        <td><font color="red"><?php echo form_error('provincia'); ?></font></td>
                        <td><center><label>Distrito(*)</label></center></td>
                        <td> 
                          <select id="idDistrito" name="distrito">
                          <?php if($datos_cliente[0]->distrito){ ?>
                          <option value="<?php echo $datos_cliente[0]->distrito?>"><?php $distrito=$this->model_ciudad->getNombDistrito($datos_cliente[0]->distrito); foreach($distrito as $datos){ echo $datos->nomb_distrito;}?></option>
                          <?php } else {?>
                          <option value="0">Seleccione Distrito</option>
                          <?php }?>
                          </select>
                        </td>
                        <td><font color="red"><?php echo form_error('distrito'); ?></font></td>
                    </tr>
                    <tr>
                        <td><?php echo form_label("Dirección(*)",'direccion');?></td>
                        <td><?php echo form_input($direccion);?></td>
                        <td><font color="red"><?php echo form_error('direccion'); ?></font></td>
                    </tr>
                    <tr>
                        <td colspan=9><hr/></td>
                    </tr>     
                     <tr>
                         <td colspan=9><h5>DATOS DE  DIRECCIÓN DE NEGOCIO:</h5></td>
                    </tr>
                    <tr>
                        <td><label>Departamento(*)</label></td>
                        <td>
                           <select id="idDepartamentoNegocio" name="departamentoNegocio"> 
                           <option value="0">Seleccione Departamento</option>
                           <?php foreach ($datos_departamento as $datos) {
                                 if($datos->id_ciudad==@$datos_cliente[0]->departamentoNegocio){
                                  echo '<option selected value="'.$datos->id_ciudad.'">'.$datos->nomb_ciudad.'</option>';
                            } else{
                                  echo '<option value="'.$datos->id_ciudad.'">'.$datos->nomb_ciudad.'</option>';
                            }
                            }
                             ?>
                       </select>  
                       </td>
                       <td><font color="red"><?php echo form_error('departamentoNegocio'); ?></font></td>
                        <td><label>Provincia(*)</label></td>
                        <td> 
                          <select id="idProvinciaNegocio" name="provinciaNegocio">
                              <?php if($datos_cliente[0]->provinciaNegocio){ ?>
                              <option value="<?php echo @$datos_cliente[0]->provinciaNegocio?>"><?php $provincia = $this->model_ciudad->getNombProvincia($datos_cliente[0]->provinciaNegocio); foreach($provincia as $datos){ echo $datos->nomb_provincia;}?></option>
                              <?php } else {?>
                              <option value="0">Seleccione Provincia</option>
                              <?php }?>
                          </select>
                        </td>  
                        <td><font color="red"><?php echo form_error('provinciaNegocio'); ?></font></td>
                        <td><center><label>Distrito(*)</label></center></td>
                        <td> 
                          <select id="idDistritoNegocio" name="distritoNegocio">
                          <?php if($datos_cliente[0]->distritoNegocio){ ?>
                          <option value="<?php echo $datos_cliente[0]->distritoNegocio?>"><?php $distrito=$this->model_ciudad->getNombDistrito($datos_cliente[0]->distritoNegocio); foreach($distrito as $datos){ echo $datos->nomb_distrito;}?></option>
                          <?php } else {?>
                          <option value="0">Seleccione Distrito</option>
                          <?php }?>
                          </select>
                        </td>
                        <td><font color="red"><?php echo form_error('distritoNegocio'); ?></font></td>
                    </tr>
                    <tr>
                        <td><?php echo form_label("Dirección",'direccionNegocio');?></td>
                        <td><?php echo form_input($direccionNegocio);?></td>
                        <td><font color="red"><?php echo form_error('direccionNegocio'); ?></font></td>
                    </tr>
                         
                    <tr>
                        <td colspan=9><?php echo $this->session->flashdata('msg');?></td>
                    </tr>
                    
                    <tr>
                        <td colspan=9><hr/></td>
                    </tr>
  
                    <tr>
                     <td colspan=5><center> <input type="submit" class="btn btn-success" value="GRABAR"></center></td>
                    <td colspan=4><a href="<?php echo base_url();?>index.php/cliente" class="btn btn-danger">CANCELAR</a></td>
                    </tr>
    </table>
    </center>
    <?php echo form_close()?>
</body>
</html>
        <script type="text/javascript">   
            $(document).ready(function() {                       
                $("#idDepartamento").change(function() {
                    $("#idDepartamento option:selected").each(function() {
                        idDepartamento = $('#idDepartamento').val();
                        $.post("<?php echo base_url(); ?>index.php/cliente/consultaProvincia", {
                            idDepartamento : idDepartamento
                        }, function(data) {
                            $("#idProvincia").html(data);
                        });
                    });
                });
            });
            
                $(document).ready(function() {                       
                $("#idProvincia").change(function() {
                    $("#idProvincia option:selected").each(function() {
                        idProvincia = $('#idProvincia').val();
                        $.post("<?php echo base_url(); ?>index.php/cliente/consultaDistrito", {
                            idProvincia : idProvincia
                        }, function(data) {
                            $("#idDistrito").html(data);
                        });
                    });
                });
            });
            
            $(document).ready(function() {                       
                $("#idDepartamentoNegocio").change(function() {
                    $("#idDepartamentoNegocio option:selected").each(function() {
                        idDepartamentoNegocio = $('#idDepartamentoNegocio').val();
                        $.post("<?php echo base_url(); ?>index.php/cliente/consultaProvinciaNegocio", {
                            idDepartamentoNegocio : idDepartamentoNegocio
                        }, function(data) {
                            $("#idProvinciaNegocio").html(data);
                        });
                    });
                });
            });
            
                $(document).ready(function() {                       
                $("#idProvinciaNegocio").change(function() {
                    $("#idProvinciaNegocio option:selected").each(function() {
                        idProvinciaNegocio = $('#idProvinciaNegocio').val();
                        $.post("<?php echo base_url(); ?>index.php/cliente/consultaDistritoNegocio", {
                            idProvinciaNegocio : idProvinciaNegocio
                        }, function(data) {
                            $("#idDistritoNegocio").html(data);
                        });
                    });
                });
            });
        </script>