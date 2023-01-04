<?php

namespace App\Repository\Services\Address;

class AddressTemplate
{
    protected array $address;

    /**
     * @param $address_1 Endereço
     * @param $address_2 Bairro
     * @param $number Número da residência
     */
    public function make(
        string $address_1,
        string $address_2,
        string $city,
        string $state,
        string $zipcode
    ) {
        
        $this->address = [
            'address_1' => $address_1,
            'address_2' => $address_2,
            'city'      => $city,
            'state'     => $state,
            'zipcode'   => $zipcode,
        ];

        return $this;
    }

    public function getAddress(): array
    {
        return $this->address;
    }
}
