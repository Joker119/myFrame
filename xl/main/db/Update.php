<?php
namespace main\db;

use main\db\Connect;

class Update extends Connect
{
	// 更新语句处理
	public function sql($arr)
	{
		$table = $this -> table;
		$dataStr = $this -> dataStr($arr);
		$where = ($this -> whereStr != null)? $this -> whereStr: '';
   		$sql = "UPDATE {$table} SET {$dataStr} {$where}";
   		return $sql;
	}

	// 更新数据
	public function update($arr)
	{
		$sql = $this -> sql($arr);
		$conn = $this -> conn();
   		$result = $conn -> query($sql);
   		return $result;
	}

	// 更新数据并返回影响行数
	public function affect($arr)
	{
		$sql = $this -> sql($arr);
		$conn = $this -> conn();
   		$result = $conn -> query($sql);
		$rows = $conn -> affected_rows;
		return $rows;
	}

	// 自增/自减语句处理
	public function setStr($field, $num, $symbol)
	{
		$table = $this -> table;
		$where = ($this -> whereStr != null)? $this -> whereStr: '';
   		$sql = "UPDATE {$table} SET `{$field}` = `{$field}` {$symbol} {$num} {$where}";
   		return $sql;
	}

	// 自增一个字段的值
	public function setInc($field, $num = 1)
	{
		$sql = $this -> setStr($field, $num, '+');
		$conn = $this -> conn();
   		$result = $conn -> query($sql);
		$rows = $conn -> affected_rows;
		return $rows;
	}

	// 自减一个字段的值
	public function setDec($field, $num = 1)
	{
		$sql = $this -> setStr($field, $num, '-');
		$conn = $this -> conn();
   		$result = $conn -> query($sql);
		return $result;
	}
}