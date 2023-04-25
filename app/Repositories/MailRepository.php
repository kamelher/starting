<?php

namespace App\Repositories;

use App\Models\Mail;
use App\Repositories\BaseRepository;

class MailRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'objet',
        'ref',
        'body'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Mail::class;
    }
}
