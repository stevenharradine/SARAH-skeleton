<?php
	class ApplicationManager {
		private $table = "`sarah`.`$app_title`";
		private $table_key = strtoupper ($application_name) . '_ID';

		public function getRecord ($id) {
			$sql = <<<EOD
	SELECT
		*
	FROM
		$this->table
	WHERE
		`$this->table_key`='$id'
EOD;
			$data = mysql_query($sql) or die(mysql_error());
			return mysql_fetch_array( $data );
		}

		public function addRecord ($key, $value) {
			$sql = <<<EOD
	INSERT INTO $this->table (
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
	DELETE FROM
		$this->table
	WHERE
		`$this->table_key`='$id'
EOD;

			return mysql_query($sql) or die(mysql_error());
		}

		public function getAllRecords () {
			$sql = <<<EOD
	SELECT
		*
	FROM
		$this->table
EOD;
			$data = mysql_query($sql) or die(mysql_error());

			return $data;
		}

		public function updateRecord ($id, $key, $value) {
			$sql = <<<EOD
	UPDATE
		$this->table
	SET
		`key` = '$key',
		`value` = '$value'
	WHERE
		`$this->table_key`='$id'
EOD;
			
			return mysql_query($sql) or die(mysql_error());
		}
	}