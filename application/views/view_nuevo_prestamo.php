<?php
                        // Creando los campos del formulario:
                        // Dibujando el campo producto

                        $js = 'id="producto"';



                        $producto = array(
                        '0'           => 'Seleccione Producto',                            
                        'diario'      => 'Diario',
                        'semanal'     => 'Semanal',
                        'mesCampana'  => 'Mes Campaña',
                        'mensual'     => 'Mensual',
                        );
                        // Dibujando el campo plazo
                        $plazo = array(
                        'name'        => 'plazo',
                        'id'          => 'plazo',
                        'size'        => 50,
                        'value'       => set_value('plazo',@$datos_prestamo[0]->PLAZO),
                        'type'        => 'text',
                        );
                        //Dibujando el campo fechaInicio
                        $fechaInicio       = array(
                        'name'        => 'fechaInicio',
                        'id'          => 'fechaInicio',
                        'size'        => 10, 
                        'value'	  => set_value('fechaInicio',$fechaInicio),
                        'type'        => 'date',
                        );
                        //Dibujando el campo fechaFinal
                        $fechaFinal = array(
                        'name'        => 'fechaFinal',
                        'id'          => 'fechaFinal',
                        'size'        => 10,
                        'value'	  => set_value('fechaFinal',@$datos_prestamo[0]->FECHA_FINAL),
                        'type'        => 'date',
                        );                       
                        // Dibujando el campo tasaInteres
                        $tasaInteres 		  = array(
                        'name'        => 'tasaInteres',
                        'id'          => 'tasaInteres',
                        'size'        => 100,
                        'value'	  => set_value('tasaInteres',@$datos_prestamo[0]->TASA_INTERES),
                        'placeholder' => 'Tasa de Interes',
                        'type'        => 'text',
                        );
                        //Dibujando el campo capital
                        $capital       = array(
                        'name'        => 'capital',
                        'id'          => 'capital',
                        'size'        => 8, 
                        'value'	  => set_value('capital',@$datos_prestamo[0]->CAPITAL),
                        'placeholder' => 'Capital',
                        'type'        => 'text',
                        );
                        
                        // Dibujando el campo deuda
                        $deuda       = array(
                        'name'        => 'deuda',
                        'id'          => 'deuda',
                        'size'        => 10,
                        'value'	  => set_value('deuda',@$datos_prestamo[0]->DEUDA),
                        'placeholder' => 'deuda',
                        'type'        => 'text',
                        );

                        // Dibujando el campo estado
                        $estado = array(
                        'NONE'   => 'Seleccione Estado',
                        '0'	 => 'Activo',
                        '1'      => 'Inactivo',
                        );

?>
<center>
        <table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">
            <tr>
                <td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'>.: REGISTRO PRESTAMO :.</legend></td>
            </tr>
            <tr>
                <td colspan=3>
                <?php $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
                      //echo form_open("clientes/Save", $attributes);
                        echo form_open("/prestamo/insertarDatos/");
                 ?> 
                    
            <table border=0>                                        
                    <tr>
                        <td><?php echo form_label("Producto(*)",'producto'); ?></td>
                        <td><?php echo form_dropdown('producto', $producto,set_value('producto',@$datos_prestamo[0]->producto),$js);?>
                        </td>
                        <td><font color="red"><?php echo form_error('producto');?></font></td>
                        <td><?php echo form_label("Plazo(*)",'plazo');?></td>
                        <td><?php echo form_input($plazo);?></td>
                        <td><font color="red"><?php echo form_error('plazo');?></font></td>
                    </tr>

                    <tr>
                        <td><?php echo form_label(" Fecha Inicio(*)",'fechaInicio');?></td>
                        <td><?php echo form_input($fechaInicio);?></td>
                        <td><font color="red"><?php echo form_error('fechaInicio'); ?></font></td>
                        <td><?php echo form_label("Fecha Final(*)",'fechaFinal');?></td>
                        <td><?php echo form_input($fechaFinal);?></td>
                        <td><font color="red"><?php echo form_error('fechaFinal'); ?></font></td>
                    </tr>
                    
                    <tr>
                        <td><?php echo form_label("Tasa Interes(*)",'tasaInteres');?>
                        <td><?php echo form_input($tasaInteres);?></td>
                        <td><font color="red"><?php echo form_error('tasaInteres'); ?></font></td>
                        <td><?php echo form_label("Capital",'capital');?></td>
                        <td><?php echo form_input($capital);?></td>
                        <td><font color="red"><?php echo form_error('capital'); ?></font></td>
                    </tr>
                    
                    <tr>
                        <td><?php echo form_label("Deuda(*)",'deuda');?>
                        <td><?php echo form_input($deuda);?></td>
                        <td><font color="red"><?php echo form_error('deuda'); ?></font></td>
                        
                        <td><label>Usuario</label></td>
                        <td>
                        
           <?php if($this->session->userdata('TIPOUSUARIO')=="Caja")
              {?>
                        <select name="idUsuario">
                             <option>Seleccione Usuario</option>
                        <?php foreach ($arrayusuarios as  $usuario) {
                        echo '<option value="'.$usuario->ID.'">'.$usuario->NOMBRE.'</option>';
                        }?>     
                        </select>
                        <?php
              }else 
               {?>
                        <select name="idUsuario">
                        <?php 
                        echo '<option value="'.$this->session->userdata('ID').'">'.$this->session->userdata('NOMBRE').'</option>';
                        ?>     
                        </select>
                        <?php      
                         }
                        ?>
                        </td>
                    </tr>

                    <tr>
                        <td><?php echo form_label("Estado(*)",'estado');?></td>
                        <td><?php echo  form_dropdown('estado', $estado, set_value('estado',@$datos_prestamo[0]->estado));?></td>
                        <td><font color="red"><?php echo form_error('estado');?></font></td>

                        <td><label>Cliente</label></td>
                        <td>    
                        <select name="idCliente">
                             <option>Seleccione Cliente</option>
                        <?php foreach ($arrayclientes as  $cliente) {
                        echo '<option value="'.$cliente->idCliente.'">'.$cliente->nombres.'</option>';
                        }?>
                        </select>     
                        
                        </td>
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
                        <a href="<?php echo base_url();?>index.php/prestamo" class="btn btn-danger">CANCELAR</a>
                        </center>
                        </td>
                    </tr>
                    
                    </table>
                <?php echo form_close();?> 
                <?php
			
                ?>
                </td>
            </tr>
        </table>
    </center>


<script type="text/javascript">



    $("#producto").change(function () {
        //alert("changes");
        if($("#producto").val()=='diario' || $("#producto").val()=='semanal'){
            $( "#plazo" ).prop("disabled", true);    
            $( "#plazo" ).val("1");
            var periodo = document.getElementById('plazo').value;
            $.ajax({
                data: {"periodo":periodo},
                url: 'http://localhost:8080/financiero/sistemafinanciero/index.php/prestamo/cadena',
                type: 'post',
                success: function(response,status){
                    //alert("Respueta: "+response+" Estado "+status);
                    $("#fechaFinal").val(response);
                }

            })
              
        }

        if($("#producto").val()=='mesCampana' || $("#producto").val()=='mensual'){
            $( "#plazo" ).prop("disabled", false);    
            $( "#plazo" ).val("");
        }
    });

   
    $("#capital").focusout(function(e) {
        /*if($("#capital").val()==''){
            alert("vacio");
        }*/
        if($("#capital").val()!='' &&  $("#tasaInteres").val()!=''){
            var tasaI = document.getElementById('tasaInteres').value;
            var capital = document.getElementById('capital').value;
            var deuda = parseFloat(capital*tasaI) + parseFloat(capital);
            document.getElementById("deuda").value = deuda;    
        }        
    });

    $("#tasaInteres").focusout(function(e) {
        if($("#capital").val()!='' &&  $("#tasaInteres").val()!=''){
            var tasaI = document.getElementById('tasaInteres').value;
            var capital = document.getElementById('capital').value;
            var deuda = parseFloat(capital*tasaI) + parseFloat(capital);
            document.getElementById("deuda").value = deuda;    
        }        
    });

</script>