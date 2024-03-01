<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Shetabit\Visitor\Traits\Visitor;

class CategoryController extends Controller
{
    public function show(Category $category)
    {

        // Digest authentication...
        // $response = Http::withBasicAuth('arlingholguin@gmail.com', 'ZcvGIWEijDpKAXYn')
        //     ->get('https://bioqr.me/api/account');
        visitor()->visit();


        return view('categorias.show', compact('category'));
        // Basic authentication...
        // $response = Http::withBasicAuth('taylor@laravel.com', 'secret')->post(/* ... */);       


    }

    // public function getAuserAcount()
    // {
    //     $curl = curl_init();
    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => "https://bioqr.me/api/account",
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 2,
    //         CURLOPT_TIMEOUT => 10,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_CUSTOMREQUEST => "GET",
    //         CURLOPT_HTTPHEADER => array(
    //             "Authorization: Bearer ZcvGIWEijDpKAXYn",
    //             "Content-Type: application/json",
    //         ),

    //     ));
    //     $response = curl_exec($curl);
    //     curl_close($curl);
    //     $acount = json_decode($response);
    //     $data = collect($acount);
    //     $user = $data->get('data');

    //     return $user;
    // }
}
