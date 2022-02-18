<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class City extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $guarded = [];


    // Logger
    protected static $logFillable = true;
    protected static $logAttributes = ['name'];
    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        $user_name = auth()->user()->name ?? '';
        return "This Caste has been {$eventName} by " . $user_name;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

}
