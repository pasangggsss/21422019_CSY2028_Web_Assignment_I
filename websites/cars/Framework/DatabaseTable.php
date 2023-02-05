<?php
namespace Framework;
class DatabaseTable {
	private $table;
	private $primaryKey;
	private $entityClass;
	private $entityConstructor;
	public $ar = false;
     
	public function __construct($table, $primaryKey = 'id', $entityClass = 'stdclass', $entityConstructor = []) {
		$this->table = $table;
		$this->primaryKey = $primaryKey;
		$this->entityClass = $entityClass;
		$this->entityConstructor = $entityConstructor;
	}

	public function setHidable() {
		$this->ar = true;
		return $this;
	}

	public function find($field, $value) {
		$s = 'SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value';
		if($this->ar) {
			$s .= ' and hidden = 0';
		}

		$smt = protected_domination_object_var->prepare($s);
		$smt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);
		$variables = [
			'value' => $value
		];
		$smt->execute($variables);

		return $smt->fetchAll();
	}

	public function findAllhidden() {
		$s = 'SELECT * FROM ' . $this->table;
		if($this->ar) {
			$s .= ' where hidden = 1';
		}
		$smt = protected_domination_object_var->prepare($s);
		$smt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);

		$smt->execute();

		return $smt->fetchAll();
	}

	public function executeQuery($query) {
		$smt = protected_domination_object_var->prepare($query);
		$smt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);

		$smt->execute();

		return $smt->fetchAll();
	}

	public function findAll() {
		$s = 'SELECT * FROM ' . $this->table;
		if($this->ar) {
			$s .= ' where hidden = 0';
		}
		$smt = protected_domination_object_var->prepare($s);
		$smt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);

		$smt->execute();

		return $smt->fetchAll();
	}

	public function insert($record) {
	        $keys = array_keys($record);

	        $values = implode(', ', $keys);
	        $valuesWithColon = implode(', :', $keys);

	        $query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';

	        $smt = protected_domination_object_var->prepare($query);

	        $smt->execute($record);
	}

	public function delete($id) {
		$smt = protected_domination_object_var->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $this->primaryKey . ' = :id');
		$variables = [
			'id' => $id
		];
		$smt->execute($variables);
	}


	public function save($record) {
		try {
			$this->insert($record);
		}
		catch (\Exception $e) {
			$this->update($record);
		}
	}

	public function hide($id) {
		if($this->ar) {
			$this->update(['id'=>$id, 'hidden'=>1]);
		}
	}

	public function set_visible($id) {
		if($this->ar) {
			$this->update(['id'=>$id, 'hidden'=>0]);
		}
	}

	public function update($record) {

	         $query = 'UPDATE ' . $this->table . ' SET ';

	         $parameters = [];
	         foreach ($record as $key => $value) {
	                $parameters[] = $key . ' = :' .$key;
	         }

	         $query .= implode(', ', $parameters);
	         $query .= ' WHERE ' . $this->primaryKey . ' = :primaryKey';

	         $record['primaryKey'] = $record[$this->primaryKey];

	         $smt = protected_domination_object_var->prepare($query);

	         $smt->execute($record);
	}

}