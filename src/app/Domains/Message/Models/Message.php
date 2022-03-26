<?php

namespace App\Domains\Message\Models;

use App\Models\BaseModel;

/**
 * @property integer $id
 * @property string $full_name
 * @property string $email
 * @property string $user_type
 * @property string $message
 * @property string $deleted_at
 */
class Message extends BaseModel
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
    protected $fillable = ['full_name', 'email', 'user_type', 'message', 'deleted_at'];

}
