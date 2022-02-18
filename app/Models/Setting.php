<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;
class Setting extends Model
{
    use HasFactory,SoftDeletes,LogsActivity;


    protected $guarded = [];

    // Logger
    protected static $logFillable = true;
    protected static $logAttributes = ['value'];
    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        $user_name = auth()->user()->name ?? '';
        return "This Setting has been {$eventName} by " . $user_name;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    
}
