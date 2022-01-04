<?php

namespace App\Repositories;

class BaseRepository
{
    protected $entity;

    public function __construct($entity)
    {
        $this->entity = $entity;
    }

    public function getOne($id)
    {
        return $this->entity::whereId($id)->first();
    }

    public function getAll()
    {
        return $this->entity::all();
    }
}
