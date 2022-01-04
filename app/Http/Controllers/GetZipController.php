<?php

namespace App\Http\Controllers;

use App\Services\ZipDetails;
use Illuminate\Http\Request;

class GetZipController extends Controller
{
    //
    public function __invoke(ZipDetails $zipDetails){
        try {
            $responseData = $zipDetails->getZipDetails(request('zip'));
            //ddd($responseData);
            return redirect('/app/basic-info')->with('zipDetails', $responseData);

        }catch(\Exception $e){
            throw \Illuminate\Validation\ValidationException::withMessages(['zip'=>'This zip address is not valid address']);
        }

    }
}
