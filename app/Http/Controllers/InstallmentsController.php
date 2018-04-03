<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstallmentsController extends Controller
{
    public function paymentsPage()
    {
        return view('installments.payments');
    }

    public function uploadPage()
    {
        return view('installments.upload');
    }
}
