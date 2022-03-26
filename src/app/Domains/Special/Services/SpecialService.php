<?php
namespace App\Domains\Special\Services;

use App\Domains\Special\Models\Special;
use App\Services\BaseService;
class SpecialService extends BaseService
{

    protected $entityName = 'Special';


    /**
     * @param Special $special
     */
    public function __construct(Special $special)
    {
        $this->model = $special;


    }


}
