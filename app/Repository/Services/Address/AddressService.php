<?php

namespace App\Repository\Services\Address;

use App\Repository\Interfaces\Address\IAddressRepository;
use App\Repository\Services\Address\OpenCep\OpenCepService;
use App\Repository\Services\Address\Viacep\ViacepService;

class AddressService implements IAddressRepository
{
    public static $instance;

    const defaultService = 'OpenCep';

    public static function getDefaultAddressService()
    {  
        if (!isset(self::$instance)) {

            $addressServiceClass = self::defaultService; 

            $addressService = self::register()[$addressServiceClass];

            self::$instance = new $addressService();
        }

        return self::$instance;
    }

    public static function register()
    {
        return [
            'ViaCEP' => ViacepService::class,
            'OpenCep' => OpenCepService::class,
        ];
    }
}
