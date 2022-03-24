<?php
// Testmodus aktivieren / deaktivieren
const TESTMODUS = true;

//Funktion zum Verbindungsaufbau
	function db_connect()
	{
		$dbserver 	= "localhost";
		$dbuser 	= "webshop_user";
		$dbpasswort	= "webshop#43";
		$dbname 	= "webshop";
		$dbconn 		= new mysqli($dbserver, $dbuser, $dbpasswort, $dbname);
		if($dbconn->connect_error){
			die("Connection failed:" .$dbconn->connect_error);
		}
		return $dbconn;
	}

//Abfragefunktion mit Verbindungsaufbau
	function db_query($sql)
	{
		//if (TESTMODUS) {echo $sql;}
		$dbconn=db_connect();
		$result=$dbconn->query($sql);
		db_close($dbconn);
		return $result;
	}

		

// Verbindungsabbau
	function db_close($dbconn)
	{
		$dbconn->close();
	}

//Fehlerbehandlung
	function db_fehler($fehler)
	{
		if(TESTMODUS)
		{
			echo
				"Fehler beim MySQL-Befehl " . 
				$fehler . 
				"<li> Fehlernummer errno = " .
				mysql_errno() .
				"<li> Fehlertext error = " .
				mysql_error();
		}
	}
?>