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
}
