<?php

require_once "config_class.php";

class DataBase {

    private static $db = null;
    private $config;
    private $mysqli;

    public static function getDB() {
        if (self::$db == NULL) {
            self::$db = new DataBase();
        }
        return self::$db;
    }

    private function __construct() {
        $this->config = new Config();
        $this->mysqli = new mysqli($this->config->db_host, $this->config->db_user, $this->config->db_password, $this->config->db_name);
        $this->mysqli->query("SET NAMES 'utf8'");
    }

    private function getQuery($query, $params) {
        if ($params) {
            for ($i = 0; $i < count($params); $i++) {
                $pos = strpos($query, $this->config->sym_query);
                $arg = "'" . $this->mysqli->real_escape_string($params[$i]) . "'";
                $query = substr_replace($query, $arg, $pos, strlen($this->config->sym_query));
            }
        }
        return $query;
    }

    public function select($query, $params = FALSE) {
        $result_set = $this->mysqli->query($this->getQuery($query, $params));
        if (!$result_set) {
            return FALSE;
        }
        return $this->resultSetToArray($result_set);
    }

    public function selectRow($query, $params = FALSE) {
        $result_set = $this->mysqli->query($this->getQuery($query, $params));
        if ($result_set->num_rows != 1) {
            return FALSE;
        }
        return $result_set->fetch_assoc();
    }

    public function selectCell($query, $params = FALSE) {
        $result_set = $this->mysqli->query($this->getQuery($query, $params));
        if ((!$result_set) || ($result_set->num_rows != 1)) {
            return FALSE;
        } else {
            $arr = array_values($result_set->fetch_assoc());
            return $arr[0];
        }
    }

    public function query($query, $params = FALSE) {
        $success = $this->mysqli->query($this->getQuery($query, $params));
        if ($success) {
            if ($this->mysqli->insert_id === 0) {
                return TRUE;
            } else {
                return $this->mysqli->insert_id;
            }
        } else {
            return FALSE;
        }
    }

    private function resultSetToArray($result_set) {
        $array = array();
        while (($row = $result_set->fetch_assoc()) != FALSE) {
            $array[] = $row;
        }
        return $array;
    }

    public function __destruct() {
        if ($this->mysqli) {
            $this->mysqli->close();
        }
    }

}
?>

