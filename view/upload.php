<?php
ini_set('mysqli.connect_timeout', 720);
ini_set('default_socket_timeout', 720);
set_time_limit(0);
include '../db/conextion.php';
if(!empty($_POST)){
    $conn = conn();
    $idCustomer = $_POST["customer"];
    $data = file_get_contents($_FILES['fileUpload']["tmp_name"]);
    $values = array();
    $convert = explode("\n", $data);
    //$allData = count($convert);
    $rows = count($convert);
    $divisor = 5000;
    $rest = $rows%$divisor;
    $entero = intval($rows/$divisor);
    $strinQuery = "";
    $personQuery = "";
    $f = 1;
	for($j=$f;$j<=$total;$j++){
		$values = explode(";",$convert[$j]);
		//$strinQuery .= "($i,'$values[1]','$values[4]','','$values[2]','".str_replace("'","",$values[3])."','".str_replace("'","",$values[5])."','".str_replace("'", "", $values[8])."','".str_replace("'","", $values[9])."','".str_replace("'", "", $values[10])."','".str_replace("'", "", $values[11])."','".str_replace("'","",$values[6])."','".str_replace("'","",$values[13])."','".str_replace("'","",$values[15])."','".date("Y-m-d H:i:s")."', '', 1, 1),";
		$strinQuery .= "('','$j','$values[2]','','$values[3]','$values[4]','','','','',','','','','".date("Y-m-d H:i:s")."', '', 1, $idCustomer),";   
	}
	$f = $j;
	$preQuery = rtrim($strinQuery, ",");    
	$query = "INSERT INTO datahard VALUES " . $preQuery . ";";
	
    /*for($i=1;$i<=$entero;$i++){
        $total = $i * $divisor;        
        
        //$response = $conn->query($query);
    }*/
    //Telefono;Tipo de Celular;Titular;typeDocument;NumDocument
    //$preQuery = rtrim($strinQuery, ",");    
    //$query = "INSERT INTO datahard VALUES " . $preQuery . ";";
    //$response = $conn->query($query);
    /*$search = "SELECT DISTINCT razonsocial, address, tipodoc,document,fechmora, fechasign,estadocliente
                FROM datahard 
                GROUP BY document 
                ORDER BY razonsocial 
                LIMIT 0, 2000";
    $result = $conn->query($search);
    if ($result) {
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
    $stringCus = "";
    $queryClient = "SELECT * FROM customer;";
    $resultClie = $conn->query($queryClient);
    if($resultClie){        
        while($resultSet = $resultClie->fetch_object()){
            $stringCus .= "<option value='$resultSet->idcustomer'>$resultSet->name</option>";
        }
    }
}else{
    $conn = conn();
    $stringCus = "";
    $queryClient = "SELECT * FROM customer;";
    $resultClie = $conn->query($queryClient);
    if($resultClie){        
        while($resultSet = $resultClie->fetch_object()){
            $stringCus .= "<option value='$resultSet->idcustomer'>$resultSet->name</option>";
        }
    }
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
        <input type="file" name="fileUpload" id="fileUpload"/><BR/>
        SELECCIONE CLIENTE:
        <select name="customer" id="customer">
            <option value="">seleccione clientes</option>
            <?php echo $stringCus; ?>
        </select><br/>
        <input type="submit" value="Upload" name="submit" />
    </form>
    <?php if(!empty($convert)):?>
    <pre><?php echo var_dump($query); ?></pre>
    <?php endif; ?>
    
</html>

