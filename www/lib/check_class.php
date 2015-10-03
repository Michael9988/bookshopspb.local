<?php

require_once "config_class.php";

class Check {

    private $config;

    public function __construct($amp = true) {
        $this->config = new Config();
    }

    public function id($id, $zero = FALSE) {
        if (!$this->intNumder($id)) {
            return FALSE;
        }
        if ((!$zero) && ($id === 0)) {
            return FALSE;
        }
        return $id >= 0;
    }

    public function value($value) {
        if (!$this->doubleNumber($value)) {
            return FALSE;
        }
        return ($value > 0 && $value <= 1);
    }

    public function ids($ids) {
        $reg = "/^\d+(,\d+)*\d?$/i";
        return preg_match($reg, $ids);
    }

    public function amount($amount) {
        if (!$this->doubleNumber($amount)) {
            return FALSE;
        }
        return $amount >= 0;
    }

    public function name($name) {
        if ($this->isContainQuotes($name)) {
            return FALSE;
        }
        return $this->isString($name, 1, $this->config->max_name);
    }

    public function title($title) {
        return $this->isString($title, 1, $this->config->max_title);
    }

    public function email($email) {
        if ($this->isContainQuotes($email)) {
            return FALSE;
        }
        $reg = "/^[a-z0-9][a-z0-9\._-]*[a-z][0-9_]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+$/i";
        return preg_match($reg, $email);
    }

    public function text($text, $empty = FALSE) {
        if (($empty) && ($text == "")) {
            return TRUE;
        }
        return $this->isString($text, 1, $this->config->max_text);
    }

    public function ts($ts) {
        return $this->noNegativeInteger($ts);
    }

    public function year($year) {
        if (!$this->intNumder($year)) {
            return FALSE;
        }
        return $year > 0;
    }

    public function play($play) {
        return preg_match("/\d{2}:\d{2}:\d{2}/", $play);
    }

    public function oneOrZero($number) {
        if (!$this->intNumder($number)) {
            return FALSE;
        }
        return (($number == 0) || ($number == 1));
    }

    public function count($count) {
        return $this->noNegativeInteger($count);
    }

    public function offset($offset) {
        return $this->intNumder($offset);
    }

    private function noNegativeInteger($number) {
        if (!$this->intNumder($number)) {
            return FALSE;
        }
        return ($number >= 0);
    }

    private function intNumder($number) {
        if (!is_int($number) && !is_string($number)) {
            return FALSE;
        }
        return preg_match("/^-?(([1-9][0-9]*)|(0))$/", $number);
    }

    private function isContainQuotes($string) {
        $array = array("\"", ",", "`", "&quot;", "&apos;");
        foreach ($array as $value) {
            if (strpos($string, $value) !== FALSE) {
                return TRUE;
            }
        }
        return FALSE;
    }

    private function isString($string, $min_length, $max_length) {
        if (!is_string($string)) {
            return FALSE;
        }
        if (strlen($string) < $min_length) {
            return FALSE;
        }
        if (strlen($string) > $max_length) {
            return FALSE;
        }
        return TRUE;
    }

    private function doubleNumber($number) {
        return is_numeric($number);
    }

}
?>


