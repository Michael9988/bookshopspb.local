<?php

require_once "adminmodules_class.php";

class AdminStatisticsContent extends AdminModules {

    protected $title = "Статистика";
    protected $meta_desc = "Вход в аккаунт администратора.";
    protected $meta_key = "администратор, аккаунт администратор, аккаунт администратор вход";

    protected function getContent() {
        $start = $this->format->getTime($_GET["start"], TRUE);
        $end = $this->format->getTime($_GET["end"], FALSE);
        $result = $this->statistics->getDataForAdmin($start, $end);        
        $this->template->set("result", $result);
        $this->template->set("start", $this->format->time($start));
        $this->template->set("end", $this->format->time($end));
        return "statistics";
    }

}

?>