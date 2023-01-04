<?php

namespace App\Http\Controllers;

use App\Repository\Interfaces\Address\IAddressRepository;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    
    public $addressRepository;

    public function __construct(IAddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository->getDefaultAddressService();
    }

    public function searchAddressByZipcode($zipcode)
    {

        try {
            return response($this->addressRepository->searchZipcode($zipcode), 200);

        } catch (\Throwable $th) {

            return response($th->getMessage(), 200);

        }
    }
}
