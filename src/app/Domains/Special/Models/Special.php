<?php

namespace App\Domains\Special\Models;

use App\Models\BaseModel;
use App\Domains\Worker\Models\Worker;


/**
 * @property integer $id
 * @property integer $worker_id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at

 */
class Special extends BaseModel
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['worker_id', 'title', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
