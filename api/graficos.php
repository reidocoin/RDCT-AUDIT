<?php
include ('../config-and-functions.php');

// Remove cabeçalhos anteriores
header_remove();
// Força cache no browser
header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
// Define o tipo de resposta como JSON
header('Content-Type: application/json');

$dados = array();

foreach( $SQL->query('SELECT * FROM ' . $SQL->tableName('graficos') . ' ORDER BY ' . $SQL->fieldName('timestamp') . ' ASC LIMIT 90')->fetchAll() as $ponto)
{
		$dados[] = json_decode($ponto['dados']);
}

echo json_encode($dados);
?>
