<?php
namespace main\db;

use main\db\Connect;

class Add extends Connect
{
	// 插入语句处理
	public function sql($arr)
	{
		$table = $this -> table;
		$keys = '`' . join('`, `', array_keys($arr)) . '`';
   		$val = '\'' . join('\',\'', array_values($arr)) . '\'';
   		$sql = "INSERT INTO {$table} (id, {$keys}) VALUES (null, {$val});";
   		return $sql;
	}

	// 插入一条
	public function insert($arr)
	{
		$sql = $this -> sql($arr);
		$conn = $this -> conn();
   		$result = $conn -> query($sql);
   		return $result;
	}

	// 插入多条数据
	public function insertAll($arr)
	{
		$sql = '';
		foreach ($arr as $key) {
			$sql .= $this -> sql($key);
		}
		$conn = $this -> conn();
   		$result = $conn -> multi_query($sql);
		return $result;
	}

	// 插入并返回id
	public function insertGetId($arr)
	{
		$sql = $this -> sql($arr);
   		$conn = $this -> conn();
   		$result = $conn -> query($sql);
		$id = $conn -> insert_id;
		return $id;
	}
}