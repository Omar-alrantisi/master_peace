<?php

namespace App\Domains\Worker\Models;
use App\Domains\Special\Models\Special;
use App\Models\BaseModel;
use App\Domains\Lookups\Models\Category;
use App\Domains\Lookups\Models\City;

/**
 * @property integer $id
 * @property integer $city_id
 * @property integer $category_id
 * @property string $name
 * @property string $dob
 * @property string $title
 * @property string $area
 * @property string $description
 * @property string $image
 * @property int $price
 * @property int $years_of_experience
 * @property int $number_of_employees
 * @property string $email
 * @property boolean $is_verified
 * @property string $gender
 * @property string $additional_mobile_number
 * @property string $personal_photo
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Category $category
 * @property City $city
 * @property Special $special
 **/

class Worker extends BaseModel
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
    protected $fillable = ['city_id', 'category_id', 'name', 'dob', 'title', 'area', 'description', 'image', 'price', 'years_of_experience', 'number_of_employees', 'email', 'is_verified', 'gender', 'additional_mobile_number', 'personal_photo', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function special()
    {
        return $this->hasMany(Special::class);
    }

}


