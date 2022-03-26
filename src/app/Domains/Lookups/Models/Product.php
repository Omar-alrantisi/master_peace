<?php

namespace App\Domains\Lookups\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $price
 * @property string $sale_price
 * @property string $short_desc
 * @property string $desc
 * @property string deleted_at
 * @property string $img
 * @property string $created_at
 * @property string $updated_at
 * @property Category $category
 */
class Product extends BaseModel
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
    protected $fillable = ['category_id', 'title', 'price', 'sale_price', 'short_desc', 'desc', 'img', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
