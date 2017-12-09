<?php
	$dbconn = pg_connect("host=localhost port=5432 user=phpconference dbname=phpconference password=phpconference");

	pg_query($dbconn, 'START TRANSACTION;'); // start transaction
	pg_query($dbconn, "DECLARE c CURSOR FOR SELECT i, 'Line '||i FROM generate_series(1, 100) AS i;");

	while( pg_num_rows($result = pg_query($dbconn, 'FETCH 10 FROM c')) > 0 ) {
		while ($row = pg_fetch_row($result)) {
			echo "Row: $row[0], $row[1]\n";
		}
		readline('<enter>');
	} 
	pg_query($dbconn, 'CLOSE c;');
	pg_query($dbconn, 'COMMIT TRANSACTION');
?>
