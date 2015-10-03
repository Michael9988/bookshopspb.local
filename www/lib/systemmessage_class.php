<?php

class SystemMessage {

    public function __construct() {
        session_start();
    }

    public function message($name, $result = FALSE) {
        if ($name == "UNKNOWN_ERROR") {
            return $this->unknownError();
        }
        $_SESSION["message"] = $name;
        return $result;
    }

    public function pageMessage($name, $result = TRUE) {
        if ($name == "UNKNOWN_ERROR") {
            return $this->unknownError(TRUE);
        }
        $_SESSION["page_message"] = $name;
        return $result;
    }

    public function unknownError($page = FALSE) {
        if ($page) {
            $_SESSION["page_message"] = "UNKNOWN_ERROR";
        } else {
            $_SESSION["message"] = "UNKNOWN_ERROR";
        }
        return FALSE;
    }

}
?>

