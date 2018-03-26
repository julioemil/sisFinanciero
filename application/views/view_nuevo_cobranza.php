<?php

                        //Dibujando el campo capital
                        $pago       = array(
                        'name'        => 'pago',
                        'id'          => 'pago',
                        'size'        => 8, 
                        'value'   => set_value('pago',@$datos_cobranza[0]->pago),
                        'placeholder' => 'pago',
                        'type'        => 'text',
                        );
                        
                                                //Dibujando el campo capital
                        $nRecibo       = array(
                        'name'        => 'nRecibo',
                        'id'          => 'nRecibo',
                        'size'        => 8, 
                        'value'   => set_value('nRecibo',@$datos_cobranza[0]->nRecibo),
                        'placeholder' => 'nRecibo',
                        'type'        => 'text',
                        );
                        
                        $saldo = array(
                        'name'        => 'saldo',
                        'id'          => 'saldo',
                        'size'        => 8, 
                        'value'   => set_value('saldo',@$datos_cobranza[0]->saldo),
                        'placeholder' => 'Saldo',
                        'type'        => 'text',
                        'readonly'    => 'readonly',
                        );
?>
<center>
        <table border=0 class="ventanas" width="90%" cellspacing="0" cellpadding="0">
            <tr>
                <td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'>.: REGISTRO DE PAGO :.</legend></td>
            </tr>
            <tr>
                <td colspan=3>
                <?php $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
                    foreach ($arrayprestamo as $array) { 
                      echo form_open("/cobranza/nuevo/$array->idPrestamo/$array->fechaFinal");
                 ?> 
                    
            <table border=0>    
                    <tr>
                        <td><label>Cliente</label></td>
                        <td>    
                        <select name="idPrestamo">
                          <option value="<?php echo $array->idPrestamo?>"><?php echo $array->apellidos.', '.$array->nombres?></option>
                        </select>     
                        </td>
                        <td><label>Documento de Identidad</label></td>
                        <td><input type="text" readonly=”readonly” value="<?php echo $array->dni ?>" /></td>
                        <td><label>Empleado</label></td>
                        <td><input type="text" readonly=”readonly” value="<?php $arrayusuario= $this->model_cobranza->Usuario($array->idUsuario); echo  $arrayusuario->APELLIDOS.' '.$arrayusuario->NOMBRE;?>" /></td>
                        
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

                                  $hoy = date("Y")."-".date("m")."-".date("d");
                                  $capital = $array->capital;

                                  $interesCompensatorio = $array->tasaInteres;
                                  $interesMoratorio = $array->tasaInteresMoratorio;

                                  $TEAC = pow((1 + $interesCompensatorio/100),12) - 1;
                                  $TEDC = pow((1 + $TEAC),1/360) - 1;

                                  $TEAM = pow((1 + $interesMoratorio/100),12) - 1;
                                  $TEDM = pow((1 + $TEAM),1/360) - 1;
                                  
                                  $datetime1 = new DateTime($hoy);
                                  $datetime2 = new DateTime($array->fechaFinal);
                                  $datetime3 = new DateTime($array->fechaInicio);

                                  //CASO DIARIO:
                                  if($array->producto == 'diario'){
                                    //SI PASO FECHA VENCIMIENTO 
                                      if($hoy > $array->fechaFinal){

                                        $deudaMensual = $capital*pow((1+$TEDC),30);
                                        $saldoRestante = $deudaMensual - $sumapago;                                    

                                        $interesVenc = ($interesCompensatorio/100)/(1 + $interesCompensatorio/100)*$saldoRestante;
                                        $capitalVenc = $saldoRestante - $interesVenc;
                                        $interval = $datetime1->diff($datetime2);
                                        $dias = $interval->format("%a");                                    

                                        $interesC = ($capitalVenc*pow((1+$TEDC),$dias)-$capitalVenc);
                                        $interesM = ($capitalVenc*pow((1+$TEDM),$dias)-$capitalVenc);
                                        $saldoVariable = $saldoRestante + $interesC + $interesM;
                                        $deudaTotal = $saldoVariable;

                                      }
                                      //SE ENCUENTRE DEL PLAZO DE PRESTAMO
                                      else{
                                        $saldoVariable = $deuda;
                                      } 
                                  }

                                  if($array->producto == 'mesCampana'){
                                      //SI PASO FECHA VENCIMIENTO 
                                      if($hoy > $array->fechaFinal){

                                        $deudaMensual = $capital*pow((1+$TEDC),30);
                                        $saldoRestante = $deudaMensual - $sumapago;                                    

                                        $interesVenc = ($interesCompensatorio/100)/(1 + $interesCompensatorio/100)*$saldoRestante;
                                        $capitalVenc = $saldoRestante - $interesVenc;
                                        $interval = $datetime1->diff($datetime2);
                                        $dias = $interval->format("%a");                                    

                                        $interesC = ($capitalVenc*pow((1+$TEDC),$dias)-$capitalVenc);
                                        $interesM = ($capitalVenc*pow((1+$TEDM),$dias)-$capitalVenc);
                                        $saldoVariable = $saldoRestante + $interesC + $interesM;
                                        $deudaTotal = $saldoVariable;
                                      }
                                      //SE ENCUENTRE DEL PLAZO DE PRESTAMO
                                      else{
                                        $interval = $datetime1->diff($datetime3);
                                        $dias = $interval->format("%a");
                                        $interesC = ($capital*pow((1+$TEDC),$dias)-$capital);
                                        $interesM = ($capital*pow((1+$TEDM),0)-$capital);
                                        $deudaTotal = $capital + $interesC;
                                        $saldoVariable = $deudaTotal - $sumapago;
                                      }  
                                  }

                                  
                                  
                        ?>
                        <td colspan="2" align="center"><label><h4>Detalles:</h4></label></td>
                        <td colspan="2">
                            <h4>_producto:<?php echo $array->producto; ?><br>
                                -Capital (S/):  <?php echo number_format($array->capital, 2, '.', '') ?>
                            <br> -Interes Compen(%):  <?php echo $array->tasaInteres ?><br>
                                -Interes Mora(%): <?php echo $array->tasaInteresMoratorio ?><br>
                                -Deuda Inicial (S/):  <?php  echo number_format($array->deuda, 2, '.', '')?> 
                                <br>-Cuota(S/.):<?php echo round($array->cuota,2) ?><br>
                                -Fecha Final: <?php echo $array->fechaFinal;?><br>
                                -Fecha Hoy: <?php echo $hoy; ?><br>
                            </h4>
                        </td>
                        <td colspan="2">
                            <h4>
                                    <?php 
                                    if($array->producto == 'diario'){
                                        //Vencido
                                        if($hoy > $array->fechaFinal){
                                    ?>
                                    <table>
                                        <tr>
                                            <td>_Estado</td>
                                            <td>:</td>
                                            <td>&emsp;Vencido</td>
                                        </tr>

                                        <tr>
                                            <td>_Deuda General</td>
                                            <td>:</td>
                                            <td>&emsp;<?php echo round($deudaMensual,2);?></td>  
                                        </tr>
                                        <tr>
                                            <td>_Total Pagos</td>
                                            <td>:</td>
                                            <td>&emsp;<?php echo round($sumapago,2);?></td>  
                                        </tr>
                                        <tr>
                                            <td>_Saldo</td>
                                            <td>:</td>
                                            <td>&emsp;<?php echo round($saldoRestante,2);?></td>  
                                        </tr>
                                        <tr>
                                            <td>_Dias Vencidos</td>
                                            <td>:</td>
                                            <td>&emsp;<?php echo $dias;?></td>   
                                        </tr>
                                        <tr>
                                            <td>_Interes:</td>
                                            <td>:</td>
                                            <td>&emsp;<?php echo round($interesVenc,2);?></td>   
                                        </tr>
                                        <tr>
                                            <td>_capital:</td>
                                            <td>:</td>
                                            <td>&emsp;<?php echo round($capitalVenc,2);?></td>   
                                        </tr>
                                        <tr>
                                            <td>_Interes Com:</td>
                                            <td>:</td>
                                            <td>&emsp;<?php echo round($interesC,2);?>;?></td>   
                                        </tr>
                                        <tr>
                                            <td>_Interes Com:</td>
                                            <td>:</td>
                                            <td>&emsp;<?php echo round($interesC,2);?>;?></td>   
                                        </tr>

                                    </table>
                                        _ <br>
                                         <br>
                                        _Interes Mor: <?php echo round($interesM,2);?><br>
                                        _Deuda: <?php echo round($deudaTotal,2);?><br>
                                    <?php } 
                                        //Dentro del plazo
                                    else{ ?>
                                        _Estado: Activo<br>
                                        _Total Pagos: <?php echo round($sumapago,2);?><br>
                                        _Saldo: <?php echo round($saldoVariable,2);?><br>
                                    <?php }
                                    }
                                    ?>

                                    <?php 
                                    if($array->producto == 'mesCampana'){
                                        if($hoy > $array->fechaFinal){
                                    ?>
                                        _Estado: Vencido<br>
                                        _Deuda General: <?php echo round($deudaMensual,2);?><br>
                                        _Total Pagos: <?php echo round($sumapago,2);?><br>
                                        _Saldo: <?php echo round($saldoRestante,2);?><br>
                                        _Dias Vencidos: <?php echo $dias;?><br>
                                        _Interes: <?php echo round($interesVenc,2);?><br>
                                        _capital: <?php echo round($capitalVenc,2);?><br>
                                        _Interes Com: <?php echo round($interesC,2);?><br>
                                        _Interes Mor: <?php echo round($interesM,2);?><br>
                                        _Deuda: <?php echo round($deudaTotal,2);?><br>
                                    <?php } else{ ?>
                                        _Estado: Activo<br>
                                        _Total Pagos: <?php echo round($sumapago,2);?><br>
                                        _Saldo: <?php echo round($saldoVariable,2);?><br>
                                        _Dias: <?php echo $dias;?><br>
                                        _Interes Com: <?php echo round($interesC,2);?><br>
                                        _Deuda: <?php echo round($deudaTotal,2);?><br>
                                    <?php }
                                    }
                                    ?>
                            </h4>
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td><label>Deuda Actual (S/.)</label></td>
                        <td><input type="text" id="deudaActual" name="deudaActual" readonly=”readonly” value="<?php echo round($saldoVariable,2); ?>" /></td>
                        <td></td>
                        <td><?php echo form_label("Pago(*)",'pago'); ?></td>
                        <td> <?php  echo form_input($pago); ?></td>
                        <td><font color="red"><?php echo form_error('pago');?></font></td>
                        <input type="hidden" name="vez"  value="<?php echo $array->vez; ?>">
                    </tr>

                    <tr>
                        <td><?php echo form_label("Saldo(*)",'saldo');?></td>
                        <td><?php echo form_input($saldo);?></td>
                        <td><font color="red"><?php echo form_error('saldo'); ?></font></td>
                        <td><?php echo form_label("N° de Recibo(*)",'nRecibo');?></td>
                        <td><?php echo form_input($nRecibo);?></td>
                        <td><font color="red"><?php echo form_error('nRecibo');?></font></td>
                    </tr>
                    <tr colspan=6>
                        <?php if($hoy>$array->fechaFinal){?>
                        <div class="alert alert-danger text-center">Se recomienda realizar la reprogramacion de su prestamo</div>
                        <?php } ?>
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
            //var tasaInteres = document.getElementById('tasaInteres').value;
            var saldo = parseFloat(deudaActual-pago).toFixed(2);
            //var nuevaDeuda = parseFloat(saldo*(1+tasaInteres/100)).toFixed(2);
            document.getElementById("saldo").value = saldo;    
            //document.getElementById("capital").value = saldo;
            //document.getElementById("nuevaDeuda").value = nuevaDeuda;
        }        
    });

    $("#pago").focusout(function(e) {
        if($("#deudaActual").val()!='' &&  $("#pago").val()!=''){
            var deudaActual = document.getElementById('deudaActual').value;
            var pago = document.getElementById('pago').value;
            //var tasaInteres = document.getElementById('tasaInteres').value;
            var saldo = parseFloat(deudaActual-pago).toFixed(2);
            //var nuevaDeuda = parseFloat(saldo*(1+tasaInteres/100)).toFixed(2);
            document.getElementById("saldo").value = saldo;    
            //document.getElementById("capital").value = saldo;
            //document.getElementById("nuevaDeuda").value = nuevaDeuda;
        }        
    });
</script>