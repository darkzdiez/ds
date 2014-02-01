<?php
class DS{
    public static function __callStatic($name, $arguments) {
        $this->$name($arguments);
    }
    public static function logERROR($contenido){
        $nombre_archivo = 'logError.txt';
        if (!file_exists($nombre_archivo)) {
             $nuevoarchivo = fopen($nombre_archivo, "w+"); 
             fclose($nuevoarchivo); 
        }
        $nombre_archivo_contador = 'logErrorCount.txt';
        if (!file_exists($nombre_archivo_contador)) {
             $nuevoarchivo = fopen($nombre_archivo_contador, "w+"); 
             fclose($nuevoarchivo); 
        }
        // el archivo existe y es escribible.
        if (is_writable($nombre_archivo)) {


            // donde irá $contenido.
            if (!$gestor = fopen($nombre_archivo, 'a')) {
                 echo "Problemas: al registrar Errores, fopen.";
            }

            $actual=1;
            if(file_exists($nombre_archivo_contador)){
                $actual = file_get_contents($nombre_archivo_contador);
                $actual += 1;
                file_put_contents($nombre_archivo_contador, $actual);
            }else{
                file_put_contents($nombre_archivo_contador, '1');
            }
            // Escribir $contenido
            if(isset($_SESSION)) {
                $contenido.= "\nInformacion de _SESSION: \n" . print_r($_SESSION, TRUE);
            }
            if(isset($_POST)) {
                $contenido.= "\nInformacion de _POST: \n" . print_r($_POST, TRUE);
            }
            if(isset($_GET)) {
                $contenido.= "\nInformacion de _GET: \n" . print_r($_GET, TRUE);
            }
            if (fwrite($gestor, $actual . ' - ' . date('l jS \of F Y h:i:s A') . ': ' . $contenido."\n") === FALSE) {
                echo "Problemas: al registrar Errores, fwrite.";
            }

            fclose($gestor);
            return $actual;
        } else {
            echo "Problemas: al registrar Errores, is_writable.";
        }
    }

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
    public function incluir($filename){
        if (!file_exists($filename)) {
            throw new Exception("Imposible cargar lo requerido" . ": $filename");
        }else{
            require $filename;
        }
    }
    /*public static function file_exists($filename){
        try {
            DS::Ejecucion_file_exists($filename);
        } catch (Exception $e) {
            DS::logERROR($e->getMessage() . ": $filename");
            echo $e->getMessage(), "\n";
        }
    }*/
    public static function nameToPNG($name){
        $ext = array(".png", ".jpeg", ".jpg", ".gif", ".bmp");
        return str_ireplace($ext,'.png',$name);
    }
}
