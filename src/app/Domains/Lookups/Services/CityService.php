<?php
namespace App\Domains\Lookups\Services;

use App\Domains\Lookups\Models\City;
use App\Services\BaseService;

class CityService extends BaseService
{

    protected $entityName = 'City';


    /**
     * @param City $city
     */
    public function __construct(City $city)
    {
        $this->model = $city;


    }

}
