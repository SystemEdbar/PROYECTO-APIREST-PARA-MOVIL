<?php

namespace App\Models;

use Database\Factories\ClienteFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Clientes extends Model
{
    use HasFactory;
    protected $guarded = ['cli_id'];
    protected $table = "clientes";
    protected $primaryKey = 'cli_id';
    public $timestamps = false;

    protected static function newFactory()
    {
        return ClienteFactory::new();
    }
}
