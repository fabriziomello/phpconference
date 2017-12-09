<?php
	$dbconn = pg_connect("host=localhost port=5432 user=phpconference dbname=phpconference password=phpconference");

	pg_query($dbconn, "CREATE TABLE IF NOT EXISTS bar (a INT4, b CHAR(16), d NUMERIC)");

	pg_query($dbconn, "COPY bar FROM stdin");
	pg_put_line($dbconn, "3\thello world\t4.5\n");
	pg_put_line($dbconn, "4\tgoodbye world\t7.11\n");
	pg_put_line($dbconn, "\\.\n");
	pg_end_copy($dbconn);
?>

