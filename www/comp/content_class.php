<?php

require_once "modules_class.php";

class Content extends Modules {

    protected $title = "Интернет-магазин";
    protected $meta_desc = "Интернет-магазин по продаже книг";
    protected $meta_key = "Интернет-магазин, книги";

    protected function getContent() {
        $this->setLinkSort();
        $sort = $this->data["sort"];
        $up = $this->data["up"];

        $this->template->set("table_products_title", "Новинки");
        $this->template->set("products", $this->product->getAllSort($sort, $up, $this->config->count_on_page));
        return "index";
    }

}
?>

