<?php

namespace App\Repository\Services\Address\OpenCep;

use App\Repository\Interfaces\Address\IAddressDataSourceRepository;
use App\Repository\Services\Address\AddressTemplate;
use Illuminate\Support\Facades\Http;

class OpenCepService implements IAddressDataSourceRepository
{
    const mockResponse = '{"cep":"15050-305","logradouro":"Rua Josina Teixeira de Carvalho","complemento":"","bairro":"Vila Anchieta","localidade":"São José do Rio Preto","uf":"SP","ibge":"3549805"}';

    protected $template;

    public function __construct()
    {
        $this->template = new AddressTemplate();
    }

    public function searchZipcode(string $zipcode): array
    {

        // $response = (object) json_decode(self::mockResponse, true);

        $response = json_decode(Http::get('https://opencep.com/v1/'.$zipcode)->body());

        if(isset($response->error) && $response->error) throw new \Exception("Address not found", 1);

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
