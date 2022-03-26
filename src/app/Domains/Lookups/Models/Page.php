<?php

namespace App\Domains\Lookups\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 */
class Page extends BaseModel
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
    protected $fillable = ['title', 'description', 'deleted_at', 'created_at', 'updated_at'];

}
