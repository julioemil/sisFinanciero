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
                        'size'        => 8, 
                        'value'	  => set_value('direccion',@$datos_cliente[0]->direccion),
                        'placeholder' => 'Dirección',
                        'type'        => 'text',
                        );
                        // Dibujando el campo departamento
                        $opcionDepartamento = array(
                        '0'   => 'Seleccione Departamento',
                        'Apurímac'	 => 'Apurímac',
                        'Otro'      => 'Otro',    
                        );
                        // Dibujando el campo provincia
                        $opcionProvincia = array(
                        '0'   => 'Seleccione Provincia',
                        'Andahuaylas'	 => 'Andahuaylas',
                        'Abancay'      => 'Abancay',
                        'Chincheros'      => 'Chincheros',
                        'Otro'      => 'Otro',    
                        );

                        // Dibujando el campo distrito
                        $opcionDistrito = array(
                        '0'   => 'Seleccione Distrito',
                        'Andahuaylas'	 => 'Andahuaylas',
                        'Andarapa'      => 'Andarapa',
                        'Chiara'      => 'Chiara',
                        'Huancaray'      => 'Huancaray',
                        'Huancarama'      => 'Huancarama',
                        'Huayana'      => 'Huayana',
                        'José María Arguedas'      => 'José María Arguedas',
                        'Kaquiabamba'      => 'Kaquiabamba',
                        'Kishuara'      => 'Kishuara',
                        'Pacobamba'     => 'Pacobamba',
                        'Pacucha'      => 'Pacucha',
                        'Pomacocha'      => 'Pomacocha',
                        'Pampachiri'      => 'Pampachiri',
                        'San Antonio de Cachi' => 'San Antonio de Cachi',
                        'San Jerónimo'  => 'San Jerónimo',
                        'San Miguel de Chaccrapampa' => 'San Miguel de Chaccrapampa',
                        'Santa María de Chicmo'  => 'Santa María de Chicmo',
                        'Talavera' => 'Talavera',
                        'Tumay Huaraca' => 'Tumay Huaraca',
                        'Turpo'   => 'Turpo',
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
                        <td><?php echo form_label("Nombres(*)",'nombres'); ?></td>
                        <td> <?php  echo form_input($nombres); ?></td>
                        <td><font color="red"><?php echo form_error('nombres');?></font></td>
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
                        <td><?php echo form_label("Email(*)",'email');?>
                        <td><?php echo form_input($email);?></td>
                        <td><font color="red"><?php echo form_error('email'); ?></font></td>
                        <td><?php echo form_label("Fecha Nacimiento",'fechaNacimiento');?></td>
                        <td><?php echo form_input($fechaNacimiento);?></td>
                    </tr>
                    
                    <tr>
                        <td><?php echo form_label("Sexo(*)",'sexo');?></td>
                        <td><?php echo  form_dropdown('sexo', $opcionSexo, set_value('sexo',@$datos_cliente[0]->sexo));?></td>
                        <td><font color="red"><?php echo  form_error('sexo');?></font></td>
                        <td><?php echo form_label("Dirección",'direccion');?></td>
                        <td><?php echo form_input($direccion);?></td>
                    </tr>
                    
                    <tr>
                        <td><?php echo form_label("Departamento(*)",'departamento');?></td>
                        <td><?php echo  form_dropdown('departamento', $opcionDepartamento, set_value('departamento',@$datos_cliente[0]->departamento));?></td>
                        <td><font color="red"><?php echo  form_error('departamento');?></font></td>
                        <td><?php echo form_label("Provincia(*)",'provincia');?></td>
                        <td><?php echo  form_dropdown('provincia', $opcionProvincia, set_value('provincia',@$datos_cliente[0]->provincia));?></td>
                        <td><font color="red"><?php echo  form_error('provincia');?></font></td>
                        <td><?php echo form_label("Distrito(*)",'distrito');?></td>
                        <td><?php echo  form_dropdown('distrito', $opcionDistrito, set_value('distrito',@$datos_cliente[0]->distrito));?></td>
                        <td><font color="red"><?php echo  form_error('distrito');?></font></td>
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
                             <option>Seleccione Empleado</option>
                        <?php foreach ($arrayusuarios as  $usuario) {
                        echo '<option value="'.$usuario->ID.'">'.$usuario->NOMBRE.' '.$usuario->APELLIDOS.'</option>';
                        }?>     
                        </select> 
                        </td>
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
