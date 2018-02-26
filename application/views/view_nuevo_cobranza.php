<?php

                        //Dibujando el campo capital
                        $pago       = array(
                        'name'        => 'pago',
                        'id'          => 'pago',
                        'size'        => 8, 
                        'value'	  => set_value('pago',@$datos_cobranza[0]->pago),
                        'placeholder' => 'pago',
                        'type'        => 'text',
                        );
                        
                                                //Dibujando el campo capital
                        $nRecibo       = array(
                        'name'        => 'nRecibo',
                        'id'          => 'nRecibo',
                        'size'        => 8, 
                        'value'	  => set_value('nRecibo',@$datos_cobranza[0]->nRecibo),
                        'placeholder' => 'nRecibo',
                        'type'        => 'text',
                        );
                        
                        $saldo = array(
                        'name'        => 'saldo',
                        'id'          => 'saldo',
                        'size'        => 8, 
                        'value'	  => set_value('saldo',@$datos_cobranza[0]->saldo),
                        'placeholder' => 'Saldo',
                        'type'        => 'text',
                        'readonly'    => 'readonly',
                        );
?>
<center>
        <table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">
            <tr>
                <td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'>.: REGISTRO DE PAGO :.</legend></td>
            </tr>
            <tr>
                <td colspan=3>
                <?php $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
                    foreach ($arrayprestamo as $array) { 
                      echo form_open("/cobranza/nuevo/$array->idPrestamo");
                 ?> 
                    
            <table border=0>    
                    <tr>
                        <td><label>Cliente</label></td>
                        <td>    
                        <select name="idPrestamo">
                          <option value="<?php echo $array->idPrestamo?>"><?php echo $array->apellidos.', '.$array->nombres?></option>
                        </select>     
                        </td>
                        <td></td>
                        <td><label>Documento de Identidad</label></td>
                        <td><input type="text" readonly=”readonly” value="<?php echo $array->dni ?>" /></td>
                        <td></td>
                        
                    </tr>
                    <tr>    
                        <?php   $sumapago=0;
                                $sumadeuda=$array->deuda;
                                if($array->vez==0){
                                $arraydeuda=$this->model_cobranza->getPago($array->idPrestamo);
                                 foreach($arraydeuda as $datos){
                                 $sumapago=$sumapago+ $datos->pago;   
                                 }
                                }
                                if($array->vez==1){
                                $arraydeuda=$this->model_cobranza->getPago1($array->idPrestamo);
                                 foreach($arraydeuda as $datos){
                                 $sumapago=$sumapago+ $datos->pago;   
                                 }
                                }
                                if($array->vez==2){
                                $arraydeuda=$this->model_cobranza->getPago2($array->idPrestamo);
                                 foreach($arraydeuda as $datos){
                                 $sumapago=$sumapago+ $datos->pago;   
                                 }
                                }
                                if($array->vez==3){
                                $arraydeuda=$this->model_cobranza->getPago3($array->idPrestamo);
                                 foreach($arraydeuda as $datos){
                                 $sumapago=$sumapago+ $datos->pago;   
                                 }
                                }
                                 $deuda=$array->deuda-$sumapago;
                        ?>
                        <td><label>Deuda Actual (S/.)</label></td>
                        <td><input type="text" id="deudaActual" name="deudaActual" readonly=”readonly” value="<?php echo $deuda; ?>" /></td>
                        <td></td>
                        <td><label>Detalles:</label></td>
                        <td colspan="2"><h4>-Capital (S/):  <?php echo number_format($array->capital, 2, '.', '') ?><br> -Interes(%):  <?php echo $array->tasaInteres ?><br>
                           -Deuda Inicial (S/):  <?php  echo number_format($array->deuda, 2, '.', '')?> <br>-Cuota(S/.):<?php echo round($array->cuota,2) ?></h4></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td><?php echo form_label("Pago(*)",'pago'); ?></td>
                        <td> <?php  echo form_input($pago); ?></td>
                        <td><font color="red"><?php echo form_error('pago');?></font></td>
                        <td colspan="3"><input type="hidden" name="vez"  value="<?php echo $array->vez; ?>"</td>
                    </tr>

                    <tr>
                        <td><?php echo form_label("Saldo(*)",'saldo');?></td>
                        <td><?php echo form_input($saldo);?></td>
                        <td><font color="red"><?php echo form_error('saldo'); ?></font></td>
                        <td><?php echo form_label("N° de Recibo(*)",'nRecibo');?></td>
                        <td><?php echo form_input($nRecibo);?></td>
                        <td><font color="red"><?php echo form_error('nRecibo');?></font></td>
                    </tr>
                    
                    <tr>
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
                        <a href="<?php echo base_url();?>index.php/cobranza" class="btn btn-danger">CANCELAR</a>
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
   $("#deudaActual").focusout(function(e) {
   if($("#deudaActual").val()!='' &&  $("#pago").val()!=''){
            var deudaActual = document.getElementById('deudaActual').value;
            var pago = document.getElementById('pago').value;
            var saldo = parseFloat(deudaActaul-pago);
            document.getElementById("saldo").value = saldo;    
        }        
    });

    $("#pago").focusout(function(e) {
        if($("#deudaActual").val()!='' &&  $("#pago").val()!=''){
            var deudaActual = document.getElementById('deudaActual').value;
            var pago = document.getElementById('pago').value;
            var saldo = parseFloat(deudaActual-pago);
            document.getElementById("saldo").value = saldo;  
        }        
    });
</script>