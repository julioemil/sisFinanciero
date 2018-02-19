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
                        'size'        => 8, 
                        'value'	  => set_value('dni',@$datos_usuarios[0]->DNI),
                        'placeholder' => 'DNI',
                        'type'        => 'text',
                        );
                        //Dibujando el campo fecha nacimiento
                        $fechaEgreso = array(
                        'name'        => 'fecha_egreso',
                        'id'          => 'fecha_egreso',
                        'size'        => 10,
                        'value'	  => set_value('fecha_egreso',@$datos_usuarios[0]->FECHA_EGRESO),
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
                        'NONE'             => 'Seleccione Sexo',
                        '0'     => 'Masculino',
                        '1'	=> 'Femenino',
                        );
                        
                        // Dibujando el campo tipo de usuario
                        $campoOpcionesTipo = array(
                        '0'                 => 'Seleccione Tipo Empleado',
                        'Administrador'     => 'Administrador',
                        'Ejecutivo de Negocio'	    => 'Ejecutivo de Negocio',
                        'Caja'=>'Caja',    
                        );

                        // Dibujando el campo estado
                        $estatus = array(
                        'NONE'   => 'Seleccione Estado',
                        '0'	 => 'Activo',
                        '1'      => 'Inactivo',
                        );
                        // Dibujando el oficina Afiliación
                        $campoOpcionesOficina = array(
                        '0'                 => 'Seleccione Oficina',
                        'Talavera'     => 'Talavera',
                        'Andahuaylas'	=> 'Andahuaylas',
                        'San Jeronimo' =>'San Jeronimo',
                        'Uripa'       => 'Uripa',
                        );

?>
<center>
        <table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">
            <tr>
                <td height='10' class='tabla_ventanas_login' height='10' colspan='6'><legend align='center'>.: REGISTRO EMPLEADO :.</legend></td>
            </tr>
            <tr>
                <td colspan=6>
                <?php $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
                      //echo form_open("clientes/Save", $attributes);
                        echo form_open();
                 ?> 
                    
            <table border=0>                                        
                    <tr>
                        <td><?php echo form_label("Nombres(*)",'nombre'); ?></td>
                        <td> <?php  echo form_input($nombre); ?></td>
                        <td><font color="red"><?php echo form_error('nombre');?></font></td>
                        <td><?php echo form_label("Apellidos(*)",'apellidos');?></td>
                        <td><?php echo form_input($apellidos);?></td>
                        <td><font color="red"><?php echo form_error('apellidos');?></font></td>
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
                        <td><?php echo form_label("Fecha Nacimiento",'fecha_egreso');?></td>
                        <td><?php echo form_input($fechaEgreso);?></td>
                    </tr>
                    <tr>
                        <td><?php echo form_label("Email(*)",'email');?>
                        <td><?php echo form_input($email);?></td>
                        <td><font color="red"><?php echo form_error('email'); ?></font></td>
                        <td><?php echo form_label("Dirección",'direccion');?></td>
                        <td><?php echo form_input($direccion);?></td>
                    </tr>

                    <tr>
                        <td><label>Departamento</label></td>
                        <td>
                        <?php if(@$datos_usuarios[0]->DEPARTAMENTO==null){?>
                        <select id="idDepartamento" name="DEPARTAMENTO">
                        <option value="0">Seleccione Departamento</option>
                        <?php 
                             foreach ($datos_departamento as $datos) {
                              echo '<option value="'.$datos->id_ciudad.'">'.$datos->nomb_ciudad.'</option>';
                            }?>
                          </select>   
                        <?php }else{?>
                           <select id="idDepartamento" name="DEPARTAMENTO"> 
                           <?php foreach ($datos_departamento as $datos) {
                               if($datos->id_ciudad==@$datos_usuarios[0]->DEPARTAMENTO){
                                  echo '<option selected value="'.$datos->id_ciudad.'">'.$datos->nomb_ciudad.'</option>';
                            } else{
                            echo '<option value="'.$datos->id_ciudad.'">'.$datos->nomb_ciudad.'</option>';
                            }
                        }
                        }
                        ?>
                       </select>
                       
                        </td>
                        <td><label>Provincia</label></td>
                        <td> 
                          <select id="idProvincia" name="PROVINCIA">
                          <option value="0">Seleccione Provincia</option>
                          </select>
                        </td>  
                        <td><label>Distrito</label></td>
                        <td> 
                          <select id="idDistrito" name="DISTRITO">
                          <option value="0">Seleccione Distrito</option>
                          </select>
                        </td> 
                    </tr>
                                        
                    <tr>
                        <td><?php echo form_label("Tipo(*)",'tipo');?></td>
                        <td><?php echo  form_dropdown('tipo', $campoOpcionesTipo, set_value('tipo',@$datos_usuarios[0]->TIPO));?></td>
                        <td><font color="red"><?php echo  form_error('tipo');?></font></td>
                        <td><?php echo form_label("Estado(*)",'estatus');?></td>
                        <td><?php echo  form_dropdown('estatus', $estatus, set_value('estatus',@$datos_usuarios[0]->ESTATUS));?></td>
                        <td><font color="red"><?php echo form_error('estatus');?></font></td>
                    </tr>
                    <tr>
                        <td><?php echo form_label("Oficina(*)",'oficina');?></td>
                        <td><?php echo  form_dropdown('oficina', $campoOpcionesOficina, set_value('oficina',@$datos_usuarios[0]->OFICINA));?></td>
                        <td><font color="red"><?php echo  form_error('oficina');?></font></td>
                    </tr>
                    <tr>
                        <td colspan=6><?php echo $this->session->flashdata('msg');?></td>
                    </tr>
                    
                    <tr>
                        <td colspan=6><hr/></td>
                    </tr>
                    
                    <tr>
                        <td colspan=3><center> <input type="submit" class="btn btn-success" value="GRABAR"></center></td>
                        <td colspan=3>
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