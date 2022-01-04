<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationDetail;
use App\Repositories\ApplicationKeyValueRepository;
use App\Repositories\ApplicationRepository;
use App\Repositories\MedicalHistoryRepository;
use App\Rules\ValidateUsZip;
use App\Services\ZipDetails;
use Illuminate\Http\Request;


class ApplicationController extends Controller
{

    protected $applicationRepository;
    protected $applicationKeyValueRepository;
    protected $medicalHistoryRepository;

    public function __construct(
        ApplicationRepository $applicationRepository,
        ApplicationKeyValueRepository $applicationKeyValueRepository,
        MedicalHistoryRepository $medicalHistoryRepository
    ) {
        $this->applicationRepository = $applicationRepository;
        $this->applicationKeyValueRepository = $applicationKeyValueRepository;
        $this->medicalHistoryRepository = $medicalHistoryRepository;
    }

    public function index(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('application.index');
        } else {
            $request->validate([
                'zip' => new ValidateUsZip()
            ]);
            session(['zip' => $request->zip]);
            return redirect(route('app.basicInfo'));
        }
    }

    public function basicInfo(ZipDetails $zipDetails)
    {
        $zipData = $zipDetails->getZipDetails(session('zip'));
        return view('application.basic_info_form', [
            'zipDetails' => $zipData
        ]);
    }

    public function storeBasicInfo(Request $request)
    {
        $validator = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required',
            'email' => 'required|email',
            'state' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'birthdate' => 'required|date',
            'gender' => 'required',
        ]);

        $app = new Application();
        $app->zip = request('zip');
        $app->app_no = 'WIP' . rand(1, 1000);
        $app->save();

        $appDetail = new ApplicationDetail();
        $appDetail->prefix = request('prefix');
        $appDetail->firstname = request('firstname');
        $appDetail->lastname = request('lastname');
        $appDetail->gender = request('gender');
        $appDetail->birthdate = date('Y-m-d', strtotime(request('birthdate')));
        $appDetail->email = request('email');
        $appDetail->street_address = request('street_address');
        $appDetail->apartment = request('apartment');
        $appDetail->state = request('state');
        $appDetail->city = request('city');
        $appDetail->zip = request('zip');
        $appDetail->application_id = $app->id;
        $appDetail->save();

        session(['app_no' => $app->app_no]);
        session(['app_id' => $app->id]);
        return redirect('/app/essential-info');
    }

    public function essentialInfo()
    {
        $app_no = session('app_no');
        return view('application.essential_info_form', [
            'app_no' => $app_no
        ]);
    }

    public function storeEssentialInfo(Request $request)
    {
        $validated = $request->validate([
            'height_feet' => 'required',
            'height_inches' => 'required',
            'weight' => 'required',
            'is_us_citizen' => 'required',
            'is_green_card_holder' => 'sometimes'
        ]);
        $this->applicationKeyValueRepository->storeKeyValue($validated, session('app_id'));
        return redirect(route('app.medicalHistory'));
    }

    public function medicalHistory()
    {
        $medicalHistories = $this->medicalHistoryRepository->getAll();
        return view('application.medical_history', [
            'medicalHistories' => $medicalHistories
        ]);
    }

    public function storeMedicalHistory(Request $request)
    {
        $application = $this->applicationRepository->getOne(session('app_id'));
        $application->medicalHistory()->sync($request->except('_token'));
        return redirect(route('app.lifeStyle'));
    }

    public function lifeStyle()
    {
        $medicalHistories = $this->medicalHistoryRepository->getAll();
        return view('application.medical_history', [
            'medicalHistories' => $medicalHistories
        ]);
    }

    public function storeLifeStyle(Request $request)
    {
        $application = $this->applicationRepository->getOne(session('app_id'));
        $application->medicalHistory()->sync($request->except('_token'));
        dd($request->except('_token'));
    }
}
