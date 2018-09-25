<?php
include ('../config-and-functions.php');
$data = file_get_contents('https://api.4stake.com/v1/publico/stats');
$data = json_decode($data, true);
$moedas = $data['moedas'];


$cadStakeInfo = $SQL->query('
			INSERT INTO ' . $SQL->tableName('4stakeestatistica') . ' (
				id,
				usuarios,
				mnativos,
				mncaptacao,
				moedas,
				data
			) VALUES (
				NULL, 
				"'.$data["totalUsuarios"].'",
				"'.$data["totalMasternodesAtivos"].'",
				"'.$data["totalMasternodesCaptacao"].'",
				"'.count($data['moedas']).'",
				NOW()
			)');
for ($i = 0; $i <= count($data['moedas']); $i++) {
    $cadStakeInfo = $SQL->query('
			INSERT INTO ' . $SQL->tableName('masternodes') . ' (
				id,
				nome,
				codigo,
				logo,
				masternodes,
				date
			) VALUES (
				NULL, 
				"'.$moedas[$i]["nome"].'",
				"'.$moedas[$i]["codigo"].'",
				"'.$moedas[$i]["logo"].'",
				"'.$moedas[$i]["masternodes"].'",
				NOW()
			)');
}
?>