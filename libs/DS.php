<?php
class DS{
    public static function _utf8_encode($arr){
        array_walk_recursive($arr, 'DS::utf8_enc');
        return $arr;
    }

    public static function utf8_enc(&$value, &$key){
        $value = utf8_encode($value);
        $key = utf8_encode($key);
    }
    public static function UTF8_json_encode($array){
		return json_encode(self::_utf8_encode($array,"convert_before_json"));
    }
}
