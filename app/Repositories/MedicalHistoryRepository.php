<?php

namespace App\Repositories;

use App\Models\MedicalHistory;

class MedicalHistoryRepository extends BaseRepository
{
    protected $medicalHistory;

    public function __construct(MedicalHistory $medicalHistory)
    {
        parent::__construct($medicalHistory);
        $this->medicalHistory = $medicalHistory;
    }
}
