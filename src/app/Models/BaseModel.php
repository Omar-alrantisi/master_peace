<?php

namespace App\Models;

use App\Models\Traits\RelationHasMany;
use ErrorException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use ReflectionClass;
use ReflectionMethod;
use Spatie\Activitylog\Traits\LogsActivity;

class BaseModel extends Model
{
    use HasFactory,
        RelationHasMany,
        LogsActivity;

    /**
     * @var bool
     */
    protected static bool $logFillable = true;

    /**
     * @var bool
     */
    protected static bool $logOnlyDirty = true;

    /**
     * @param mixed $value
     * @return false|Carbon
     */
    protected function asDateTime($value) {

        $tz = null;

        // If the user is logged in, get it's timezone
        if (Auth::check()) {
            $tz = Auth::user()->timezone;
        }

        if ($value instanceof Carbon) {
            return $value;
        }

        $value = parent::asDateTime($value);
        $value->timezone = $tz;

        return $value;
    }

    public static function boot() {
        parent::boot();

        static::deleted(function($item) {
            $relationMethods = $item->relationships();
            foreach($relationMethods as $relationMethod){
                $relationMethod->invoke($item)->delete();
            }
        });
    }
}
