<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function scanQRCode()
    {
        return view('QRCodeController');
    }

    public function processQRCode(Request $request)
    {
        $url = $request->input('url');
        return redirect($url);
    }
}
