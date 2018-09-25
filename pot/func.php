<?php

function googleCharts ( $largura, $altura, $tipo, $arrays, $titulo="" ) {

        

        # ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ #

        # FunÃ§Ã£o criada por Leonardo Pereira ( dantetekanem[at]hotmail[dot]com ) #

        # CrÃ©ditos: Google Charts API - http://chart.apis.google.com/                   #

        # Meu site: http://www.leonardopereira.pt.to/                                                   #

        # ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ #

        

                $base_url = "http://chart.apis.google.com/chart?";

                

                $base_url .= "chs=$largura"."x"."$altura";

                

                $tipos = array (

                        'pizza' => 'p',

                        'pizza3d' => 'p3',

                        'linha' => 'lc',

                        'onda' => 'ls',

                        'barra_h' => 'bhs',

                        'barra_v' => 'bvs'                      

                );

                

                $base_url .= "&cht=".$tipos[$tipo];

                

                $base_url .= ($titulo=="") ? "" : "&chtt=".urlencode($titulo);

                

                foreach ( $arrays as $nome => $valor ) {

                

                        $chd[] = urlencode($valor);

                        $chl[] = urlencode($nome." ($valor)");

                

                }

                

                $base_url .= "&chd=t:".join(",",$chd);

                $base_url .= "&chl=".join("|",$chl);

                $base_url .= "&chdl=".join("|",$chl);

				$base_url .= "&chco=FF0000|003333|0000FF|330000|003300|000033|FFFF33";

                return $base_url;

        

        }



function abreviar_nome ($nome){// divide o nome pelo espaço entre os mesmos

$partes_nome  = explode (" ",trim($nome));// pega o total de palavras do nome

$total = count($partes_nome);

$vetor_ignora     = array('de', 'da', 'das', 'do', 'dos');



foreach ($partes_nome as $indice =>$palavras){



  // nao permite que seja abreviado o primeiro, nem o ultimo nome  

  if ($indice!=0 and $indice!=($total-1) )      // verifica se 'de', 'do' ou otras ligações estão presentes no nome      

  	if (in_array($palavras,$vetor_ignora)){          

		$nome_abrv .= " ".$palavras;                

	}else{                    

		$nome_abrv.= " ". strtoupper(substr($palavras,0,1)).".";                

	}



}



$abreviado = ucfirst($partes_nome[0])." ".$nome_abrv." ".ucfirst($partes_nome[$total-1]);



return $abreviado;



}



function getTotalFichas($id){

$countFicha = 0;

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE id_sind = "'.$id.'"');

	foreach($nomeUsers as $nomeUser){

		$countFicha++;

	}

	return $countFicha;

}

function getFichasPaga($id){

$countFicha = 0;

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Pago" and id_sind = "'.$id.'"');

	foreach($nomeUsers as $nomeUser){

		$countFicha++;

	}

	return $countFicha;

}

function getFichasEmDia($id){

$countFicha = 0;

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Em Dia" and id_sind = "'.$id.'"');

	foreach($nomeUsers as $nomeUser){

		$countFicha++;

	}

	return $countFicha;

}

function getFichasEmnegociacao($id){

$countFicha = 0;

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Em negociacao" and id_sind = "'.$id.'"');

	foreach($nomeUsers as $nomeUser){

		$countFicha++;

	}

	return $countFicha;

}

function getFichasNaoLocalizado($id){

$countFicha = 0;

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Nao Localizado" and id_sind = "'.$id.'"');

	foreach($nomeUsers as $nomeUser){

		$countFicha++;

	}

	return $countFicha;

}

function getFichasNaoImpressas($id){

$countFicha = 0;

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Em negociacao" and id_sind = "'.$id.'"');

	foreach($nomeUsers as $nomeUser){

		$countFicha++;

	}

	return $countFicha;

}

function getFichasBaixada($id){

$countFicha = 0;

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Baixada" and id_sind = "'.$id.'"');

	foreach($nomeUsers as $nomeUser){

		$countFicha++;

	}

	return $countFicha;

}

function getFichasOutroSindicato($id){

$countFicha = 0;

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Outro Sindicato"  and id_sind = "'.$id.'"');

	foreach($nomeUsers as $nomeUser){

		$countFicha++;

	}

	return $countFicha;

}

function getFichasNegasePagar($id){

$countFicha = 0;

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Nega-se a pagar" and id_sind = "'.$id.'"');

	foreach($nomeUsers as $nomeUser){

		$countFicha++;

	}

	return $countFicha;

}



############################# NEGOCIADOR COUNT ######################


function getTotalFichasNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE cobuserid = "'.$id.'"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}
function getFichasPagaNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Pago" and cobuserid = "'.$id.'"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}
function getFichasEmDiaNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Em Dia" and cobuserid = "'.$id.'"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}
function getFichasEmnegociacaoNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Em negociacao" and cobuserid = "'.$id.'"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}
function getFichasNaoLocalizadoNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Nao Localizado" and cobuserid = "'.$id.'"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}
function getFichasNaoImpressasNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Em negociacao" and cobuserid = "'.$id.'"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}

function getFichasBaixadaNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Baixada" and cobuserid = "'.$id.'"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}

function getFichasOutroSindicatoNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Outro Sindicato"  and cobuserid = "'.$id.'"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}

function getFichasNegasePagarNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Nega-se a pagar" and cobuserid = "'.$id.'"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}

################################




############################# NEGOCIADOR POSICAO COUNT ######################
function getFichasRecadoNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Em negociacao" and cobuserid = "'.$id.'" and posicao = "Recado"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}
function getFichasSemcontatoNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Em negociacao" and cobuserid = "'.$id.'" and posicao = "Sem contato"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}
function getFichasPesquisaNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Em negociacao" and cobuserid = "'.$id.'" and posicao = "Pesquisa"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}


		

function getFichasBoletoNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Em negociacao" and cobuserid = "'.$id.'" and posicao = "boleto/guia"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}
function getFichasDepositoNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Em negociacao" and cobuserid = "'.$id.'" and posicao = "Deposito"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}

			
			
function getFichasChequeNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Em negociacao" and cobuserid = "'.$id.'" and posicao = "Cheque"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}

function getFichasDevolucaoNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Em negociacao" and cobuserid = "'.$id.'" and posicao = "Devolucao"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}

		
function getTotalNegaseNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Em negociacao" and cobuserid = "'.$id.'" and posicao = ""');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}

function getTotalEmailNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Em negociacao" and cobuserid = "'.$id.'" and posicao = "E-mail enviado"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}
function getTotalVisitaNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Em negociacao" and cobuserid = "'.$id.'" and posicao = "Visita"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}
function getTotalAgendaeNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Em negociacao" and cobuserid = "'.$id.'" and posicao = "Agenda"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}

function getFichasCasoNovoNeg($id){
$countFicha = 0;
$SQL = $GLOBALS['SQL'];
$nomeUsers = $SQL->query('SELECT id FROM fichas WHERE status = "Em negociacao" and cobuserid = "'.$id.'" and posicao = "Caso Novo"');
	foreach($nomeUsers as $nomeUser){
		$countFicha++;
	}
	return $countFicha;
}
################################

function regraTipo($tipo){

if($tipo == 'C'){

	return 'Cidade';

}elseif($tipo == 'D'){

	return 'Data / Ano';	

}else{

	return 'PadrÃ£o';

}





}





//Valida Email?

function checkMail($email){

	$ok = "/[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,4}/";

	return (preg_match($ok, $email))? true: false;

}

function validarNumero($numero) {
	if(is_numeric($numero)) {
		return TRUE;
	}
	return FALSE;
}


//Valida Senha?

function checkPassword($pass){

	$temp = strspn("$pass", "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890");

	if ($temp != strlen($pass)) {

		return false;

	}else{

		$ok = "/[a-zA-Z0-9]{1,40}/";

		return (preg_match($ok, $pass))? true: false;

	}

}





function nomeUser($name){

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT * FROM usuarios WHERE id = "'.$name.'"');

	foreach($nomeUsers as $nomeUser){

		return $nomeUser['name'];

	}

}

function nomeSindicato($name){

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT SINDICATO FROM sindicatos WHERE id = "'.$name.'"');

	foreach($nomeUsers as $nomeUser){

		return $nomeUser['SINDICATO'];

	}

}

function infoSindicato($name){

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT * FROM sindicatos WHERE id = "'.$name.'"');

	foreach($nomeUsers as $nomeUser){

		return array($nomeUser['sindicato'], $nomeUser['endereco'], $nomeUser['cidade'], $nomeUser['telefone']);

	}

}



function getLigacoes($telefone, $celular){

$countFone = 0;

$telefoneL = str_replace(array("(", ")", "-"), "", $telefone);

$celularL = str_replace(array("(", ")", "-"), "", $celular);



if(empty($telefoneL)) {

$telefoneL = 'erro';

}

if(empty($celularL)) {

$celularL = 'erro';

}

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT * FROM embratel WHERE tel_destino = "'.$telefoneL.'" or tel_destino = "'.$celularL.'"  ');

	foreach($nomeUsers as $nomeUser){

		$countFone++;

	}

	return $countFone;

}













function moeda($get_valor) {

		$source = array('.', ','); 

		$replace = array('', '.');

		$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto

		return $valor; //retorna o valor formatado para gravar no banco

}

function converteDataTime($dt) { 
    $yr=strval(substr($dt,0,4)); 
    $mo=strval(substr($dt,5,2)); 
    $da=strval(substr($dt,8,2)); 
    $hr=strval(substr($dt,11,2)); 
    $mi=strval(substr($dt,14,2)); 
    $se=strval(substr($dt,17,2)); 	
    return date("d/m/Y H:i:s", mktime ($hr,$mi,$se,$mo,$da,$yr)); 
} 

function valida_data($data)

{

        $data = split("[-,/]", $data);

        if(!checkdate($data[1], $data[0], $data[2]) and !checkdate($data[1], $data[2], $data[0])) {

                return false;

        }

        return true;

}



function  converteData($data)

{

        if(valida_data($data)) {

                return implode(!strstr($data, '/') ? "/" : "-", array_reverse(explode(!strstr($data, '/') ? "-" : "/", $data)));

        }       

}





function getAssistencial($id, $ano){

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT * FROM contribuicoes WHERE id_ficha = "'.$id.'" and ano = "'.$ano.'" and tipo = "sindical"');

	foreach($nomeUsers as $nomeUser){

		return $nomeUser['valor'];

	}

}

function getAssistencialPartI($id, $ano){

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT * FROM contribuicoes WHERE id_ficha = "'.$id.'" and ano = "'.$ano.'" and tipo = "assistencialpart1"');

	foreach($nomeUsers as $nomeUser){

		return $nomeUser['valor'];

	}

}









function getAssistencialPartII($id, $ano){

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT * FROM contribuicoes WHERE id_ficha = "'.$id.'" and ano = "'.$ano.'" and tipo = "assistencialpart2"');

	foreach($nomeUsers as $nomeUser){

		return $nomeUser['valor'];

	}

}



function getConfederativa($id, $ano){

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT * FROM contribuicoes WHERE id_ficha = "'.$id.'" and ano = "'.$ano.'" and tipo = "confederativa"');

	foreach($nomeUsers as $nomeUser){

		return $nomeUser['valor'];

	}

}





############################### COMPROVANTES ##########################



function getAssistencialComprovante($id, $ano){

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT * FROM contribuicoes WHERE id_ficha = "'.$id.'" and ano = "'.$ano.'" and tipo = "sindical"');

	foreach($nomeUsers as $nomeUser){

		if(!empty($nomeUser['comprovante'])){

		return '<a href="'.$nomeUser['comprovante'].'" target="_blank"> <img src="../comprovantes/icon.jpg" border="0" width="12" />';

		}

	}

}







function getAssistencialPartIComprovante($id, $ano){

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT * FROM contribuicoes WHERE id_ficha = "'.$id.'" and ano = "'.$ano.'" and tipo = "assistencialpart1"');

	foreach($nomeUsers as $nomeUser){

		if(!empty($nomeUser['comprovante'])){

		return '<a href="'.$nomeUser['comprovante'].'" target="_blank"> <img src="../comprovantes/icon.jpg" border="0" width="12" />';

		}

	}

}





function getAssistencialPartIIComprovante($id, $ano){

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT * FROM contribuicoes WHERE id_ficha = "'.$id.'" and ano = "'.$ano.'" and tipo = "assistencialpart2"');

	foreach($nomeUsers as $nomeUser){

		

		if(!empty($nomeUser['comprovante'])){

			return '<a href="'.$nomeUser['comprovante'].'" target="_blank"> <img src="../comprovantes/icon.jpg" border="0" width="12" />';

		}

	}

}

function getConfederativaComprovante($id, $ano){

$SQL = $GLOBALS['SQL'];

$nomeUsers = $SQL->query('SELECT * FROM contribuicoes WHERE id_ficha = "'.$id.'" and ano = "'.$ano.'" and tipo = "confederativa"');

	foreach($nomeUsers as $nomeUser){

		

		if(!empty($nomeUser['comprovante'])){

			return '<a href="'.$nomeUser['comprovante'].'" target="_blank"> <img src="../comprovantes/icon.jpg" border="0" width="12" />';

		}

	}

}



################### FINAL COMPROVANTES ###################





function getFormatErroTelefone(){

$SQL = $GLOBALS['SQL'];

$FormatErroTelefone = $SQL->query('SELECT * FROM fichas ');

	foreach($FormatErroTelefone as $FormatErroT){

		if(strlen($FormatErroT['telefone']) != 13 ){

			$erro++	;

		}

	}	

	return 	$erro	;

}

function getFormatErroEmail(){

$SQL = $GLOBALS['SQL'];

$FormatErroEmail = $SQL->query('SELECT * FROM fichas ');

	foreach($FormatErroEmail as $FormatErroM){



		

		if(checkMail($FormatErroM['email']) == TRUE ){

			$erro++	;

		}

	}	

	return 	$erro	;

}







function getBrancoErroTelefone(){

$SQL = $GLOBALS['SQL'];

$FormatErroTelefone = $SQL->query('SELECT * FROM fichas ');

	foreach($FormatErroTelefone as $FormatErroT){

		if(empty($FormatErroT['telefone'])){

			$erro++	;

		}

	}	

	return 	$erro	;

}





class validar{

	

function replace($string){

	return $string = str_replace("/","", str_replace("-","",str_replace(".","",$string)));

}



function check_fake($string, $length){

	for($i = 0; $i <= 9; $i++) {

		$fake = str_pad("", $length, $i);

		if($string === $fake)

			return(1);

		}

}



function cpf($cpf){

	$cpf = $this->replace($cpf);

	$cpf = trim($cpf);

	if(empty($cpf) || strlen($cpf) != 11)

		return FALSE;

	else{

		if($this->check_fake($cpf, 11))

		return FALSE;

	else{

		$sub_cpf = substr($cpf, 0, 9);

		for($i = 0; $i <= 9; $i++) {

			$dv += ($sub_cpf[$i] * (10-$i));

	}

	if($dv == 0)

		return FALSE;

		$dv = 11 - ($dv % 11);

		if($dv > 9)

			$dv = 0;

			if($cpf[9] != $dv)

				return FALSE;

				$dv *= 2;

				for($i = 0; $i <= 9; $i++) {

					$dv += ($sub_cpf[$i] * (11-$i));

				}

				$dv = 11 - ($dv % 11);

				if($dv > 9)

					$dv = 0;

					if($cpf[10] != $dv)

						return FALSE;

					return TRUE;

					}

				}

			}



function cnpj($cnpj)

{

$cnpj = $this->replace($cnpj);

$cnpj = trim($cnpj);

if(empty($cnpj) || strlen($cnpj) != 14)

return FALSE;

else{

if($this->check_fake($cnpj, 14))

return FALSE;

else{

$rev_cnpj = strrev(substr($cnpj, 0, 12));

for($i = 0; $i <= 11; $i++) {

$i == 0 ? $multiplier = 2 : $multiplier;

$i == 8 ? $multiplier = 2 : $multiplier;

$multiply = ($rev_cnpj[$i] * $multiplier);

$sum = $sum + $multiply;

$multiplier++;

}

$rest = $sum % 11;

if($rest == 0 || $rest == 1)

$dv1 = 0;

else

$dv1 = 11 - $rest;



$sub_cnpj = substr($cnpj, 0, 12);

$rev_cnpj = strrev($sub_cnpj.$dv1);

unset($sum);

for($i = 0; $i <= 12; $i++) {



$i == 0 ? $multiplier = 2 : $multiplier;

$i == 8 ? $multiplier = 2 : $multiplier;

$multiply = ($rev_cnpj[$i] * $multiplier);

$sum = $sum + $multiply;

$multiplier++;

}

$rest = $sum % 11;

if($rest == 0 || $rest == 1)

$dv2 = 0;

else

$dv2 = 11 - $rest;



if($dv1 == $cnpj[12] && $dv2 == $cnpj[13])

return TRUE;

else

return FALSE;

}

}

}

}









############ FUNÃ‡Ã”ES DE FICHAS  ###############
function getFichaID($cnpj){
$SQL = $GLOBALS['SQL'];
$infoFichas = $SQL->query('SELECT id FROM fichas WHERE cnpj = "'.$cnpj.'"');
	foreach($infoFichas as $infoFicha){
		return $infoFicha['id'];
	}
}


function infoFicha($name){
$SQL = $GLOBALS['SQL'];
$infoFichas = $SQL->query('SELECT * FROM fichas WHERE id = "'.$name.'"');
	foreach($infoFichas as $infoFicha){
		return array($infoFicha['empresa'], $infoFicha['id_sind'], $infoFicha['cnpj'], $infoFicha['municipio']);
	}
}


function getEmpresaFichas($id){
$SQL = $GLOBALS['SQL'];
$getEmpresaFichas = $SQL->query('SELECT empresa FROM fichas WHERE id = "'.$id.'"');
	foreach($getEmpresaFichas as $getEmpresaF){
		return $getEmpresaF['empresa'];
	}
}



function comissaoPorcentUser($usuario){

	$SQL = $GLOBALS['SQL'];

$infoFichas = $SQL->query('SELECT * FROM usuarios WHERE id = "'.$usuario.'"');

	foreach($infoFichas as $infoFicha){

		return $infoFicha['comissao'];

	}

	

}

function comissaoUser($valor, $usuario){



  $valor = $valor; // valor do produto

  $porcent = comissaoPorcentUser($usuario)/100; // 5%  

  $comissao = $porcent * $valor;

 return $comissao; 	

}



function existContrib($ficha,$tipo,$periodo){

		$SQL = $GLOBALS['SQL'];

$existFichas = $SQL->query('SELECT * FROM contribuicoes WHERE  id_ficha = "'.$ficha.'" and tipo = "'.$tipo.'" and ano = "'.$periodo.'"');

	foreach($existFichas as $existFicha){

		return TRUE;

	}

	

	return FALSE;

}
function existCnpj($cnpj){
	$SQL = $GLOBALS['SQL'];
	$existCnpjs = $SQL->query('SELECT cnpj FROM fichas WHERE  cnpj = "'.$cnpj.'" ');
	foreach($existCnpjs as $existCnpj){
		return TRUE;
	}
	return FALSE;
}

function existCpf($cpf){
	$SQL = $GLOBALS['SQL'];
	$existCnpjs = $SQL->query('SELECT cpf FROM fichas WHERE  cpf = "'.$cpf.'" ');
	foreach($existCnpjs as $existCnpj){
		return TRUE;
	}
	return FALSE;
}



function periodoContrib($id){

		$SQL = $GLOBALS['SQL'];

$anoFichas = $SQL->query('SELECT ano FROM contribuicoes WHERE  id ="'.$id.'" ');

	foreach($anoFichas as $anoFicha){

		return $anoFicha['ano'];

	}

	

	return FALSE;

}

function contribFormTipo($id){

		$SQL = $GLOBALS['SQL'];

$anoFichas = $SQL->query('SELECT formapag,tipo,ano FROM contribuicoes WHERE  id ="'.$id.'"  ');

	foreach($anoFichas as $anoFicha){

		return array($anoFicha['formapag'], $anoFicha['tipo'], $anoFicha['ano']);

	}

	

	return FALSE;

}

############# REGRAS PAGAMENTO STANDER ###############

function getRegraNameMunicipio($regraname, $id_sind){

$SQL = $GLOBALS['SQL'];

$getTipoRegra = $SQL->query('SELECT * FROM comissao_sind WHERE regra_nome = "'.$regraname.'" and sind_id = "'.$id_sind.'"');

	foreach($getTipoRegra as $getTipo){

		return TRUE;

	}

	return FALSE;	

}





function getTipoRegra($idsind){

$SQL = $GLOBALS['SQL'];

$getTipoRegra = $SQL->query('SELECT * FROM comissao_sind WHERE sind_id = "'.$idsind.'"');

	foreach($getTipoRegra as $getTipo){

		return $getTipo['regra_tipo'];

	}

}







function getValorComissaoCidade($regraname, $id_sind){

$SQL = $GLOBALS['SQL'];

$getTipoRegra = $SQL->query('SELECT * FROM comissao_sind WHERE regra_nome = "'.$regraname.'" and sind_id = "'.$id_sind.'"');

	foreach($getTipoRegra as $getTipo){

		return array($getTipo['sindicalprincipal'] , $getTipo['sindicaljuros'] , $getTipo['assistencialprincipal'] , $getTipo['assistencialjuros'] , $getTipo['confederativaprincipal'] , $getTipo['confederativajuros']);

	}

}



function infoMunicipioFicha($idsind){

$SQL = $GLOBALS['SQL'];

$infoMunicipio = $SQL->query('SELECT * FROM fichas WHERE id = "'.$idsind.'"');

	foreach($infoMunicipio as $infoM){

		return $infoM['municipio'];

	}

}



function getValorComissaoData($id){

$SQL = $GLOBALS['SQL'];

$getTipoRegra = $SQL->query('SELECT * FROM comissao_sind WHERE id = "'.$id.'" ');

	foreach($getTipoRegra as $getTipo){

		return array($getTipo['sindicalprincipal'] , $getTipo['sindicaljuros'] , $getTipo['assistencialprincipal'] , $getTipo['assistencialjuros'] , $getTipo['confederativaprincipal'] , $getTipo['confederativajuros']);

	}

}

function getValorComissaoPadrao($id_sind){

$SQL = $GLOBALS['SQL'];

$getTipoRegra = $SQL->query('SELECT * FROM comissao_sind WHERE sind_id = "'.$id_sind.'"');

	foreach($getTipoRegra as $getTipo){

		return array($getTipo['sindicalprincipal'] , $getTipo['sindicaljuros'] , $getTipo['assistencialprincipal'] , $getTipo['assistencialjuros'] , $getTipo['confederativaprincipal'] , $getTipo['confederativajuros']);

	}

}







function getGanhoUserMes($id){

$totalGanhoMes = 0.00;

$SQL = $GLOBALS['SQL'];

$getGanhoUserMes = $SQL->query('SELECT * FROM paguser WHERE iduser = "'.$id.'" and month(datapag)= "'.date('m').'" and year(datapag)= "'.date('Y').'" ');

	foreach($getGanhoUserMes as $getGanhoUserM){



	$totalGanhoMes = $totalGanhoMes+$getGanhoUserM['valorganho'];



	}

	return $totalGanhoMes;

}

function getGanhoUserAno($id){

$totalGanhoAno = 0.00;

$SQL = $GLOBALS['SQL'];

$getGanhoUserAno = $SQL->query('SELECT * FROM paguser WHERE iduser = "'.$id.'" and month(datapag)= "'.date('m').'" and year(datapag)= "'.date('Y').'" ');

	foreach($getGanhoUserAno as $getGanhoUserA){



	$totalGanhoAno = $totalGanhoAno+$getGanhoUserA['valorganho'];



	}

	return $totalGanhoAno;

}



function getGanhoUserTotal($id){

$totalGanhoTotal = 0.00;

$SQL = $GLOBALS['SQL'];

$getGanhoUserTotal = $SQL->query('SELECT * FROM paguser WHERE iduser = "'.$id.'" and month(datapag)= "'.date('m').'" and year(datapag)= "'.date('Y').'" ');

	foreach($getGanhoUserTotal as $getGanhoUserT){



	$totalGanhoTotal = $totalGanhoTotal+$getGanhoUserT['valorganho'];



	}

	return $totalGanhoTotal;

}





##########################<br />Funçoes alerta ######################################

function getAlerta($user_id){

$SQL = $GLOBALS['SQL'];

$getAlertas = $SQL->query('SELECT * FROM alerta WHERE destinatario = "'.$user_id.'"');

	foreach($getAlertas as $getAlerta){

		return array($getAlerta['id'], $getAlerta['titulo'], $getAlerta['user_id'], $getAlerta['tarefa'], $getAlerta['cad_data'], $getAlerta['ativo'], $getAlerta['destinatario']);

	}

}



function setAlerta($titulo, $tarefa,$user_id,$destinatario,$data){

	$SQL = $GLOBALS['SQL'];

	$SQL->query('SET character_set_client=utf8');	

	$setAlerta = $SQL->query('INSERT INTO alerta (id, titulo, user_id, tarefa, cad_data, destinatario,data_exib) VALUE (NULL, "'.$titulo.'", "'.$user_id.'", "'.$tarefa.'", NOW(), "'.$destinatario.'", "'.converteData($data).'")');

	if($setAlerta){

		return TRUE;

	}

	return FALSE;



}

?>