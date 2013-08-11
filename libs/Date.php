<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of date
 *
 * @author sistemas01
 */
define('DATE_EXTENDED', 1);
define('DATETIME_ARRAY', 2);
define('MONTH_EXTENDED', 1);
define('MONTH_COMPACT', 2);

class date {

    public static function month($month, $format = MONTH_EXTENDED) {
        $months = array(
            '01' => 'Enero',
            '02' => 'Febrero',
            '03' => 'Marzo',
            '04' => 'Abril',
            '05' => 'Mayo',
            '06' => 'Junio',
            '07' => 'Julio',
            '08' => 'Agosto',
            '09' => 'Septiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre'
        );
        $months_compact = array(
            '01' => 'Ene',
            '02' => 'Feb',
            '03' => 'Mar',
            '04' => 'Abr',
            '05' => 'May',
            '06' => 'Jun',
            '07' => 'Jul',
            '08' => 'Ago',
            '09' => 'Sep',
            '10' => 'Oct',
            '11' => 'Nov',
            '12' => 'Dic'
        );
        if ($format == 1) {
            if (array_key_exists($month, $months)) {
                return $months[$month];
            } else {
                return 'Error en el mes';
            }
        } else {
            if (array_key_exists($month, $months_compact)) {
                return $months_compact[$month];
            } else {
                return 'Error en el mes';
            }
        }
    }

    //Formatear la fecha de como la arroja una sentencia SQL
    public static function format_date($date, $format = DATE_EXTENDED) {
        list($year, $month, $day_time) = explode('-', $date);
        $month_compact = self::month($month, MONTH_COMPACT);
        $month = self::month($month, MONTH_EXTENDED);
        $day_time = explode(' ', $day_time);
        $day = $day_time[0];
        list($hour, $minute, $second) = explode(':', $day_time[1]);
        if ($hour > 12) {
            $hour = $hour - 12;
            $meridiem = 'pm';
        } else {
            $meridiem = 'am';
        }
        if ($format == 1) {
            return $day . ' de ' . $month . ' del ' . $year;
        } elseif ($format == 2) {
            return array('day' => $day, 'month' => $month, 'month_compact' => $month_compact, 'year' => $year, 'hour' => $hour, 'minute' => $minute, 'second' => $second, 'meridiem' => $meridiem);
        }
    }

}

class libdate {

    public static function subtract($start, $end, $delimiter = '-') {
        $year = 0;
        $month = 0;
        $day = 0;
        list($start_year, $start_month, $start_day) = explode($delimiter, $start);
        list($end_year, $end_month, $end_day) = explode($delimiter, $end);
        $day = $end_day - $start_day;
        if ($day < 0) {
            $month = $month - 1;
            $day = $day + 31;
        }
        $temp_month = $end_month - $start_month;
        $month = $month + $temp_month;
        if ($month < 0) {
            $year = $year - 1;
            $month = $month + 12;
        }
        $temp_year = $end_year - $start_year;
        $year = $year + $temp_year;
        return array($year, $month, $day);
    }

}

?>
