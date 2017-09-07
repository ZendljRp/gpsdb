<?php
include '../db/conextion.php';
if(!empty($_POST)){
    $conn = conn();
    $data = file_get_contents($_FILES['fileUpload']["tmp_name"]);
    $values = array();
    $convert = explode("\n", $data);
    $allData = count($convert);
    $strinQuery = "";
    $personQuery = "";
    for($i=1;$i<($allData-1);$i++){
        $values = explode(";",$convert[$i]);
        $strinQuery .= "($i,'$values[0]','".str_replace("'","",$values[1])."','".str_replace("'","",$values[3])."','".str_replace("'", "", $values[4])."','".str_replace("'","", $values[6])."','".date("Y-m-d H:i:s")."', '', 1),";
    }
    $preQuery = rtrim($strinQuery, ",");    
    $query = "INSERT INTO dataphone VALUES " . $preQuery . ";";
    $response = $conn->query($query);
    /*$search = "SELECT idperson, document
                FROM person
                WHERE 
                GROUP BY document 
                ORDER BY razonsocial 
                LIMIT 0, 2000";
    $result = $conn->query($search);*/
    /*if ($result) {
        $i=1;  
        while ($obj = $result->fetch_object()) {
            $personQuery .= "($i,'$obj->razonsocial','$obj->address','$obj->tipodoc','$obj->document', '','','','','$obj->fechmora','$obj->fechasign','$obj->estadocliente','','".date("Y-m-d H:i:s")."', '', 1),";
            $i++;
        }
        $result->close();
    }
    $prePerson = rtrim($personQuery, ",");
    $person = "INSERT INTO person VALUES " . $prePerson . ";";
    $rspPerson = $conn->query($person);*/
    
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <?php echo date('Y-m-d H:i:s'); ?>
    <form method="post" enctype="multipart/form-data" action="phone.php">
        SELECCIONE ARCHIVO TELEFONO:
        <input type="file" name="fileUpload" id="fileUpload"/>
        <input type="submit" value="Upload" name="submit" />
    </form>
    <?php if(!empty($preQuery)):?>
    <pre><?php echo var_dump($conn); ?></pre>
    <?php endif; ?>
    
</html>

