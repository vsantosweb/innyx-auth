<?php

namespace App\Repository\Interfaces\Address;

use App\Repository\Services\Address\AddressService;

interface IAddressRepository
{
    public static function getDefaultAddressService();
    public  static function register();
}
