<?php
namespace main\transfers;

class Upload
{
	// 获取带中文的文件名
    private function get_basename($filename){  
        return preg_replace('/^.+[\\\\\\/]/', '', $filename);  
    }

    // 获取扩展名
    private function get_extension($file){
       $arr = explode('.', $file);
	   return end($arr);
	}

	public function file($name, $allowExt = ['jpg, jpeg, png'], $size = 2097152, $path = ROOT_PATH . '/uploads')
	{
		$this -> file = $file = $_FILES[$name];
		if($file['error'] == UPLOAD_ERR_OK){
			if(!is_uploaded_file($file['tmp_name'])){
				$filename = mb_convert_encoding($file['name'], 'gb2312', 'utf8');
				$ext = strtolower($this -> get_extension($filename));
				$destination = $path . "/" . $_SERVER['REQUEST_TIME'] . '.' . $ext;
				if(in_array($ext, $allowExt)){
					if($file['size'] > $size){
						if(is_dir($path)){
							if(move_uploaded_file($fileInfo['tmp_name'], $destination)){
								return '文件上传成功';
							}else{
								return '文件上传失败';
							}
						}else{
							if(mkdir($path, 0777, true)){
								if(move_uploaded_file($fileInfo['tmp_name'], $destination)){
									return '文件上传成功';
								}else{
									return '文件上传失败';
								}
							}else{
								return '文件夹创建失败';
							}
						}
					}else{
						return '超过允许上传大小';
					}
				}else{
					return '非法文件类型';
				}
			}else{
				return '文件不是通过HTTP，POST方式上传上来的';
			}
		}else{
			switch ($file['error']) {
				case 1:
                    return '超过了配置文件的大小';
                    break;
                case 2:
                    return '超过了表单允许接收数据的大小';
                    break;
                case 3:
                    return '文件部分被上传';
                    break;
                case 4:
                    return '没有文件被上传';
                    break;
			}
		}
	}
}