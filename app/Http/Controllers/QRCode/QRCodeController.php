<?php

namespace App\Http\Controllers\QRCode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    //

    public function makeqr(Request $request, $indexacceso)
    {
        //return $indexacceso;


        //QrCode::generate('Welcome to Makitweb', public_path('img/qrcode.svg') );
        //return QrCode::size(250)->generate('http://192.168.1.91/qracc/public/showqr/'.$indexacceso);
        return view('makeqr', compact('indexacceso'));
        //return QrCode::size(250)->generate('http://www.simplesoftware.io');
        // Store QR code 
        
    }
}
