<?php
	$dbconn = pg_connect("host=localhost port=5432 user=phpconference dbname=phpconference password=phpconference");

	pg_prepare($dbconn, 'insert_bar', "INSERT INTO bar(a, b, d) VALUES ($1, $2, $3)");

	for($i=1; $i<=10; $i++) {
		echo "Inserting item $i into 'bar' table\n";
		pg_execute($dbconn, 'insert_bar', array($i, "Item $i", $i*2));
	}
?>
