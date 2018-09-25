<?PHP
// ###################### CONFIG ########################
$mysqlhost = '127.0.0.1';
$mysqluser = 'root';
$mysqlpass = '';
$mysqldatabase = 'rdct-audit';

// loads #####POT mainfile#####
	include('pot/OTS.php');
// PDO and POT connects to database
	$ots = POT::getInstance();
	//connect to MySQL database
	try	{
		$ots->connect(POT::DB_MYSQL, array('host' => $mysqlhost, 'user' => $mysqluser, 'password' => $mysqlpass, 'database' => $mysqldatabase) );
	}
	catch(PDOException $error){
		echo 'N達o foi possivel conectar no banco de dados, comunique o desenvolvedor contato@elquer.com. Obrigado.';
		exit;
	}
$SQL = POT::getInstance()->getDBHandle();


?>
