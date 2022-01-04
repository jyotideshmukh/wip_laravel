<?php

namespace App\Repositories;

use App\Models\ApplicationKeyValue;

class ApplicationKeyValueRepository extends BaseRepository
{

    protected $applicationKeyValue;

    public function __construct(ApplicationKeyValue $applicationKeyValue)
    {
        $this->applicationKeyValue = $applicationKeyValue;
    }

    public function storeKeyValue(array $keyValue, $applicationId)
    {
        foreach ($keyValue as $key => $val) {
            $this->applicationKeyValue::create([
                'application_id' => $applicationId,
                'key' => $key,
                'value' => $val,
            ]);
        }
    }
}
