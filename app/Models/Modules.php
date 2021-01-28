<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modules extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'module_type_id',
        'object_id',
        'name',
        'ip_adress',
    ];

    public $timestamp = true;

    public function type()
    {
        return $this->hasOne(ModuleTypes::class, 'id', 'module_type_id');
    }

    public function object()
    {
        return $this->belongsTo(UserObject::class, 'object_id', 'id');
    }

    public function scheduler()
    {
        return $this->belongsTo(Schedulers::class, 'id', 'module_id');
    }

    public function getCurrentParams()
    {
        return $this->belongsTo(ModuleParams::class, 'id', 'module_id');
    }
}
