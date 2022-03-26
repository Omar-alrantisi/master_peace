<?php
namespace App\Domains\Lookups\Services;

use App\Domains\Lookups\Models\Page;
use App\Services\BaseService;

class PageService extends BaseService
{

    protected $entityName = 'Page';


    /**
     * @param Page $page
     */
    public function __construct(Page $page)
    {
        $this->model = $page;


    }

}
