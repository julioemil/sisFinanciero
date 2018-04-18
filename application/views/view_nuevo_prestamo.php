<?php
                        // Creando los campos del formulario:
                        // Dibujando el campo producto

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
                        'value'       => set_value('plazo',@$datos_prestamo[0]->PLAZO),
                        'placeholder' => 'Plazo',
                        'type'        => 'text',
                        );
                        //Dibujando el campo fechaInicio
                        $fechaInicio       = array(
                        'name'        => 'fechaInicio',
                        'id'          => 'fechaInicio',
                        'size'        => 10, 
                        'value'	      => set_value('fechaInicio',@$hoy),
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
                        //Dibujando el campo fechaPagoPrimeraCuota
                        $fechaPagoPC = array(
                        'name'        => 'fechaPagoPC',
                        'id'          => 'fechaPagoPC',
                        'size'        => 10,
                        'value'   => set_value('fechaPagoPC',@$datos_prestamo[0]->FECHA_PAGOPC),
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
                        // Dibujando el campo tasaMoratorio
                        $tasaInteresMoratorio          = array(
                        'name'        => 'tasaInteresMoratorio',
                        'id'          => 'tasaInteresMoratorio',
                        'size'        => 100,
                        'value'   => set_value('tasaInteresMoratorio',@$datos_prestamo[0]->TASA_INTERES_MORATORIO),
                        'placeholder' => 'Tasa de Interes Moratorio',
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

                        // Dibujando el campo cliente
                        $idCliente       = array(
                        'name'        => 'idCliente',
                        'id'          => 'idCliente',
                        'size'        => 10,
                        'type'        => 'hidden',
                        );

                        $vez       = array(
                        'name'        => 'vez',
                        'id'          => 'vez',
                        'size'        => 10,
                        'type'        => 'hidden',
                        );

                        // Dibujando el campo estado
                        $estado = array(
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
                        <td><?php echo form_label("Plazo(Meses*)",'plazo');?></td>
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
                        <td><?php echo form_label("F. Cuota1",'fechaPagoPC');?></td>
                        <td><?php echo form_input($fechaPagoPC);?></td>
                        <td><font color="red"><?php echo form_error('fechaPagoPC'); ?></font></td>
                    </tr>
                    
                    <tr>
                        <td><?php echo form_label("Tasa Interes(*) %",'tasaInteres');?></td>
                        <td><?php echo form_input($tasaInteres);?></td>
                        <td><font color="red"><?php echo form_error('tasaInteres'); ?></font></td>

                        <td><?php echo form_label("Interes Moratorio(*) %",'tasaInteresMoratorio');?></td>
                        <td><?php echo form_input($tasaInteresMoratorio);?></td>
                        <td><font color="red"><?php echo form_error('tasaInteresMoratorio'); ?></font></td>
                    </tr>
                    
                    <tr>
                        <td><?php echo form_label("Capital S/.",'capital');?></td>
                        <td><?php echo form_input($capital);?></td>
                        <td><font color="red"><?php echo form_error('capital'); ?></font></td>

                        <td><?php echo form_label("Deuda(*) S/. ",'deuda');?></td>
                        <td><?php echo form_input($deuda);?></td>
                        <td><font color="red"><?php echo form_error('deuda'); ?></font></td>
                    </tr>
                    <tr>
                        <td><?php echo form_label("Cuota(*) S/. ",'cuota');?></td>
                        <td><?php echo form_input($cuota);?></td>
                        <td><font color="red"><?php echo form_error('cuota'); ?></font></td>
                        <?php echo form_input($vez);?>

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
                        <td><?php echo form_label("Estado(*)",'estado');?></td>
                        <td><?php echo  form_dropdown('estado', $estado, set_value('estado',@$datos_prestamo[0]->estado));?></td>
                        <td><font color="red"><?php echo form_error('estado');?></font></td>

                        <td><label>Cliente</label></td>
                        <td>
                                                
                                <?php echo form_input($idCliente);?>
                                <div class="input-append">
                                <input class="span2" id="cliente" type="text">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#myModal2"><i class="icon-search"></i> Buscar</a>
                                </div>

                        <!--<select name="idCliente">
                             <option>Seleccione Cliente</option>
                        <?php /*foreach ($arrayclientes as  $cliente) {
                        echo '<option value="'.$cliente->idCliente.'">'.$cliente->nombres.' '.$cliente->apellidos.'</option>';
                        }*/?>
                        </select>-->
                        
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
<div id="myModal2" class="modal hide fade" tabindex="2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Lista de Clientes</h3>
  </div>
  <div class="modal-body">
        <table id="clientePrestamo" border="0" cellpadding="0" cellspacing="0" class="pretty">
            <thead>
            <tr>
            <th>N°</th>
            <th>NOMBRE</th>
            <th>APELLIDOS</th>
            <th>DNI</th>
            <th>TELEFONO</th>
            <th>DIRECCIÓN</th>
            <th>ACCION</th>
            </tr>
            </thead>
            <tbody>
             <?php 
             if(!empty($arrayclientes)){
                    $i=0;
                foreach($arrayclientes as $clientes){
                            $i++;
                    echo '<tr>';
                    echo '<td>'.$i.'</td>';
                    echo '<td>'.$clientes->nombres.'</td>';
                    echo '<td>'.$clientes->apellidos.'</td>';
                    echo '<td>'.$clientes->dni.'</td>';
                    echo '<td>'.$clientes->telefono.'</td>';
                    echo '<td>'.$clientes->direccion.'</td>';
                    $dataCliente = $clientes->idCliente."*".$clientes->nombres."*".$clientes->apellidos."*".$clientes->dni."*".$clientes->telefono."*".$clientes->direccion;
             ?> 
                    <td>
                    <button type="button" class="btn btn-success btn-check" value="<?php echo $dataCliente; ?>"><i class="icon-check"></i></button>
                    </td>
             <?php   
                    echo '</tr>';
                } 
             }

             ?>
            </tbody>
            </table>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {
        $('#clientePrestamo').dataTable( {
            // sDom: hace un espacio entre la tabla y los controles 
        "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",

        } );
    });

    $(document).on("click", ".btn-check", function(){
        cliente = $(this).val();
        infocliente = cliente.split("*");
        $("#idCliente").val(infocliente[0]);
        $("#cliente").val(infocliente[1]+" "+infocliente[2]);
        $("#myModal2").modal("hide");
    });


    $("#producto").change(function () {
        
        if($("#producto").val()=='diario' || $("#producto").val()=='semanal'){
            $( "#plazo" ).prop("readonly", true);    
            $( "#plazo" ).val("1");
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
                url: 'http://localhost:8080/sisFinanciero/index.php/prestamo/sumarDiasMes',
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

    $("#fechaPagoPC").focusout(function(e) {
        if($("#producto").val()=='mesCampana' || $("#producto").val()=='mensual'){
                
        var periodo = document.getElementById('plazo').value;
        var fechaPagoPC = document.getElementById('fechaPagoPC').value;
            $.ajax({
                data: {"periodo":periodo, "fechaPagoPC":fechaPagoPC},
                url: 'http://localhost:8080/sisFinanciero/index.php/prestamo/sumarDiasMesPagoPC',
                type: 'post',
                success: function(response,status){
                    //alert("Respueta: "+response+" Estado "+status);
                    $("#fechaFinal").val(response);
                }
            });
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
                var cuota = parseFloat(capital*(Math.pow((1 + tasaI/100), periodo) * tasaI/100)/(Math.pow((1 + tasaI/100), periodo) -1)).toFixed(2);
                var deuda = parseFloat(cuota*periodo).toFixed(2);
                document.getElementById("deuda").value = deuda;
                document.getElementById("cuota").value = cuota;
            }
    }

</script>