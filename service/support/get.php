<?php
	require_once('service/db/connect.php');

	if ($stmt = $conn->prepare("SELECT question, answer FROM support WHERE answer is not null")) {
		$stmt->execute();

		/* bind result variables */
		$result = $stmt->get_result();

		while ($row = $result->fetch_assoc()) {
			// use your $myrow array as you would with any other fetch
			printf(
				"<div class=\"col m3 s12\">
						<article class=\"box\">
							<p>Klausimas: %s</p>
							<p>Atsakymas: %s</p>
						</article>
					</div>", $row["question"], $row["answer"]
			);
		}
		/* close statement */
		$stmt->close();
	}
	
	require_once('service/db/disconnect.php');
?>