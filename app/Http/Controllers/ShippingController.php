<?php

namespace App\Http\Controllers;

use App\Services\EnviaAPIService;
use Illuminate\Http\Client\Request;

class ShippingController extends Controller
{
    protected $enviaService;

    public function __construct(EnviaAPIService $enviaService)
    {
        $this->enviaService = $enviaService;
    }

    protected $data = [
        "origin" => [
            'name' => "Colombia test",
            'company' => "Envia",
            'email' => "colombia@envia.com",
            'phone' => "8180161122",
            'street' => "carrera 54 # 10 - 110",
            'number' => "1400",
            'district' => "palo blanco sector el eden",
            'city' => "11001000",
            'state' => "CN",
            'country' => "CO",
            'postalCode' => "66236890",
            'reference' => "",
            'identificationNumber' => "66236890",
            "coordinates" => [
                "latitude" => "4.684761",
                "longitude" => "-74.029515"
            ]
        ],
        "destination" => [
            'name' => "hola",
            'company' => "hola",
            'email' => "colombia@envia.com",
            'phone' => "8181061122",
            'street' => "carrera 54",
            'number' => "# 90 - 90",
            'district' => "barrio",
            'city' => "11001000",
            'state' => "CN",
            'country' => "CO",
            'postalCode' => "456789876",
            'reference' => "",
            'identificationNumber' => "456789876",
            "coordinates" => [
                "latitude" => "4.684761",
                "longitude" => "-74.029515"
            ]
        ],
        "packages" => [
            [
                "content" => "zapatos",
                "amount" => 1,
                "type" => "box",
                "weight" => 1,
                "insurance" => 0,
                "declaredValue" => 0,
                "weightUnit" => "KG",
                "lengthUnit" => "CM",
                "dimensions" => [
                    "length" => 11,
                    "width" => 15,
                    "height" => 20
                ]
            ]
        ],
        "shipment" => [
            "carrier" => "coordinadora",
            "type" => 1
        ],
        "settings" => [
            "currency" => "COP"
        ]
    ];

    public function shipping(Request $request){
       dump($request->all());

        $response = $this->enviaService->calculateShipping($this->data);

        return response()->json($response);
    }
}
