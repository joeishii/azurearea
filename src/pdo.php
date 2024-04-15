<?
try{	
	//$conn = new PDO("sqlsrv:server = tcp:jawsdb01.database.windows.net,1433; Database = jawsdb02", "jawsdbadmin", "Jaws2018");
	$conn = new PDO("sqlsrv:server = tcp:jappsdb.database.windows.net,1433; Database = japps01", "dbmaster", "Enji2006");
	//$conn = new PDO("sqlsrv:server = tcp:jawsdb01.database.windows.net,1433; Database = jawsdb01", "jawsdbadmin", "Jaws2018");
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch ( PDOException $e ) {
	//print("Error connecting to SQL Server.");
	die(print_r($e));
}