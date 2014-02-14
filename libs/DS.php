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
    public function incluir($filename, $filtrarPermisos=FALSE,$arrayPermisos=FALSE, $releUser=''){
        if (!file_exists($filename)) {
            throw new Exception("Imposible cargar lo requerido" . ": $filename");
        }else{
            if ($filtrarPermisos != FALSE AND $arrayPermisos != FALSE AND is_array($arrayPermisos)) {
                /* Obtengo el contenido del elemento */
                ob_start();
                include $filename;
                /* guardo dicho contenido ya procesado en una variable */
                $contents = ob_get_contents();
                ob_end_clean();
                /* defino el profeijo por defecto para los permisos Ejemplo PMS_ */
                $classname = "PMS_";
                /* Instancio la libreria para leer el DOM del objeto */
                $domdocument = new DOMDocument();
                /* Cargo el contenido a la libreria */
                $domdocument->loadHTML($contents);
                /* utilizo la libreria DOMXPath para realizar consultas y alteraciones en el DOM */
                $a = new DOMXPath($domdocument);
                /* Consulta que busca los elementos U etiquetas que contengan la clase que inicie con el Prefijo definido */
                $node = $a->query("//*/@class[contains(., '$classname')]/..");
                /* defino los privilegios a los cuales el usuario no tiene acceso */
                $SinPermisosA=array('PMS_5','PMS_4');
                /* recorro el array con las incurrencias encontradas en la anterior consulta */
                foreach ($node as $nodeElement) {
                    $classArray = explode(' ', $nodeElement->getAttribute('class'));
                    $CantSinPermisos = count(array_intersect($SinPermisosA, $classArray));
                    if ($CantSinPermisos > 0) {
                        $nodeElement->parentNode->removeChild($nodeElement);
                    }
                }
                print $domdocument->saveHTML();
            }else{
                require $filename;
            }
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
