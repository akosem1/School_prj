<?php 

class Fetcher {
	private $table_name;
	private $tables = ['courses'];

	private function setTableName($table_name) {
		if (in_array($table_name, $this->tables)) {
			$this->table_name = $table_name;
		} 
	}

	public function fetch($table_name) {
		$this->setTableName($table_name);
		$connection = new mysqli('localhost', 'root', '', 'schoolb');
		if ($connection->errno) {echo $connection->error;die();}

		$result_set = $connection->query('SELECT id' . ($this->table_name !== 'classes' ? ', name' : '') . ' FROM ' . $this->table_name);
		$result = [];
		while ($row = $result_set->fetch_assoc()) {
			$result []= $row;
		}
		return $result;
	}
	
}