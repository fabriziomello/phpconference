<?php
	error_reporting(E_ALL ^ E_WARNING); 

	// Try to connect to database 'phpconference'
	$dbconn = pg_connect("user=phpconference dbname=phpconference host=localhost password=phpconference port=5432");

	$query = "WITH rnd AS (SELECT random()*5 AS n) SELECT pg_sleep(n), n, 'Some string' FROM rnd";
	$secs = 0;

	if (!pg_connection_busy($dbconn)) {
		$sent = pg_send_query($dbconn, $query);

		while (pg_connection_busy($dbconn)) {
			$secs++;
			echo "Waiting $secs seconds ...\n";
			sleep(1);
		}

		$result = pg_get_result($dbconn);
		var_dump(pg_fetch_row($result));
	}
?>
