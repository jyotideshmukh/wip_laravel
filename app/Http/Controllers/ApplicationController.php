<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationDetail;
use App\Services\ZipDetails;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class ApplicationController extends Controller
{
    //

    public function index(){
        return view('application.index');
    }




    public function create(){
        $zipDetails = session('zipDetails');
        //ddd($zipDetails);
        return view('application.create',
            ['zipDetails'=>$zipDetails]);
    }

    public function store(Request $request){

        $validator = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required',
            'email'=>'required|email',
            'state'=>'required',
            'city'=>'required',
            'zip'=>'required',
            'birthdate'=>'required|date',
            'gender'=>'required',
        ]);
        //ddd($validator);
        /*if ($validator->fails()) {


            return redirect('/app/basic-info')
                ->withErrors($validator)
                ->withInput();
        }*/

        $app = new Application();
        $app->zip = request('zip');
        $app->app_no = 'WIP'.rand(1,1000);
        $app->save();
       // ddd($app);

        $appDetail = new ApplicationDetail();
        $appDetail->prefix = request('prefix');
        $appDetail->firstname = request('firstname');
        $appDetail->lastname = request('lastname');
        $appDetail->gender = request('gender');
        $appDetail->birthdate = date('Y-m-d',strtotime(request('birthdate')));
        $appDetail->email = request('email');
        $appDetail->street_address = request('street_address');
        $appDetail->apartment = request('apartment');
        $appDetail->state = request('state');
        $appDetail->city = request('city');
        $appDetail->zip = request('zip');
        $appDetail->application_id = $app->id;
        $appDetail->save();

        return redirect('/app/essential-info')->with('app_no', $app->app_no);

    }

}
