<?php

class ProductList
{
    protected $ID;
    protected $UserID;
    protected $ProductID;

    public function __construct($UserID,$ProductID)
    {
        $this->UserID=$UserID;
        $this->ProductID=$ProductID;
    }



}