<?php

namespace App\Helpers;

class Transaction{

    /*=====================================
     * CREATING A CREDIT CARD PAYMENT
     * ACCEPT VISA CARD< MASTER CARD AND DISCOVER ETC
     * FIRST OF ALL WE WILL COLLECT CARD INFORMATION FROM CLIENT
     *=============================================================*/
    public static function card($card)
    {
        self::create($card);
        return $card;
    }

    public  static function create($data)
    {

        return $data;
    }
}