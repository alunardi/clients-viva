<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $statusArray = array(
        1 => 'Ativo',
        2 => 'Inativo',
        3 => 'Excluído',
    );

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const STATUS_EXCLUDED = 3;

    protected $fillable = [
        'name', 'address', 'phone', 'status', 'birth_date'
    ];
}
