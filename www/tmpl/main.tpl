<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title><?=$this->title?></title>
        <meta charset="UTF-8">
        <meta name="description" content="<?=$this->meta_desc?>">
        <meta name="keywords" content="<?=$this->meta_key?>">
        <link rel="stylesheet" href="styles/main.css" type="text/css"/>
        <script type="text/javascript" src="js/functions.js"></script>
        <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
    </head>
    <body>
        <div id="container">
            <div id="header">
                <img src="images/header_02.png" alt="Шапка" />
                <div class="cart">
                    <p>В корзине <span><?=$this->cart_count?></span> <?=$this->cart_word?><br /> на сумму <span><?=$this->cart_summa?></span> руб.</p>
                    <a href="<?=$this->cart_link?>">В корзину</a>
                </div>
                <div id="search">
                    <form name="search" action="<?=$this->link_search?>" method="get">
                        <table>
                            <tr>                                
                                <td>
                                    <input class="inputborder" type="text" name="q" value="Поиск" onfocus="if (this.value === 'Поиск')
                                                this.value = ''" onblur="if (this.value === '')
                                                            this.value = 'Поиск'"/>
                                </td>                                                                 

                            </tr>
                        </table>
                    </form>
                </div>
            </div>

            <div id="topmenu">
                <ul>
                    <li>
                        <a href="<?=$this->index?>">ГЛАВНАЯ</a>
                    </li>
                    <li>
                        <a href="<?=$this->link_delivery?>">ОПЛАТА И ДОСТАВКА</a>
                    </li>
                    <li>
                        <a href="<?=$this->link_contacts?>">КОНТАКТЫ</a>
                    </li>
                </ul>
            </div>
            <div id="content">
                <div id="left">
                    <div id="menu">
                        <div class="header">
                            <h4>Разделы</h4>
                        </div>                    
                        <div id="items">
                            <?php for ($i = 0; $i < count($this->items); $i++) {?>
                                <p <?php if ($i + 1 == count($this->items)) {?>class="last"<?php }?>>
                                    <a href = "<?=$this->items[$i]["link"]?>"><?=$this->items[$i]["title"]?></a>
                                </p>
                            <?php }?>                            
                        </div>
                        <div class="bottom"></div>
                    </div>
                </div>
                <div id="right">
                    <?php include "content_".$this->content.".tpl"; ?>                    
                </div>
                <div class="clear"></div>
                <div id="footer">                    
                    <div id="copy">
                        <p>Copyright &copy; Ecommercewebsite.ru</p>                            
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
