<?php

class Config {

    public $secret = "HSDJGFDHFDS";
    public $sitename = "BOOKshopspb.local";
    public $address = "http://bookshopspb.local/";
    public $address_admin = "http://bookshopspb.local/admin/";
    public $db_host = "localhost";
    public $db_user = "root";
    public $db_password = "";
    public $db_name = "bookshopspb-local";
    public $db_prefix = "sbook_";
    public $sym_query = "{?}";
    
    public $admname = "Михаил Колесник";
    public $admemail = "felix9988@yandex.ru";
    public $adm_login = "Admin";
    public $adm_password = "f0f83f4becb9cbbc23edd3cf27ecda5d";
    
    public $count_on_page = 16;
    public $count_others = 6;
    
    public $pagination_count = 10;


    public $dir_text = "lib/text/";
    public $dir_tmpl = "tmpl/";
    public $dir_tmpl_admin = "admin/tmpl/";
    public $dir_img_products = "images/products/";
    
    public $max_name = 255;
    public $max_title = 255;
    public $max_text = 65535;
    
    public $max_size_img = 409600;
}
?>

