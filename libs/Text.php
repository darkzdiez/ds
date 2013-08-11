<?php

define('START', 1);
define('MIDDLE', 2);
define('END', 3);

class Text {

    public static function cut($text, $nun, $position = MIDDLE) {
        $num_len = strlen($text);
        if ($position == 2) {
            /*
             * si php es mayor a 5.3
             * $cut = round($num_len / 2, 0, PHP_ROUND_HALF_DOWN);
             */
            $cut = round($num_len / 2, 0);
            if ($num_len > $nun + 3) {
                $text_cut = mb_strcut($text, 0, $cut, "UTF-8") . '...' . substr($text, -$cut, $num_len, "UTF-8");
                $text_cut = wordwrap($text_cut, $cut + 3, "<br />\n");
                return $text_cut;
            } else {
                return $text;
            }
        } elseif ($position == 3) {
            if ($num_len > $nun + 3) {
                $text_cut = mb_strcut($text, 0, $nun + 3, "UTF-8") . '...';
                return $text_cut;
            } else {
                return $text;
            }
        }
    }

    public static function AccentsRemove($string) {
        return Normalizer::normalize($string, Normalizer::FORM_D);
    }

    public static function SpecialRemove($string,$otherCharacter=NULL) {
        return preg_replace('/([^A-Za-z0-9 '.$otherCharacter.'])/', '', $string);
    }

    public static function CleanURL($string) {
        return str_replace(' ', '-', self::SpecialRemove(self::AccentsRemove(strip_tags($string))));
    }
    public static function CleanNameFile($string) {
        return str_replace(' ', '-', self::SpecialRemove(self::AccentsRemove($string),'.'));
    }

}

?>
