<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function index(){

        $orders = Orden::query()->where('user_id', auth()->user()->id);

        if (request('status')) {
            $orders->where('status', request('status'));
        }

        $orders = $orders->latest()->get();


        $pendiente = Orden::where('status', 1)->where('user_id', auth()->user()->id)->count();
        $recibido = Orden::where('status', 2)->where('user_id', auth()->user()->id)->count();
        $enviado = Orden::where('status', 3)->where('user_id', auth()->user()->id)->count();
        $entregado = Orden::where('status', 4)->where('user_id', auth()->user()->id)->count();
        $anulado = Orden::where('status', 5)->where('user_id', auth()->user()->id)->count();


        return view('orders.index', compact('orders', 'pendiente', 'recibido', 'enviado', 'entregado', 'anulado'));
        
    }

    public function resumen(Orden $orden){
        // $this->authorize('author', $orden);

        $items = json_decode($orden->content);
        return view('orders.resumen', compact('orden', 'items'));
    }

    public function show(Orden $orden){
        $this->authorize('author', $orden);
        $items = json_decode($orden->content);
        // dd($items);
        
        
        //confirmo orden se debe enviar correo con el pedido en pdf y despues de eso mostrar el estado del pedio con el resumen 
        $list=[
            '1' => 'Pendiente',
            '2' => 'Recibido',
            '3' => 'Enviado',
            '4' => 'Entregado',
            '5' => 'Anulado',
        ];

        

        return view('orders.show', compact('orden', 'items', 'list'));
    }
    //actualizar el estado y enviar correo electronico avisando del cambio de estado al usuario que generó la orden 
    public function files(Request $request, Orden $orden){
        
        $folder = $orden->code_id;
        $now =  Carbon::now();
        $nowr = $now->toDateString(); 

        $folderOrden = Str::slug($folder);
       

        if ($request->file('files')) {
            $url = Storage::put($folderOrden.'-'.$nowr.'/guias', $request->file('files'));
            $orden->images()->create([
                'url' => $url
            ]);
        }

        // $orden = new Orden;
        // $orden->status = $request->input('status');
        // $orden->update();

        $orden->update([
            'status' => $request->status,
        ]);
        // return $url;
        return redirect()->back()->with('info','La orden ha sido actualizada');
    }


    public function pdfpedido(Orden $orden){
        $items = json_decode($orden->content);

        // $qr= QrCode::generate(route('pdfpedido', $orden));
        $url = route('orders.show', $orden);
        $qr = QrCode::style('round')->eye('circle')->generate(url($url), '../public/lese/qrcodes/'.$orden->code_id.'.svg');
        // $qr = QrCode::format('svg')->merge('../public/lese/img/logo-qr-centro.svg', .3)->generate(url($url), '../public/lese/qrcodes/'.$orden->code_id.'.svg');
        
        $namePdf = $orden->code_id;
        $pdf = PDF::loadView('pedido', compact('items', 'orden', 'qr'));

         return $pdf->stream($namePdf.'.pdf');
        
        // return $qr;
    }
}


