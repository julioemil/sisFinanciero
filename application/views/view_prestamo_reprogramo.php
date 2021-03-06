<?php
                        // Creando los campos del formulario:
                        // Dibujando el campo producto
                        
                        // Dibujando el campo plazo
                        $idPrestamo = array(
                        'name'        => 'idPrestamo',
                        'id'          => 'idPrestamo',
                        'size'        => 50,
                        'value'       => set_value('cliente',@$arrayprestamo['idPrestamo']),
                        'placeholder' => 'idPrestamo',
                        'readonly'    => 'true',
                        'type'        => 'hidden',
                        );

                        // Dibujando el campo plazo
                        $cliente = array(
                        'name'        => 'cliente',
                        'id'          => 'cliente',
                        'size'        => 50,
                        'value'       => set_value('cliente',@$arrayprestamo['nombreC']." ".@$arrayprestamo['apellidoC']),
                        'placeholder' => 'Cliente',
                        'readonly'    => 'true',
                        'type'        => 'text',
                        );

                        $js = 'id="producto" name="producto"';

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
                        'value'       => set_value('plazo',@$arrayprestamo['plazo']),
                        'placeholder' => 'Plazo',
                        'readonly'    => 'true',
                        'type'        => 'text',
                        );
                        //Dibujando el campo fechaInicio
                        $fechaInicio       = array(
                        'name'        => 'fechaInicio',
                        'id'          => 'fechaInicio',
                        'size'        => 10, 
                        'value'	      => set_value('fechaInicio',@$arrayprestamo['hoy']),
                        'readonly'    => 'true',  
                        'type'        => 'date',
                        );
                        //Dibujando el campo fechaFinal
                        $fechaFinal = array(
                        'name'        => 'fechaFinal',
                        'id'          => 'fechaFinal',
                        'size'        => 10,
                        'value'	  => set_value('fechaFinal',@$datos_prestamo[0]->FECHA_FINAL),
                        'readonly'    => 'true',
                        'type'        => 'date',
                        );                       
                        // Dibujando el campo tasaInteres
                        $tasaInteres 		  = array(
                        'name'        => 'tasaInteres',
                        'id'          => 'tasaInteres',
                        'size'        => 100,
                        'value'	  => set_value('tasaInteres',@$arrayprestamo['tasaInteres']),
                        'placeholder' => 'Tasa de Interes',
                        'readonly'    => 'true',
                        'type'        => 'text',
                        );
                        //Dibujando el campo la deuda capitalizada
                        $capital       = array(
                        'name'        => 'capital',
                        'id'          => 'capital',
                        'size'        => 8, 
                        'value'	  => set_value('capital',@$arrayprestamo['deuda']),
                        'placeholder' => 'Capital',
                        'readonly'    => 'true',  
                        'type'        => 'text',
                        );
                        
                        // Dibujando el campo deuda
                        $deuda       = array(
                        'name'        => 'deuda',
                        'id'          => 'deuda',
                        'size'        => 10,
                        'value'	  => set_value('deuda',@$datos_prestamo[0]->DEUDA),
                        'placeholder' => 'deuda',
                        'readonly'    => 'true',
                        'type'        => 'text',
                        );

                        // Dibujando el campo deuda
                        $cuota       = array(
                        'name'        => 'cuota',
                        'id'          => 'cuota',
                        'size'        => 10,
                        'value'   => set_value('cuota',@$datos_prestamo[0]->CUOTA),
                        'placeholder' => 'cuota',
                        'readonly'    => 'true',
                        'type'        => 'text',
                        );

?>
<center>
        <table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">
            <tr>
                <td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'>.: REPROGRAMACION DE PRESTAMO :.</legend></td>
            </tr>
            <tr>
                <td colspan=3>
                <?php $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
                      //echo form_open("clientes/Save", $attributes);
                        echo form_open("/prestamo/insertarReprograma/");
                 ?> 
                    
            <table border=0>                                        
                    <tr>
                        <td><?php echo form_label("Cliente",'cliente');?></td>
                        <td ><?php echo form_input($cliente);?></td>
                        <td><font color="red"><?php echo form_error('cliente');?></font></td>

                        <td ><?php echo form_input($idPrestamo);?></td>
                    </tr>

                    <tr>
                        <td><?php echo form_label("Producto(*)",'producto'); ?></td>
                        <td><?php echo form_dropdown('producto', $producto,@$arrayprestamo['producto'],$js);?>
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
                        <td><?php echo form_label("Tasa Interes(*) %",'tasaInteres');?></td>
                        <td><?php echo form_input($tasaInteres);?></td>
                        <td><font color="red"><?php echo form_error('tasaInteres'); ?></font></td>
                        <td><?php echo form_label("Capital S/.",'capital');?></td>
                        <td><?php echo form_input($capital);?></td>
                        <td><font color="red"><?php echo form_error('capital'); ?></font></td>
                    </tr>
                    
                    <tr>
                        <td><?php echo form_label("Deuda(*) S/. ",'deuda');?></td>
                        <td><?php echo form_input($deuda);?></td>
                        <td><font color="red"><?php echo form_error('deuda'); ?></font></td>

                        <td><?php echo form_label("Cuota(*) S/. ",'cuota');?></td>
                        <td><?php echo form_input($cuota);?></td>
                        <td><font color="red"><?php echo form_error('cuota'); ?></font></td>
                        
                    </tr>
                    <tr>
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
                        echo '<option value="'.$this->session->userdata('ID').'">'.$this->session->userdata('NOMBRE').' '.$this->session->userdata('APELLIDOS').'</option>';
                        ?>     
                        </select>
                        <?php      
                         }
                        ?>
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

    $(document).ready(function(){
        if($("#producto").val()=='diario'){
            var periodo = document.getElementById('plazo').value;
            $.ajax({
                data: {"periodo":periodo},
                url: 'http://localhost:8080/sisFinanciero/index.php/prestamo/sumarDias',
                type: 'post',
                success: function(response,status){
                    //alert("Respueta: "+response+" Estado "+status);
                    $("#fechaFinal").val(response);
                }
            });    
            calcularValores();
        }
        if($("#producto").val()=='mensual'){
            var periodo = document.getElementById('plazo').value;
            $.ajax({
                data: {"periodo":periodo},
                url: 'http://localhost:8080/sisFinanciero/index.php/prestamo/cadena',
                type: 'post',
                success: function(response,status){
                    //alert("Respueta: "+response+" Estado "+status);
                    //console.log(response);
                    $("#fechaFinal").val(response);
                }
            });    
            calcularValores();
        }

    });




    $("#producto").change(function () {
        
        if($("#producto").val()=='diario' || $("#producto").val()=='semanal'){
            $( "#plazo" ).prop("readonly", true);    
            $( "#plazo" ).val("1");
            var periodo = document.getElementById('plazo').value;
            $.ajax({
                data: {"periodo":periodo},
                url: 'http://localhost:8080/sisFinanciero/index.php/prestamo/cadena',
                type: 'post',
                success: function(response,status){
                    //alert("Respueta: "+response+" Estado "+status);
                    $("#fechaFinal").val(response);
                }

            });              
        }

        if($("#producto").val()=='mesCampana' || $("#producto").val()=='mensual'){
            $( "#plazo" ).prop("readonly", false);    
            $( "#plazo" ).val("");
            $( "#cuota" ).val("");
            $( "#deuda" ).val("");
        }

        if($("#capital").val()!='' &&  $("#tasaInteres").val()!='' && $("#plazo").val()!=''){
            calcularValores();
        }
    });

    $("#plazo").focusout(function(e) {
        if($("#producto").val()=='mesCampana' || $("#producto").val()=='mensual'){
            var periodo = document.getElementById('plazo').value;
            $.ajax({
                data: {"periodo":periodo},
                url: 'http://localhost:8080/sisFinanciero/index.php/prestamo/cadena',
                type: 'post',
                success: function(response,status){
                    //alert("Respueta: "+response+" Estado "+status);
                    $("#fechaFinal").val(response);
                }

            });    
        }
        if($("#capital").val()!='' &&  $("#tasaInteres").val()!='' && $("#plazo").val()!=''){
            calcularValores();
        }
    });
   
    $("#capital").focusout(function(e) {
        if($("#capital").val()!='' &&  $("#tasaInteres").val()!='' && $("#plazo").val()!=''){
            calcularValores();
        }        
    });

    $("#tasaInteres").focusout(function(e) {
        if($("#capital").val()!='' &&  $("#tasaInteres").val()!='' && $("#plazo").val()!=''){
            calcularValores();
        }        
    });

    function calcularValores(){
        if($("#producto").val()=='diario'){
                var tasaI = document.getElementById('tasaInteres').value;
                var capital = document.getElementById('capital').value;
                var deuda = parseFloat(capital*(1+tasaI/100)).toFixed(2);
                var cuota = parseFloat(deuda/27).toFixed(2);
                document.getElementById("deuda").value = deuda;
                document.getElementById("cuota").value = cuota;
                document.getElementById("capital").value = parseFloat(capital).toFixed(2);
            }
            if($("#producto").val()=='semanal'){
                var tasaI = document.getElementById('tasaInteres').value;
                var capital = document.getElementById('capital').value;
                var deuda = parseFloat(capital*(1+tasaI/100)).toFixed(2);
                var cuota = parseFloat(deuda/4).toFixed(2);
                document.getElementById("deuda").value = deuda;
                document.getElementById("cuota").value = cuota;
            }
            if($("#producto").val()=='mesCampana'){
                var tasaI = document.getElementById('tasaInteres').value;
                var capital = document.getElementById('capital').value;
                var periodo = document.getElementById('plazo').value;
                var deuda = parseFloat(capital*Math.pow((1 + tasaI/100), periodo)).toFixed(2);
                var cuota = parseFloat(deuda/1).toFixed(2);
                document.getElementById("deuda").value = deuda;
                document.getElementById("cuota").value = cuota;
            }

            if($("#producto").val()=='mensual'){
                var tasaI = document.getElementById('tasaInteres').value;
                var capital = document.getElementById('capital').value;
                var periodo = document.getElementById('plazo').value;
                var cuotaBruto = parseFloat(capital*(Math.pow((1 + tasaI/100), periodo) * tasaI/100)/(Math.pow((1 + tasaI/100), periodo) -1));
                var cuota = cuotaBruto.toFixed(2)
                var deuda = parseFloat(cuotaBruto*periodo).toFixed(2);
                document.getElementById("deuda").value = deuda;
                document.getElementById("cuota").value = cuota;
            }
    }

</script>