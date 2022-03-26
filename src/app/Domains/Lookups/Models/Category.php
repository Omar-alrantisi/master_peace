<?php

namespace App\Domains\Lookups\Models;

use App\Models\BaseModel;
use App\Domains\Worker\Models\Worker;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string $title
 * @property string $desc
 * @property string deleted_at
 * @property string $created_at
 * @property string $updated_at
 */
class Category extends BaseModel
{
    use SoftDeletes;


    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['title', 'image', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function worker()
    {
        return $this->hasMany(Worker::class);
    }
}
