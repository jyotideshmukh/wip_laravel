<?php

namespace App\Repositories;

use App\Models\Lifestyle;

class LifestyleRepository extends BaseRepository
{
    protected $lifestyle;

    public function __construct(Lifestyle $lifestyle)
    {
        parent::__construct($lifestyle);
        $this->lifestyle = $lifestyle;
    }
}
