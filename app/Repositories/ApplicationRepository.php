<?php

namespace App\Repositories;

use App\Models\Application;

class ApplicationRepository extends BaseRepository
{
    protected $application;

    public function __construct(Application $application)
    {
        parent::__construct($application);
        $this->application = $application;
    }

    public function store($request)
    {
        $params['zip'] = $request->input('zip');
        $params['app_no'] = 'WIP' . rand(1, 1000);
        $application = $this->application->create($params);
        return $application;
    }

    public function storeDetails($application, $request)
    {
        $application->detail()->create($request->all());
    }
}
