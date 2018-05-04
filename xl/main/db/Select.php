<?php
namespace main\db;

use main\db\Connect;

class Select extends Connect
{
	// 查询语句处理
	public function sql()
	{
		$table = $this -> table;
		$field = ($this -> fieldStr != null)? $this -> fieldStr: '*';
		$where = ($this -> whereStr != null)? $this -> whereStr: '';
		$order = ($this -> orderStr != null)? $this -> orderStr: '';
		$limit = ($this -> limitStr != null)? $this -> limitStr: '';
		$sql = "SELECT {$field} FROM {$table} {$where} {$order} {$limit}";
		return $sql;
	}

	// 查询数据
	public function select()
	{
		$sql = $this -> sql();
		$conn = $this -> conn();
   		$data = $conn -> query($sql);
   		$result = null;
   		if($data -> num_rows){
   			foreach ($data as $key) {
   				$result[] = $key;
   			}
   		}
   		return $result;
	}

	// 查询数据返回数量
	public function count()
	{
		$sql = $this -> sql();
		$conn = $this -> conn();
   		$result = $conn -> query($sql);
   		return $result -> num_rows;
	}

	// 分页
	public function page($offset, $pageSize)
	{
		$sql = $this -> sql() . "LIMIT {$offset}, {$pageSize}";
		$conn = $this -> conn();
   		$data = $conn -> query($sql);
   		$result = null;
   		if($data -> num_rows){
   			foreach ($data as $key) {
   				$result[] = $key;
   			}
   		}
   		return $result;
	}
}