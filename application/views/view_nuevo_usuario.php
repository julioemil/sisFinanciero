<?php
                        // Creando los campos del formulario:
                        // Dibujando el campo nombre
                        $nombre 	  = array(
                        'name'        => 'nombre',
                        'id'          => 'nombre',
                        'size'        => 50,
                        'value'       => set_value('nombre',@$datos_usuarios[0]->NOMBRE),
                        'placeholder' => 'Nombres',
                        'type'        => 'text',
                        );
                        
                        // Dibujando el campo apellidos
                        $apellidos = array(
                        'name'        => 'apellidos',
                        'id'          => 'apellidos',
                        'size'        => 50,
                        'value'       => set_value('apellidos',@$datos_usuarios[0]->APELLIDOS),
                        'placeholder' => 'Apellidos',
                        'type'        => 'text',
                        );
                        
                        //Dibujando el campo dni
                        $dni       = array(
                        'name'        => 'dni',
                        'id'          => 'dni',
                        'value'	  => set_value('dni',@$datos_usuarios[0]->DNI),
                        'placeholder' => 'DNI',
                        'type'        => 'integer',
                        );
                        
                        //Dibujando el campo fecha nacimiento
                        $fechaNacimiento = array(
                        'name'        => 'fecha_nacimiento',
                        'id'          => 'fecha_nacimiento',
                        'size'        => 10,
                        'value'	  => set_value('fecha_nacimiento',@$datos_usuarios[0]->FECHA_NACIMIENTO),
                        'type'        => 'date',
                        );    
                        
                        // Dibujando el campo correo electronico
                        $email 		  = array(
                        'name'        => 'email',
                        'id'          => 'email',
                        'size'        => 100,
                        'value'	  => set_value('email',@$datos_usuarios[0]->EMAIL),
                        'placeholder' => 'Email',
                        'type'        => 'text',
                        );
                        
                        //Dibujando el campo direccion
                        $direccion       = array(
                        'name'        => 'direccion',
                        'id'          => 'direccion',
                        'size'        => 8, 
                        'value'	  => set_value('direccion',@$datos_usuarios[0]->DIRECCION),
                        'placeholder' => 'Dirección',
                        'type'        => 'text',
                        );
                        
                        // Dibujando el campo telefono
                        $telefono       = array(
                        'name'        => 'telefono',
                        'id'          => 'telefono',
                        'size'        => 10,
                        'value'	  => set_value('telefono',@$datos_usuarios[0]->TELEFONO),
                        'placeholder' => 'Telefono',
                        'type'        => 'text',
                        );

                        // Dibujando el campo sexo
                        $campoOpcionesSexo = array(
                        '0'             => 'Seleccione Sexo',
                        'Masculino'     => 'Masculino',
                        'Femenino'	=> 'Femenino',
                        );
                        
                        // Dibujando el campo tipo de usuario
                        $campoOpcionesTipo = array(
                        '0'                 => 'Seleccione Responsabilidad',
                        'Administrador'     => 'Administrador',
                        'Ejecutivo de Negocio'	    => 'Ejecutivo de Negocio',
                        'Caja'=>'Caja',    
                        );

                        // Dibujando el campo estado
                        $estatus = array(
                        '0'   => 'Seleccione Estado',
                        'Activo'	 => 'Activo',
                        'Inactivo'      => 'Inactivo',
                        );
                        
                        // Dibujando el campo sueldo
                        $sueldo = array(
                        'name'        => 'sueldo',
                        'id'          => 'sueldo',
                        'size'        => 100,
                        'value'	  => set_value('sueldo', number_format(@$datos_usuarios[0]->SUELDO, 2, '.', '')),
                        'placeholder' => 'Sueldo',
                        'type'        => 'decimal',
                        );
                        
                        // Dibujando el oficina Afiliación
                        $campoOpcionesOficina = array(
                        '0'                 => 'Seleccione Oficina',
                        'Talavera'     => 'Talavera',
                        'Andahuaylas'	=> 'Andahuaylas',
                        'Uripa'       => 'Uripa',
                        'Abancay' =>'Abancay',
                        'Cusco' =>'Cusco',
                        );

?>
<center>
        <table border=0 class="ventanas" width="1000" cellspacing="0" cellpadding="0">
            <tr>
                <td  class='tabla_ventanas_login' height='10' colspan='6'><legend align='center'>.: REGISTRO EMPLEADO :.</legend></td>
            </tr>
            <tr>
                <td colspan=6>
                <?php $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
                      //echo form_open("clientes/Save", $attributes);
                        echo form_open();
                 ?> 
                    
            <table border=0>                                        
                    <tr>
                        <td><?php echo form_label("Apellidos(*)",'apellidos');?></td>
                        <td><?php echo form_input($apellidos);?></td>
                        <td><font color="red"><?php echo form_error('apellidos');?></font></td>
                        <td><?php echo form_label("Nombres(*)",'nombre'); ?></td>
                        <td> <?php  echo form_input($nombre); ?></td>
                        <td><font color="red"><?php echo form_error('nombre');?></font></td>
                    </tr>
                    <tr>
                        <td><?php echo form_label(" DNI(*)",'dni');?></td>
                        <td><?php echo form_input($dni);?></td>
                        <td><font color="red"><?php echo form_error('dni'); ?></font></td>
                        <td><?php echo form_label("Telefono(*)",'telefono');?></td>
                        <td><?php echo form_input($telefono);?></td>
                        <td><font color="red"><?php echo form_error('telefono'); ?></font></td>
                    </tr>
                    <tr>
                        <td><?php echo form_label("Sexo(*)",'sexo');?></td>
                        <td><?php echo  form_dropdown('sexo', $campoOpcionesSexo, set_value('sexo',@$datos_usuarios[0]->SEXO));?></td>
                        <td><font color="red"><?php echo  form_error('sexo');?></font></td>
                        <td><?php echo form_label("Fecha Nacimiento(*)",'fecha_nacimiento');?></td>
                        <td><?php echo form_input($fechaNacimiento);?></td>
                        <td><font color="red"><?php echo  form_error('fecha_nacimiento');?></font></td>
                    </tr>
                    <tr>
                        <td><?php echo form_label("Email(*)",'email');?>
                        <td><?php echo form_input($email);?></td>
                        <td><font color="red"><?php echo form_error('email'); ?></font></td>
                        <td><?php echo form_label("Dirección(*)",'direccion');?></td>
                        <td><?php echo form_input($direccion);?></td>
                        <td><font color="red"><?php echo form_error('direccion'); ?></font></td>
                    </tr>
                    <tr>
                        <td><label>Departamento(*)</label></td>
                        <td>
                           <select id="idDepartamento" name="DEPARTAMENTO"> 
                           <option value="0">Seleccione Departamento</option>
                           <?php foreach ($datos_departamento as $datos) {
                                 if($datos->id_ciudad==@$datos_usuarios[0]->DEPARTAMENTO){
                                  echo '<option selected value="'.$datos->id_ciudad.'">'.$datos->nomb_ciudad.'</option>';
                            } else{
                                  echo '<option value="'.$datos->id_ciudad.'">'.$datos->nomb_ciudad.'</option>';
                            }
                            }
                             ?>
                       </select>  
                       </td>
                       <td><font color="red"><?php echo form_error('DEPARTAMENTO'); ?></font></td>
                        <td><label>Provincia(*)</label></td>
                        <td> 
                          <select id="idProvincia" name="PROVINCIA">
                              <?php if($datos_usuarios[0]->PROVINCIA){ ?>
                              <option value="<?php echo @$datos_usuarios[0]->PROVINCIA?>"><?php $provincia = $this->model_ciudad->getNombProvincia($datos_usuarios[0]->PROVINCIA); foreach($provincia as $datos){ echo $datos->nomb_provincia;}?></option>
                              <?php } else {?>
                              <option value="0">Seleccione Provincia</option>
                              <?php }?>
                          </select>
                        </td>  
                        <td><font color="red"><?php echo form_error('PROVINCIA'); ?></font></td>
                        <td><center><label>Distrito(*)</label></center></td>
                        <td> 
                          <select id="idDistrito" name="DISTRITO">
                          <?php if($datos_usuarios[0]->DISTRITO){ ?>
                          <option value="<?php echo $datos_usuarios[0]->DISTRITO?>"><?php $distrito=$this->model_ciudad->getNombDistrito($datos_usuarios[0]->DISTRITO); foreach($distrito as $datos){ echo $datos->nomb_distrito;}?></option>
                          <?php } else {?>
                          <option value="0">Seleccione Distrito</option>
                          <?php }?>
                          </select>
                        </td>
                        <td><font color="red"><?php echo form_error('DISTRITO'); ?></font></td>
                    </tr>           
                    <tr>
                        <td><?php echo form_label("Responsabilidad(*)",'tipo');?></td>
                        <td><?php echo  form_dropdown('tipo', $campoOpcionesTipo, set_value('tipo',@$datos_usuarios[0]->TIPO));?></td>
                        <td><font color="red"><?php echo  form_error('tipo');?></font></td>
                        <td><?php echo form_label("Sueldo(*)",'sueldo');?></td>
                        <td><?php echo form_input($sueldo);?></td>
                        <td><font color="red"><?php echo form_error('sueldo'); ?></font></td>
                    </tr>
                    <tr>
                        <td><?php echo form_label("Estado(*)",'estatus');?></td>
                        <td><?php echo  form_dropdown('estatus', $estatus, set_value('estatus',@$datos_usuarios[0]->ESTATUS));?></td>
                        <td><font color="red"><?php echo form_error('estatus');?></font></td>
                        <td><?php echo form_label("Oficina(*)",'oficina');?></td>
                        <td><?php echo  form_dropdown('oficina', $campoOpcionesOficina, set_value('oficina',@$datos_usuarios[0]->OFICINA));?></td>
                        <td><font color="red"><?php echo  form_error('oficina');?></font></td>
                    </tr>
                    <tr>
                        <td colspan=6><?php echo $this->session->flashdata('msg');?></td>
                    </tr>
                    
                    <tr>
                        <td colspan=9><hr/></td>
                    </tr>
                    
                    <tr>
                        <td colspan=4><center> <input type="submit" class="btn btn-success" value="GRABAR"></center></td>
                        <td colspan=4>
                        <center>
                        <a href="<?php echo base_url();?>index.php/usuarios" class="btn btn-danger">CANCELAR</a>
                        </center>
                        </td>
                    </tr>
                    </table>
                <?php echo form_close();?> 
                </td>
            </tr>
        </table>
    </center>

        <script type="text/javascript">   
            $(document).ready(function() {                       
                $("#idDepartamento").change(function() {
                    $("#idDepartamento option:selected").each(function() {
                        idDepartamento = $('#idDepartamento').val();
                        $.post("<?php echo base_url(); ?>index.php/usuarios/consultaProvincia", {
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
                        $.post("<?php echo base_url(); ?>index.php/usuarios/consultaDistrito", {
                            idProvincia : idProvincia
                        }, function(data) {
                            $("#idDistrito").html(data);
                        });
                    });
                });
            });
        </script>