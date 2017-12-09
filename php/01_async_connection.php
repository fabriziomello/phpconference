<?php
	error_reporting(E_ALL ^ E_WARNING); 

	// Try to connect to database 'phpconference'
	$dbconn = pg_connect("user=phpconference dbname=phpconference host=localhost password=phpconference port=5432", PGSQL_CONNECT_ASYNC);

	// Wait for connection ... 
	// @TODO: implement some timeout
	while ( pg_connect_poll($dbconn) <> PGSQL_POLLING_OK ) {
		echo "Waiting for connection ...\n";
		usleep(100000);
	} 

	echo "Connected ...\n";
?>
