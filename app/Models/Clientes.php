<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Clientes extends Model
{
    use LogsActivity;

    protected $table = 'clientes';
    protected $fillable = ['cli_nombre','cli_apellido','cli_telefono','cli_email','cli_domicilio'];
    protected $guarded = 'cli_id';
    protected $primaryKey = 'cli_id';
    protected static $logName = 'clientes';
    protected static $logOnlyDirty = true;
    protected static $logFillable = true;

}
