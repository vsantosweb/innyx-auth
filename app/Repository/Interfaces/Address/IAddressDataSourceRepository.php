<?php

namespace App\Repository\Interfaces\Address;


interface IAddressDataSourceRepository
{
    public function searchZipcode(string $zipcode): array;
}