<?php
include '../db/conextion.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="export-gps-data.txt"');
header("Content-Transfer-Encoding: binary"); 
$array_data[0] = "DNI;NOMBRE;COMENTARIO GENERAL;TELEFONO";
$conn = conn();
$queryExport = "SELECT
        per.document AS dni,
        per.razonsocial AS fullname,
        GROUP_CONCAT(DISTINCT CONCAT(per.codprodcliente, ' ', per.moneda, ' ',
                      per.saldoactivo, ' ', 
                      per.fechmora) 
              ORDER BY per.codprodcliente ASC SEPARATOR ' <br/>') AS commentary,
        ph.numphone AS phone
    FROM
        datahard per,
        dataphone ph
    WHERE
        per.document=ph.document
    GROUP BY
        ph.numphone
    ORDER BY per.razonsocial ASC
    LIMIT 0,5000;";

$result = $conn->query($queryExport);
$i = 1;
if($result){
    while($obj = $result->fetch_object()){
        $array_data[$i] = "$obj->dni;$obj->fullname;$obj->commentary;$obj->phone";
        $i++;
    }
}
$fp = fopen('php://output', 'w');
foreach ($array_data as $line) {
    // though CSV stands for "comma separated value"
    // in many countries (including France) separator is ";"
    fputcsv($fp,explode(';',$line));
}
fclose($fp);


/*
 * SELECT clie.glosaname, clie.address, clie.document, ph.numphone
FROM person clie
INNER JOIN dataphone ph
ON (clie.document = ph.document)
ORDER BY clie.glosaname
LIMIT 0,5000;
 * 
 * 
 * 
 * 
 */
?>

