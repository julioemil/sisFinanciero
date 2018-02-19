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
                        'placeholder' => 'Capital',
                        'type'        => 'text',
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
                      //echo form_open("clientes/Save", $attributes);
                 ?> 
                    
            <table border=0>                                        
                    <tr>
                        <td><?php echo form_label("Pago(*)",'pago'); ?></td>
                        <td> <?php  echo form_input($pago); ?></td>
                        <td><font color="red"><?php echo form_error('pago');?></font></td>
                        <td><?php echo form_label("N° de Recibo(*)",'nRecibo');?></td>
                        <td><?php echo form_input($nRecibo);?></td>
                        <td><font color="red"><?php echo form_error('nRecibo');?></font></td>
                    </tr>

                    <tr>
                        <td><?php echo form_label("Saldo(*)",'saldo');?></td>
                        <td><?php echo form_input($saldo);?></td>
                        <td><font color="red"><?php echo form_error('saldo'); ?></font></td>
                    </tr>
                    
                    <tr>
                    </tr>

                    <tr>
                        <td><label>Prestamo</label></td>
                        <td>    
                        <select name="idPrestamo">
                             <option>Seleccione Prestamo</option>
                            <?php
                             echo '<option value="'.$data.'">'.$data.'</option>';
                             ?>
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