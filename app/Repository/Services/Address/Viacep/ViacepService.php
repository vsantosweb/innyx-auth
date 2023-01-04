<?php

namespace App\Repository\Services\Address\ViaCEP;

use App\Repository\Interfaces\Address\IAddressDataSourceRepository;
use App\Repository\Services\Address\AddressTemplate;
use Illuminate\Support\Facades\Http;

class ViacepService implements IAddressDataSourceRepository
{
    const mockResponse = '{"cep":"01001-000","logradouro":"Praça da Sé","complemento":"lado ímpar","bairro":"Sé","localidade":"São Paulo","uf":"SP","ibge":"3550308","gia":"1004","ddd":"11","siafi":"7107"}';

    protected $template;

    public function __construct(AddressTemplate $template)
    {
        $this->template = $template;
    }

    public function searchZipcode(string $zipcode): array
    {

        // $response = (object) json_decode(self::mockResponse, true);

        $response = json_decode(Http::get('viacep.com.br/ws/'.$zipcode.'/json/')->body());


        if(is_null($response)) throw new \Exception("Address not found", 1);
        
        $address = $this->template->make(
            $response->logradouro,
            $response->bairro,
            $response->localidade,
            $response->uf,
            $response->cep
        );

        return $address->getAddress();
    }
}
