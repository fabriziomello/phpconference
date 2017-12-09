<?php
	$dbconn = pg_connect("host=localhost port=5432 user=phpconference dbname=phpconference password=phpconference");

	pg_query($dbconn, 'LISTEN chat_room_1;');

	while (1) {
		$notify = pg_get_notify($dbconn);
		if (!$notify) {
			echo "No messages\n";
		} else {
			print_r($notify);
		}
		sleep(1);
	}
	
?>

