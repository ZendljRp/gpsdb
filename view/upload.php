<?php
include '../db/conextion.php';
if(!empty($_POST)){
    $conn = conn();
    //echo var_dump($_FILES['fileUpload']);
    $data = file_get_contents($_FILES['fileUpload']["tmp_name"]);
    $values = array();
    //echo "<br/>".var_dump($data);
    $convert = explode("\n", $data);
    $allData = count($convert);
    $strinQuery = "";
    for($i=1;$i<($allData-1);$i++){
        $values = explode(";",$convert[$i]);
        $strinQuery .= "('','$values[1]','$values[4]','','$values[2]','".str_replace("'","",$values[3])."','".str_replace("'","",$values[5])."','$values[8]','$values[9]','$values[10]','$values[11]','$values[12]','$values[6]','$values[13]','$values[15]','".date("Y-m-d H:i:s")."', '', 1, 1),";
    }
    $preQuery = substr($strinQuery, 0, -1);
    $query = "INSERT INTO datahard VALUES " . $strinQuery . ";";
    $response = $conn->query($query);
    
    echo "<br/>".var_dump($conn);
    
    /*
     * iddatahard,codprodinterno,razonsocial,address,tipodoc,document,codprodcliente,moneda,importsaldo,saldooperativo,saldoactivo,fechmora,fechasign,estadocliente,datecreate,dateupdate,status,idcustomer
     */
    
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <form method="post" enctype="multipart/form-data" action="upload.php">
        SELECCIONE ARCHIVO:
        <input type="file" name="fileUpload" id="fileUpload"/>
        <input type="submit" value="Upload" name="submit" />
    </form>
</html>

