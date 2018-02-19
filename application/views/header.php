<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css">
<link href="<?php echo base_url();?>css/Estilo.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/Tablas.css">

<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.dataTables.js"></script>	
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/demo.css" />
<title>Sistema de Financiero</title>
</head>
    
<body>	
	<?php
		if ($this->session->userdata('is_logged_in')){
			echo '<h4 align="right">';
			echo '<small>';
                        echo '<br>';
			echo 'Bienvenido: <strong>'.$this->session->userdata('NOMBRE').' '.$this->session->userdata('APELLIDOS').'</strong>&nbsp;|&nbsp;';
			echo 'Tipo Usuario: <strong>'.$this->session->userdata('TIPOUSUARIO').'</strong>&nbsp;|&nbsp;';
			echo anchor("login/CerrarSesion/", "Salir").'&nbsp;&nbsp;</small></h4>';
			echo '<p align="right">';
                        echo '<div class="header clear-fix">';
                        echo '<div id="cssmenu">';
			echo '<table   align="center">';
			echo '<tr>';
			foreach($this->session->userdata('Permisos') as $CrearMenu1){
                            
                            if($CrearMenu1["ID"]=="Error"){
                                echo '<td><font color="red">Sin Permisos para el Ver Menu. Solicita los Permisos con un Administrador</font></td>';
                             }else{   
                                  echo '<td><ul class="header"><a href="'.base_url().'index.php'.$CrearMenu1["URL"].'">'.'<h5><font color="white">'.$CrearMenu1["DESCRIPCION"].'</font></h5>'."</a></ul></td>";
                                  echo '<td><h5>&nbsp;|&nbsp;</h5></td>';
                            }
			}
                        echo '</tr>';
			echo '</table>'; 
                        echo '</div>';
                        echo '</div>';
		
		}else{
		}
	?>
</body>
</html>
                                 