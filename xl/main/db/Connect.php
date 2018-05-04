<?php
namespace main\db;

use mysqli;

abstract class Connect
{
	// 连接参数
	public static $config = [
		'host'       =>     '127.0.0.1',
		'user'       =>     'root',
		'pass'       =>     '',
		'dbname'     =>     '',
	];
	// 表名储存
	protected $table = '';
	// field语句储存
	protected $fieldStr = null;
	// where语句储存
	protected $whereStr = null;
	// order语句储存
	protected $orderStr = null;
	// limit语句储存
	protected $limitStr = null;

	// 连接数据库
	protected function conn()
	{
		$conn = @new mysqli(self::$config['host'], self::$config['user'], self::$config['pass'], self::$config['dbname']);
		if($conn -> connect_error){
			die('数据库连接失败：' . $conn -> connect_error);
		}
		$conn -> set_charset('utf8');
		return $conn;
	}

	// 处理表名
	public function table($table)
	{
		$this -> table = '`' . $table . '`';
		return $this;
	}

	// 处理联合表名
	public function join($union, $field, $mode = 'INNER')
	{
		$table = $this -> table;
		$this -> table = "{$table} {$mode} JOIN `{$union}` ON {$field}";
		return $this;
	}

	// 处理数据
	public function dataStr($arr)
	{
		$dataStr = null;
		foreach ($arr as $key => $val) {
			$break = ($dataStr == null)? '': ', ';
			$dataStr .= $break . "`{$key}` = `{$val}`";
		}
		return $dataStr;
	}

	// 字段处理
	public function field($string)
	{
		$this -> fieldStr = $string;
		return $this;
	}

	// 处理where语句
	public function where($arr, $expArr = null)
	{
		$str = $this -> whereStr;
		$num = 0;
   		foreach ($arr as $key => $value) {
   			$exp = '=';
   			if($expArr != null){
   				if($num < count($expArr)){
   					$exp = strtoupper($expArr[$num]);
   				}
   				$num++;
   			}
   			$and = ($str == null)? '': ' AND ';
			$str .= $and . "{$key} {$exp} '${value}'";
   		}
   		$this -> whereStr = 'WHERE ' . $str;
   		return $this;
	}

	// order语句处理
	public function order($order)
	{
		$this -> orderStr = "ORDER BY {$order}";
		return $this;
	}

	// limit语句处理
	public function limit($num)
	{
		$this -> limitStr = "LIMIT {$num}";
		return $this;
	}

	// sql语句处理
	public function sql($arr){}

	// 插入一条数据
	public function insert($arr){}

	// 插入多条数据
	public function insertAll($arr){}

	// 插入并返回id
	public function insertGetId($arr){}

	// 删除数据
	public function delete($arr = null){}

	// 更新数据
	public function update($arr){}

	// 更新数据并返回影响行数
	public function affect($arr){}

	// 自增/自减语句处理
	public function setStr($field, $num, $symbol){}

	// 自增一个字段的值
	public function setInc($field, $num = 1){}

	// 自减一个字段的值	
	public function setDec($field, $num = 1){}

	// 查询数据
	public function select(){}

	// 查询数据返回数量
	public function count(){}

	// 分页
	public function page($offset, $pageSize){}

	// 执行完毕关闭连接
	public function __destruct()
	{
		$this -> conn() -> close();
	}
}