<?php
namespace main\db;

use main\db\Connect;

class Delete extends Connect
{
	// 删除语句处理
	public function sql($arr)
	{
		$table = $this -> table;
		$where = "WHERE 1 = 1";
		if($arr != null){
			$this -> where($arr);
			$where = $this -> whereStr;
		}
		$sql = "DELETE FROM {$table} {$where}";
	   	return $sql;
	}

	// 删除数据
	public function delete($arr = null)
	{
		$sql = $this -> sql($arr);
		$conn = $this -> conn();
   		$result = $conn -> query($sql);
   		return $result;
	}
}