<?php

/*
 * Libreria Img v1.0
 * Creda por la Direccion de informatica de la Gobernacion del Estado Yaracuy
 * Libraria para el tratamiento de imagenes
 */

class Img {
    /*
     * Metodo que cambia el tamaño de una imagen:
     * $origin nombre de la imagen origen
     * $destination es el lugar donde se guardara la imagen debe expecificar la ruta completa con nombre de archivo de salida img/folder_upload/salida.png
     * Opcional: $max_width puede expesificar la anchura maxima de la imagen 0 no hace nada
     * Opcional: $max_height puede expesificar la altura maxima de la imagen 0 no hace nada
     */

    public static function resize($origin, $max_width, $max_height, $destination = NULL) {
        if ($max_width > 1000) {
            $max_width = 1000;
        }
        if ($max_height > 1000) {
            $max_height = 1000;
        }
        $file = rtrim($origin, '/');
        $file = explode('/', $file);
        $type = explode('.', $file[count($file) - 1]);
        $type = $type[count($type) - 1];
        if ($type == 'jpg' OR $type == 'JPG' OR $type == 'jpeg' OR $type == 'JPEG') {
            $img = imagecreatefromjpeg($origin);
        } elseif ($type == 'png' OR $type == 'PNG') {
            $img = imagecreatefrompng($origin);
        } elseif ($type == 'gif' OR $type == 'GIF') {
            $img = imagecreatefromgif($origin);
        } else {
            return 'error solo son permitidos los archivos con estenciones jpg,png,gif';
        }
        imageinterlace($img, true);
        $x = imageSX($img);
        $y = imageSY($img);

        if ($x > $y) {
            //exit('x='.$x.' y='.$y);
            if ($x > $max_width) {
                $new_y = $y * ((($max_width * 100) / $x) / 100);
                $new_x = $max_width;
            }
        } elseif ($x < $y) {
            if ($y > $max_height) {
                $new_x = $x * ((($max_height * 100) / $y) / 100);
                $new_y = $max_height;
            }
        } elseif ($x == $y) {
            $new_y = $y;
            $new_x = $x;
            if ($x > $max_width OR $y > $max_height) {
                $new_y = $y * ((($max_width * 100) / $x) / 100);
                $new_x = $x * ((($max_height * 100) / $y) / 100);
            }
            if ($new_y > $new_x) {
                $new_y = $new_x;
            } else {
                $new_x = $new_y;
            }
        }
        $new_img = imagecreatetruecolor($new_x, $new_y);
        imagecopyresampled($new_img, $img, 0, 0, 0, 0, $new_x, $new_y, $x, $y);
        if ($destination != NULL) {
            if ($type == 'jpg' OR $type == 'JPG' OR $type == 'jpeg' OR $type == 'JPEG') {
                imagejpeg($new_img, $destination, 75);
                return 'image/jpeg';
            } elseif ($type == 'png' OR $type == 'PNG') {
                imagepng($new_img, $destination, 9);
                return 'image/png';
            } elseif ($type == 'gif' OR $type == 'GIF') {
                imagegif($new_img, $destination);
                return 'image/gif';
            } else {
                return FALSE;
            }
        } else {
            if ($type == 'jpg' OR $type == 'JPG' OR $type == 'jpeg' OR $type == 'JPEG') {
                header("Content-type: image/jpeg");
                imagejpeg($new_img);
                return TRUE;
            } elseif ($type == 'png' OR $type == 'PNG') {
                header("Content-type: image/png");
                imagepng($new_img);
                return TRUE;
            } elseif ($type == 'gif' OR $type == 'GIF') {
                header("Content-type: image/gif");
                imagegif($new_img);
                return TRUE;
            } else {
                return FALSE;
            }
        }
        imagedestroy($new_img);
    }

    /*
     * Metodo que sube una imagen:
     * $key es el nombre de la llave del metodo $_FILE[$key]
     * $destination es el lugar donde se guardara la imagen debe expecificar la ruta completa con nombre de archivo de salida img/folder_upload/salida.png
     * Opcional: $max_width puede expesificar la anchura maxima de la imagen 0 no hace nada
     * Opcional: $max_height puede expesificar la altura maxima de la imagen 0 no hace nada
     */

    public static function upload($key, $destination, $max_width = 0, $max_height = 0) {
        /* Utilizar si se Require el Tamaño
         * $tamano = round($_FILES[$key]['size'] / 1024, 0, PHP_ROUND_HALF_UP);
         */
        $destination = $destination . $_FILES[$key]['name'];
        if (copy($_FILES[$key]['tmp_name'], $destination)) {
            if ($max_width > 0 OR $max_height > 0) {
                $mime_type = self::resize($destination, $max_width, $max_height, $destination);
            }
            return array('destination' => $destination, 'mime_type' => $mime_type);
        } else {
            return FALSE;
        }
    }

    /*
     * Metodo que sube multiples imagenes:
     * $key_pattern es el patron del nombre de los campos name_1, name_2, name_4 $key_pattern="name_" $_FILE[$key_pattern.1]
     * $destination_pattern es el patron donde se guardara la imagen debe expecificar la ruta completa con el patron de inicio de cada imagen de salida $destination_pattern='img/folder_upload/2012-03-21' al final cerrara con la fecha en formato unix "1332356377_" y la posicion key del metodo $_FILE para evitar duplicados, seguido de la extencion predifinida optimizada para la web ".png" 1332356377_1.png
     * Opcional: $max_width puede expesificar la anchura maxima de la imagen 0 no hace nada
     * Opcional: $max_height puede expesificar la altura maxima de la imagen 0 no hace nada
     */

    public static function multiple_upload($key_pattern, $destination_pattern, $max_width = 0, $max_height = 0) {
        $i = 1;
        foreach ($_FILES as $key => $val) {
            if (preg_match("/" . $key_pattern . "/i", $key)) {
                /* $date_unix = new DateTime();
                  $date_unix = $date_unix->getTimestamp();
                  $destination_pattern_end = $destination_pattern . $date_unix . '_' . $i . '_'; */
                $destination_pattern_end = $destination_pattern;
                $result[] = self::upload($key, $destination_pattern_end, $max_width, $max_height);
            }
            $i++;
        }
        return $result;
    }

    public static function getAttributes($param) {
        $data = getimagesize($param);
        $data['filesize'] = filesize($param);
        return $data;
    }

}

?>