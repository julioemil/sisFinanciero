<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  

class export_excel{

    function to_excel($array, $filename) {
        $tipo = isset($_REQUEST['t']) ? $_REQUEST['t'] : 'excel';
        $extension = $tipo == 'excel' ? '.xls' : '.doc';
        header("Content-type: application/vnd.ms-$tipo");
        header('Content-Disposition: attachment; filename='.$filename.$extension);
        header('Content-Transfer-Encoding: binary');
        header("Pragma: no-cache");
        header("Expires: 0");
        print "\xEF\xBB\xBF"; // UTF-8 BOM
        $h = array();
        foreach($array->result_array() as $row){
            foreach($row as $key=>$val){
                if(!in_array($key, $h)){
                    $h[] = $key;   
                }
            }
        }
        echo '<table><tr>';
        foreach($h as $key) {
            $key = ucwords($key);
            echo '<th style="border:1px #888 solid;background-color:#006699;color:white;">'.$key.'</th>';
        }
        echo '</tr>';

        foreach($array->result_array() as $row){
            echo '<tr>';
            foreach($row as $val)
                $this->writeRow($val);   
        }
        echo '</tr>';
        echo '</table>';

    }

    function writeRow($val) {
        echo '<td style="border:1px #888 solid;color:#555;">'.$val.'</td>';              
    }

}
?>