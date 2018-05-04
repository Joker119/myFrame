<?php
require 'include.php';


// $add -> table('user') -> insert(['name' => '小明']);
// $add -> table('user') -> insertAll([['name' => '小芳', 'sex' => 2], ['name' => '小红', 'sex' => 2]]);
// echo $add -> table('user') -> insertGetId(['name' => '小小']);
//echo $add -> table('user') -> sql(['name' => '小明']);

// $del -> table('user') -> delete(['id' => 3]);
// $del -> table('user') -> delete();
// echo $del -> table('user') -> sql(['id' => 3]);

// $update -> table('user') -> where(['id' => 2]) -> update(['name' => '小丽', 'sex' => '1']);
// $update -> table('user') -> where(['id' => 2]) -> setInc('sex', 2);
// $update -> table('user') -> where(['id' => 3]) -> setDec('sex', 4);
// echo $update -> table('user') -> where(['id' => 2]) -> affect(['name' => '小丽', 'sex' => '3']);
// echo $update -> table('user') -> where(['id' => 1, 'name' => '小号']) -> sql(['name' => '小丽', 'sex' => '0']);

// $result = $select -> table('user') -> where(['name' => '小芳', 'sex' => 2]) -> select();
// $result = $select -> table('user') -> where(['name' => '%小芳%', 'sex' => 1], ['like']) -> select();
// $result = $select -> table('user') -> where(['name' => '小芳', 'sex' => 1]) -> count();
// $result = $select -> table('user') -> join('info', 'user.id = info.uid') -> field('user.name') -> where(['user.id' => 1]) -> select();
// $result = $select -> table('user') -> where(['sex' => 2]) -> page(1, 2);
// echo $result = $select -> table('user') -> where(['name' => '%小红%', 'sex' => 1], ['like']) -> sql();
// echo $result = $select -> table('user') -> order('id DESC, sex') -> sql();
// echo $result = $select -> table('user') -> limit(5) -> sql();
// echo $result = $select -> table('user') -> order('id DESC, sex') -> limit(5) -> sql();
// echo $result = $select -> table('user') -> join('info', 'user.id = info.uid') -> field('user.name') -> where(['user.id' => 1]) -> sql();
// echo json_encode($result);

$upload -> file('test');