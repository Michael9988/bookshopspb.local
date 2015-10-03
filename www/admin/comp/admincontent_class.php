<?php

require_once "adminmodules_class.php";

class AdminContent extends AdminModules {

    protected $title = "Аккаунт администратора";
    protected $meta_desc = "Аккаунт администратора Интернет-магазина";
    protected $meta_key = "администратор, аккаунт администратор, аккаунт администратор интернет магазин";

    protected function getContent() {
        $start = $this->format->getTime("", TRUE);
        $end = $this->format->getTime("", FALSE);
        $result = $this->statistics->getDataForAdmin($start, $end);        
        $this->template->set("result", $result);        
        return "index";
    }

}
?>

