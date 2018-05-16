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
                <?php $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
                    foreach ($arrayprestamo as $array) { 
                      echo form_open("/cobranza/nuevo/$array->idPrestamo/$array->fechaFinal");
                 ?> 
        <table border=0 class="ventanas" width="90%" cellspacing="0" cellpadding="0">
            <tr>
                <td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'>.: REGISTRO DE PAGO :. &emsp;&emsp;&emsp; N° PRESTAMO: <?php echo $array->idPrestamo; ?></legend></td>
            </tr>
            <tr>
                <td colspan=3>
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
                                  if($array->producto == 'diario' || $array->producto == 'semanal'){
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
                                        $deudaTotal = $saldoVariable;
                                        $interesC = 0;
                                        $interesM = 0;
                                      } 
                                  }



                                  if($array->producto == 'mesCampana'){
                                      //SI PASO FECHA VENCIMIENTO 
                                      if($hoy > $array->fechaFinal){
                                        $intervalTranscurrido = $datetime2->diff($datetime3);
                                        $diasTranscurridos = $intervalTranscurrido->format("%a");

                                        $deudaMensual = $capital*pow((1+$TEDC),$diasTranscurridos);
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

                                  if($array->producto == 'mensual'){
                                    $cantidadPagos=$this->model_cobranza->getCobranzaPago($array->idPrestamo);
                                    
                                    $diasGenerados = 30*($cantidadPagos +1);
                                    $capitalPrestamo = $capital;

                                    $fechaVencimientoCuota = strtotime ('+'.$diasGenerados.' day', strtotime($array->fechaInicio));
                                    $fechaVencimientoCuota = date ('Y-m-j', $fechaVencimientoCuota);
                                    $fechaVencimientoCuota = new DateTime($fechaVencimientoCuota);
                                    $fechaVencimientoCuotaS = $fechaVencimientoCuota->format('Y-m-d');

                                    $fechaVencCuotaAnterior = strtotime ('-30 day' , strtotime($fechaVencimientoCuotaS));
                                    $fechaVencCuotaAnterior = date ('Y-m-j', $fechaVencCuotaAnterior);
                                    $fechaVencCuotaAnterior = new DateTime($fechaVencCuotaAnterior);
                                    $fechaVencCuotaAnteriorS = $fechaVencCuotaAnterior->format('Y-m-d');

                                    if($cantidadPagos > 0){
                                        $arraysaldo = $this->model_cobranza->getSaldo($array->idPrestamo);
                                        foreach($arraysaldo as $datos){
                                            $saldoMensual = $datos->saldo;
                                            $fechaVencCuotaAnterior = new DateTime($datos->fechaCobranza);
                                            $fechaVencCuotaAnteriorS = $fechaVencCuotaAnterior->format('Y-m-d');
                                            $fechaVencCuotaAnterior = new DateTime($fechaVencCuotaAnterior->format('Y-m-d'));
                                        }
                                        $capital = $saldoMensual;
                                    }

                                      //SI PASO FECHA VENCIMIENTO 
                                      if($hoy > $fechaVencimientoCuotaS){

                                        $intervalTranscurrido = $datetime1->diff($fechaVencCuotaAnterior);
                                        $diasCuota = $intervalTranscurrido->format("%a");

                                        $intervalVencido = $datetime1->diff($fechaVencimientoCuota);
                                        $diasVencidos = $intervalVencido->format("%a");

                                        $dias = $diasVencidos;

                                        $interesC = ($capital*pow((1+$TEDC),$diasCuota)-$capital);
                                        $interesM = ($capital*pow((1+$TEDM),$diasVencidos)-$capital);
                                        $deudaTotal = $capital + $interesC + $interesM;
                                        $saldoVariable = $capital;

                                        $plazo = $array->plazo;
                                        $tasaInteres = $array->tasaInteres;

                                        $cuota = $capitalPrestamo*(pow((1 + $tasaInteres/100), $plazo)*$tasaInteres/100)/(pow((1 + $tasaInteres/100), $plazo) - 1);

                                        $saldoCapital = $capitalPrestamo;
                                        $count = 0;
                                        $totalCapital = 0;
                                        $totalInteres = 0;
                                        $totalCuota = 0;
                                        $periodo = $cantidadPagos + 1;

                                         while($periodo>$count){
                                            $count = $count + 1;

                                            $interes = +$tasaInteres/100*$saldoCapital;
                                            $capital = +$cuota - $interes;
                                            $saldoCapital = +$saldoCapital - $capital;
                                         }
                                         echo $saldoCapital;
                                         $pagoNuevo = $deudaTotal - $saldoCapital;                                        
                                        $pago['value'] = set_value('pago', round($pagoNuevo,2));
                                      }
                                      //SE ENCUENTRE DEL PLAZO DE PRESTAMO
                                      else{
                                        $interval = $datetime1->diff($fechaVencCuotaAnterior);
                                        $dias = $interval->format("%a");

                                        $interesC = ($capital*pow((1+$TEDC),$dias)-$capital);
                                        $interesM = 0;
                                        
                                        $deudaTotal = $capital + $interesC;
                                        $saldoVariable = $capital;
                                      }  
                                  }

                                  

                                  
                                  
                        ?>
                    <tr>
                        <td><label>Producto:</label></td>
                        <td><input type="text" readonly=”readonly” value="<?php echo $array->producto; ?>" /></td>
                        <td><label>Capital (S/.):</label></td>
                        <td><input type="text" readonly=”readonly” value="<?php echo number_format($array->capital, 2, '.', ''); ?>"/></td>
                        <td><label>Interes Compensatorio(%):</label></td>
                        <td><input type="text" readonly=”readonly” value="<?php echo $array->tasaInteres; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label>Interes Moratorio(%):</label></td>
                        <td><input type="text" readonly=”readonly” value="<?php echo $array->tasaInteresMoratorio; ?>" /></td>
                        <td><label>Deuda Inicial (S/.):</label></td>
                        <td><input type="text" readonly=”readonly” value="<?php  echo number_format($array->deuda, 2, '.', '');?>"/></td>
                        <td><label>Fecha de Vencimiento:</label></td>
                        <td><input type="text" readonly=”readonly” value="<?php echo $array->fechaFinal;?>" /></td>
                    </tr>
                                    <?php 
                                    if($array->producto == 'diario' || $array->producto == 'semanal'){
                                        //Vencido
                                        if($hoy > $array->fechaFinal){
                                    ?>
                                        <tr>  
                                            <td><strong><mark>Total Pagos(S/.):</mark></strong></td>
                                            <td><strong><mark><?php echo number_format($sumapago,2,'.','');?></mark></strong></td>  
                                            <td><strong><mark>Saldo(S/.):</mark></strong></td>
                                            <td><strong><mark><?php echo number_format($saldoRestante,2,'.','');?></mark></strong></td>  
                                            <td><strong><mark>Dias Vencidos:</mark></strong></td>
                                            <td><strong><mark><?php echo $dias;?></mark></strong></td> 
                                        </tr>
                                        <!--
                                        <tr>
                                            <td><label>Interes:</label></td>
                                            <td><?php //echo round($interesVenc,2);?></td>  
                                            <td><label>Capital:</label></td>
                                            <td><?php //echo round($capitalVenc,2);?></td>  
                                        </tr>
                                        -->
                                        <tr>
                                            <td><strong><mark>Interes Com:</mark></strong></td>
                                            <td><strong><mark><?php echo $interesC;?></mark></strong></td>  
                                            <td><strong><mark>Interes Mor:</mark></strong></td>
                                            <td><strong><mark><?php echo $interesM;?></mark></strong></td> 
                                            <td><strong><mark>Reprogramaciones:</mark></strong></td>
                                            <td><strong><mark><?php echo $array->vez;?></mark></strong></td>  
                                        </tr>
                                    <?php } 
                                        //Dentro del plazo
                                    else{ ?>
                                        <tr>
                                            <td><strong><mark>Pagos Total (S/.):</mark></strong></td>
                                            <td><strong><mark><?php echo number_format($sumapago,2,'.', '');?></mark></strong></td>
                                             <td><?php //echo round($saldoVariable,2);?></td>
                                        </tr>
                                    <?php }
                                    }
                                    ?>
                                    <?php 
                                    if($array->producto == 'mesCampana'){
                                        if($hoy > $array->fechaFinal){
                                    ?>
                                    <tr>

                                         <td><strong><mark>Deuda por dia: </mark></strong></td>
                                         <td><strong><mark><?php echo round($deudaTotal,2);?></mark></strong></td>
                                         <td><strong><mark>Total Pagos:</mark></strong></td>
                                         <td><strong><mark><?php echo round($sumapago,2);?></mark></strong></td>
                                         <td><strong><mark>Saldo:</mark></strong></td>
                                         <td><strong><mark><?php echo round($saldoRestante,2);?></mark></strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong><mark>Dias Vencidos: </mark></strong></td>                 
                                        <td><strong><mark><?php echo $dias;?></mark></strong></td>
                                        <td><strong><mark>Interes Com:</mark></strong></td>
                                        <td><strong><mark><?php echo $interesC;?></mark></strong></td>
                                        <td><strong><mark>Interes Mor: </mark></strong></td>
                                        <td><strong><mark><?php echo $interesM;?></mark></strong></td>
                                    </tr>
                                    <?php } else{ ?>
                                    <tr>

                                        <td><strong><mark>Deuda por Dia:<strong><mark></td>
                                        <td><strong><mark><?php echo round($deudaTotal,2);?><strong><mark></td>
                                        <td><strong><mark>Total Pagos:</mark></strong></td>
                                        <td><strong><mark><?php echo round($sumapago,2);?></mark></strong></td>
                                        <td><strong><mark>Saldo:</mark></strong></td>
                                        <td><strong><mark><?php echo round($saldoVariable,2);?></mark></strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong><mark>Dias:</mark></strong></td>
                                        <td><strong><mark><?php echo $dias;?></mark></strong></td>
                                        <td><strong><mark>Interes Com:<strong><mark></td>
                                        <td><strong><mark><?php echo $interesC;?><strong><mark></td>
                                    </tr>
                                    <?php }
                                    }
                                    ?>

                                    <?php 
                                    if($array->producto == 'mensual'){
                                        if($hoy > $fechaVencimientoCuotaS){
                                        //CUOTA VENCIDA
                                    ?>
                                    <tr>
                                        <td><strong><mark>F. Cuota Anterior:<strong><mark></td>
                                        <td><strong><mark><?php echo $fechaVencCuotaAnteriorS;?><strong><mark></td>
                                        <td><strong><mark>F. Vencimiento Cuota:</mark></strong></td>
                                        <td><strong><mark><?php echo $fechaVencimientoCuotaS;?></mark></strong></td>
                                        <td><strong><mark>F. Actual:</mark></strong></td>
                                        <td><strong><mark><?php echo $hoy;?></mark></strong></td>
                                    </tr>
                                    <tr>
                                         <td><strong><mark>Deuda por dia: </mark></strong></td>
                                         <td><strong><mark><?php echo round($deudaTotal,2);?></mark></strong></td>
                                         <td><strong><mark>Total Pagos:</mark></strong></td>
                                         <td><strong><mark><?php echo round($sumapago,2);?></mark></strong></td>
                                         <td><strong><mark>Saldo:</mark></strong></td>
                                         <td><strong><mark><?php echo round($saldoVariable,2);?></mark></strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong><mark>Dias Vencidos: </mark></strong></td>                 
                                        <td><strong><mark><?php echo $dias;?></mark></strong></td>
                                        <td><strong><mark>Interes Com:</mark></strong></td>
                                        <td><strong><mark><?php echo round($interesC,2);?></mark></strong></td>
                                        <td><strong><mark>Interes Mor: </mark></strong></td>
                                        <td><strong><mark><?php echo round($interesM,2);?></mark></strong></td>
                                    </tr>
                                    <?php } else{ 
                                        //CUOTA DENTRO DEL PLAZO DE VENCIMIENTO
                                    ?>

                                    <tr>
                                        <td><strong><mark>F. Cuota Anterior:<strong><mark></td>
                                        <td><strong><mark><?php echo $fechaVencCuotaAnteriorS;?><strong><mark></td>
                                        <td><strong><mark>F. Vencimiento Cuota:</mark></strong></td>
                                        <td><strong><mark><?php echo $fechaVencimientoCuotaS;?></mark></strong></td>
                                        <td><strong><mark>F. Actual:</mark></strong></td>
                                        <td><strong><mark><?php echo $hoy;?></mark></strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong><mark>Deuda por Dia:<strong><mark></td>
                                        <td><strong><mark><?php echo round($deudaTotal,2);?><strong><mark></td>
                                        <td><strong><mark>Total Pagos:</mark></strong></td>
                                        <td><strong><mark><?php echo round($sumapago,2);?></mark></strong></td>
                                        <td><strong><mark>Saldo:</mark></strong></td>
                                        <td><strong><mark><?php echo round($saldoVariable,2);?></mark></strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong><mark>Dias:</mark></strong></td>
                                        <td><strong><mark><?php echo $dias;?></mark></strong></td>
                                        <td><strong><mark>Interes Com:<strong><mark></td>
                                        <td><strong><mark><?php echo round($interesC,2);?><strong><mark></td>
                                    </tr>
                                    <?php }
                                    }
                                    ?>
                            </h4>
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td><label>Deuda Actual (S/.)</label></td>
                        <td><input type="text" id="deudaActual" name="deudaActual" readonly=”readonly” value="<?php echo round($deudaTotal,2); ?>" /></td>
                        <td><label>Cuota:</label></td>
                        <td><input type="text" readonly=”readonly” value="<?php echo number_format($array->cuota,2,'.', '');?>" /></td>
                        <td><?php echo form_label("Pago(*)",'pago'); ?></td>
                        <td> <?php  echo form_input($pago,10); ?></td>
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
                        <?php } 

                            $fechaVNueva = strtotime ('- 3 day', strtotime($array->fechaFinal));
                            $fechaVNueva = date ('Y-m-j', $fechaVNueva);
                            $fechaVNueva = new DateTime($fechaVNueva);
                            $fechaVNuevaS = $fechaVNueva->format('Y-m-d');
                        ?>

                        <?php if($hoy>=$fechaVNuevaS && $hoy<$array->fechaFinal){?>
                        <div class="alert alert-danger text-center">Credito por Vencer y Reprogramar</div>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td colspan=6><?php echo $this->session->flashdata('msg');?></td>
                    </tr>
                    
                    <tr>
                        <td colspan=6><hr/></td>
                    </tr>
                    
                    <tr>
                        <?php //if($array->producto == 'mensual'){ ?>
                        <input type="hidden" id="capitalPagado" name="capitalPagado">
                        <input type="hidden" id="compensatorioPagado" name="compensatorioPagado" value="<?php echo $interesC; ?>">
                        <input type="hidden" id="moratorioPagado" name="moratorioPagado" value="<?php echo $interesM; ?>">
                        <?php //} ?>
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
            var interesC = document.getElementById('compensatorioPagado').value;
            var interesM = document.getElementById('moratorioPagado').value;
            //var tasaInteres = document.getElementById('tasaInteres').value;
            var saldo = parseFloat(deudaActual-pago).toFixed(2);
            //var nuevaDeuda = parseFloat(saldo*(1+tasaInteres/100)).toFixed(2);
            document.getElementById("saldo").value = saldo;    
            document.getElementById("capitalPagado").value = pago - interesC - interesM;
            //document.getElementById("capital").value = saldo;
            //document.getElementById("nuevaDeuda").value = nuevaDeuda;
        }        
    });

    $("#pago").focusout(function(e) {
        if($("#deudaActual").val()!='' &&  $("#pago").val()!=''){
            var deudaActual = document.getElementById('deudaActual').value;
            var pago = document.getElementById('pago').value;
            var interesC = document.getElementById('compensatorioPagado').value;
            var interesM = document.getElementById('moratorioPagado').value;
            //var tasaInteres = document.getElementById('tasaInteres').value;
            var saldo = parseFloat(deudaActual-pago).toFixed(2);
            //var nuevaDeuda = parseFloat(saldo*(1+tasaInteres/100)).toFixed(2);
            document.getElementById("saldo").value = saldo;    
            document.getElementById("capitalPagado").value = pago - interesC - interesM;
            //document.getElementById("capital").value = saldo;
            //document.getElementById("nuevaDeuda").value = nuevaDeuda;
        }        
    });
</script>