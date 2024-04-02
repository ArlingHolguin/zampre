<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orden;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //index de las ordenes
    public function index(){
        $orders = Orden::query();

        if (request('status')) {
            $orders->where('status', request('status'));
        }

        $orders = $orders->latest()->get();


        $pendiente = Orden::where('status', 1)->count();
        $recibido = Orden::where('status', 2)->count();
        $enviado = Orden::where('status', 3)->count();
        $entregado = Orden::where('status', 4)->count();
        $anulado = Orden::where('status', 5)->count();
        $perdido = Orden::where('status', 6)->count();
        $devuelto = Orden::where('status', 7)->count();


      
        return view('admin.orders.index', compact('orders', 'pendiente', 'recibido', 'enviado', 'entregado', 'anulado', 'perdido', 'devuelto'));
    }

   
    public function show(Orden $orden){
        // $this->authorize('author', $orden);
        $items = json_decode($orden->content);
        $info_ip = json_decode($orden->info_ip);
        
        // dd($items);
        
        
        //confirmo orden se debe enviar correo con el pedido en pdf y despues de eso mostrar el estado del pedio con el resumen 
        $list=[
            '1' => 'Pendiente',
            '2' => 'Recibido',
            '3' => 'Enviado',
            '4' => 'Entregado',
            '5' => 'Anulado',
            '6' => 'Perdido',
            '7' => 'Devuelto',
        ];

        

        return view('admin.orders.show', compact('orden', 'items', 'list', 'info_ip'));
    }

}
