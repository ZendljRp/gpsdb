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
    $personQuery = "";
    for($i=1;$i<($allData-1);$i++){
        $values = explode(";",$convert[$i]);
        $strinQuery .= "($i,'$values[1]','$values[4]','','$values[2]','".str_replace("'","",$values[3])."','".str_replace("'","",$values[5])."','".str_replace("'", "", $values[8])."','".str_replace("'","", $values[9])."','".str_replace("'", "", $values[10])."','".str_replace("'", "", $values[11])."','".str_replace("'","",$values[6])."','".str_replace("'","",$values[13])."','".str_replace("'","",$values[15])."','".date("Y-m-d H:i:s")."', '', 1, 1),";
    }
    $preQuery = rtrim($strinQuery, ",");    
    $query = "INSERT INTO datahard VALUES " . $preQuery . ";";
    $response = $conn->query($query);
    $search = "SELECT DISTINCT razonsocial, address, tipodoc,document,fechmora, fechasign,estadocliente
                FROM datahard 
                GROUP BY document 
                ORDER BY razonsocial 
                LIMIT 0, 2000";
    $result = $conn->query($search);
    if ($result) {
        $i=1;
        /* obtener el array de objetos */        
        while ($obj = $result->fetch_object()) {
            $personQuery .= "($i,'$obj->razonsocial','$obj->address','$obj->tipodoc','$obj->document', '','','','','$obj->fechmora','$obj->fechasign','$obj->estadocliente','','".date("Y-m-d H:i:s")."', '', 1),";
            $i++;
        }
        /* liberar el conjunto de resultados */
        $result->close();
    }
    $prePerson = rtrim($personQuery, ",");
    $person = "INSERT INTO person VALUES " . $prePerson . ";";
    $rspPerson = $conn->query($person);
    
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <?php echo date('Y-m-d H:i:s'); ?>
    <form method="post" enctype="multipart/form-data" action="upload.php">
        SELECCIONE ARCHIVO:
        <input type="file" name="fileUpload" id="fileUpload"/>
        <input type="submit" value="Upload" name="submit" />
    </form>
    <?php if(!empty($preQuery)):?>
    <pre><?php echo var_dump($conn); ?></pre>
    <?php endif; ?>
    
</html>

