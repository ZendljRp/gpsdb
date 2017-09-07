<?php
include '../db/conextion.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$conn = conn();
$count = 1;
$compare = "";
$queryPersonPhone = "SELECT clie.razonsocial, clie.address, ph.document, clie.codprodcliente, clie.saldoactivo, clie.fechmora, clie.estadocliente
        FROM datahard clie
        INNER JOIN dataphone ph
        ON (clie.document = ph.document)
        GROUP BY clie.saldoactivo
        ORDER BY clie.razonsocial
        LIMIT 0,5000";
$stringRpt = "";
$responsefinal = "(";
$resultPers = $conn->query($queryPersonPhone);
if ($resultPers) {
    while ($obj = $resultPers->fetch_object()) {
        if($count == 1){
            $compare = $obj = "";
        }else{
            
        }
        $queryDataHart = "SELECT ph.numphone
            FROM dataphone ph
            WHERE clie.document IN '".$obj->document."'
            LIMIT 0,10;";
        $resultDataHard = $conn->query($queryDataHart);
        if($resultDataHard){
            while($obj1 = $resultDataHard->fetch_obj()){
                $responsefinal .= "";
                $stringRpt .= "$obj1->codprodcliente - $obj1->saldoactivo - $obj1->fechmora <br/>";
            }            
        }
        $count++;
        $resultPers->close();        
    }
    $newpre = rtrim($personQuery, ",");
    $newpre .= ")";
    $resultPers->close();
}


$resultDataHard = $conn->query($queryDataHart);
if($resultDataHard){
    while($obj = $resultDataHard->fetch_object()){
        
    }
}
$queryDataHard = "";




/*
 * SELECT clie.glosaname, clie.address, clie.document, ph.numphone
FROM person clie
INNER JOIN dataphone ph
ON (clie.document = ph.document)
ORDER BY clie.glosaname
LIMIT 0,5000;
 * 
 * CONTRASEÑA
 * ------------
 * VTIBURCIO
cUUOVQN9plR9E/
 * https://simpletrust.com.ar/defaultAdmin.aspx
 * 
 * 
 * 
 */
?>

<pre><?php echo  var_dump($queryDataHart);?></pre>