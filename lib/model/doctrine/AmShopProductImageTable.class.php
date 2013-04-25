<?php


class AmShopProductImageTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AmShopProductImage');
    }
}