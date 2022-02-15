<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreBasicInfo;
use App\Http\Requests\StoreEssentialInfo;
use App\Mail\UserRegistered;
use App\Repositories\ApplicationKeyValueRepository;
use App\Repositories\ApplicationRepository;
use App\Repositories\LifestyleRepository;
use App\Repositories\MedicalHistoryRepository;
use App\Rules\ValidateUsZip;
use App\Services\ZipDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{

    protected $applicationRepository;
    protected $applicationKeyValueRepository;
    protected $medicalHistoryRepository;
    protected $lifestyleRepository;

    public function __construct(
        ApplicationRepository $applicationRepository,
        ApplicationKeyValueRepository $applicationKeyValueRepository,
        MedicalHistoryRepository $medicalHistoryRepository,
        LifestyleRepository $lifestyleRepository
    ) {
        $this->applicationRepository = $applicationRepository;
        $this->applicationKeyValueRepository = $applicationKeyValueRepository;
        $this->medicalHistoryRepository = $medicalHistoryRepository;
        $this->lifestyleRepository = $lifestyleRepository;
    }

    public function zip(Request $request)
    {
        $request->session()->forget('application');
        return view('application.zip');
    }

    public function storeZip(Request $request)
    {
        $request->validate([
            'zip' => ['required', new ValidateUsZip()]
        ]);
        $request->session()->put('application.zip', $request->input('zip'));
        return redirect(route('app.basicInfo'));
    }


    public function basicInfo(ZipDetails $zipDetails, Request $request)
    {
        if ($request->session()->missing('application.zip')) {
            return redirect(route('app.zip'));
        }
        $zipData = $zipDetails->getZipDetails($request->session()->get('application.zip'));
        return view('application.basic_info_form', [
            'zipDetails' => $zipData
        ]);
    }

    public function storeBasicInfo(StoreBasicInfo $request)
    {
        $application = $this->applicationRepository->store($request);
        $this->applicationRepository->storeDetails($application, $request);
        $request->session()->put('application.id', $application->id);
        return redirect(route('app.essentialInfo'));
    }

    public function essentialInfo(Request $request)
    {
        if ($request->session()->missing('application.id')) {
            return redirect(route('app.zip'));
        }
        $application = $this->applicationRepository->getOne($request->session()->get('application.id'));
        if (!$application) {
            return redirect(route('app.zip'));
        }
        $app_no = $application->detail->app_no;
        return view('application.essential_info_form', [
            'app_no' => $app_no
        ]);
    }

    public function storeEssentialInfo(StoreEssentialInfo $request)
    {
        $this->applicationKeyValueRepository->storeKeyValue($request->except('_token'), $request->session()->get('application.id'));
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
        $application = $this->applicationRepository->getOne($request->session()->get('application.id'));
        $application->medicalHistory()->sync($request->except(['_token', 'is_family_history_positive']));
        $this->applicationKeyValueRepository->storeKeyValue($request->only('is_family_history_positive'), $request->session()->get('application.id'));
        return redirect(route('app.lifeStyle'));
    }

    public function lifeStyle()
    {
        $lifestyles = $this->lifestyleRepository->getAll();
        return view('application.lifestyles', [
            'lifestyles' => $lifestyles
        ]);
    }

    public function storeLifeStyle(Request $request)
    {
        $application = $this->applicationRepository->getOne($request->session()->get('application.id'));
        $application->lifestyle()->sync($request->except(['_token', 'is_vehical_accident_violations_positive']));
        $this->applicationKeyValueRepository->storeKeyValue($request->only('is_vehical_accident_violations_positive'), $request->session()->get('application.id'));
        return redirect(route('app.registerEmail'));
    }

    public function registerEmail(Request $request)
    {
        return view('application.register_email');
    }

    public function storeRegisterEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $application = $this->applicationRepository->getOne($request->session()->get('application.id'));
        $application->detail()->update([
            'email' => $request->email
        ]);
        $application->refresh()->load('detail');
        Mail::to($application->detail->email)->send(new UserRegistered($application));
        return redirect(route('app.uploadDocuments'));
    }
}
