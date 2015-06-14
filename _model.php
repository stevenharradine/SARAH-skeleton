<?php
	class ApplicationManager {
		public function getRecord ($id) {
			$sql = <<<EOD
	SELECT *
	FROM `settings`
	WHERE `SETTING_ID`='$id'
EOD;
			$data = mysql_query($sql) or die(mysql_error());
			return mysql_fetch_array( $data );
		}

		public function addRecord ($key, $value) {
			$sql = <<<EOD
	INSERT INTO `sarah`.`settings` (
		`key`,
		`value`
	) VALUES (
		'$key',
		'$value'
	);
EOD;

			return mysql_query($sql) or die(mysql_error());
		}

		public function deleteRecord ($id) {
			$sql = <<<EOD
	DELETE FROM `sarah`.`settings`
	WHERE `SETTING_ID`='$id'
EOD;

			return mysql_query($sql) or die(mysql_error());
		}

		public function getAllRecords () {
			$sql = <<<EOD
	SELECT *
	FROM `settings`
EOD;
			$data = mysql_query($sql) or die(mysql_error());

			return $data;
		}

		public function updateRecord ($id, $key, $value) {
			$sql = <<<EOD
	UPDATE `sarah`.`settings`
	SET `key` = '$key',
		`value` = '$value'
	WHERE `SETTING_ID`='$id'
EOD;
			
			return mysql_query($sql) or die(mysql_error());
		}
	}