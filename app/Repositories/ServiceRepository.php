<?php

namespace App\Repositories;

use App\Models\Service;
use App\Repositories\BaseRepository;

class ServiceRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name_ar',
        'name_en',
        'thumbnail',
        'abr_latin',
        'abr_ar'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Service::class;
    }
}
