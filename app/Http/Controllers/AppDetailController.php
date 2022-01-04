<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppDetailController extends Controller
{
    //

    public function create(){
        $app_no = session('app_no');
        //ddd($zipDetails);
        return view('appdetails.create',
            ['app_no'=>$app_no]);
    }
}
