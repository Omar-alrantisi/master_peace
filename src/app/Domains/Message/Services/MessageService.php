<?php
namespace App\Domains\Message\Services;

use App\Domains\Message\Models\Message;
use App\Services\BaseService;
class MessageService extends BaseService
{

    protected $entityName = 'Message';


    /**
     * @param Message $message
     */
    public function __construct(Message $message)
    {
        $this->model = $message;


    }


}
