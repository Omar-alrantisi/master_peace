<?php
namespace App\Domains\Lookups\Services;

use App\Domains\Lookups\Models\Product;
use App\Services\StorageManagerService;
use App\Services\BaseService;

class ProductService extends BaseService
{
    protected $storageManagerService;

    protected $entityName = 'Product';

    /**
     * @param Product $product
     * @param StorageManagerService $storageManagerService
     */
    public function __construct(Product $product,StorageManagerService $storageManagerService)
    {

        $this->model = $product;
        $this->storageManagerService = $storageManagerService;
    }
    public function store(array $data = [])
    {
        if(!empty($data['img']))
        {
            $this->upload($data, 'img');
        }
        $result = parent::store($data);
        return $result;
    }

    public function update($entity, array $data = [])
    {
        $event = $this->getById($entity);
        if(request()->hasFile('img')){
            //$data = $this->upload($data, 'img');
            $this->storageManagerService->deletePublicFile($event,$event->img,'product/img');
            $this->upload($data, 'img');
        }else{
            $data['img'] = $event->img;
        }
        $store = parent::update($entity,$data);
        return $store;
    }

    private function upload(array &$data, $fileColumn, string $directory = 'product/img')
    {
        try{
            $data[$fileColumn] = $this->storageManagerService->uploadPublicFile($data[$fileColumn],$directory);
            //return $data;
        }
        catch (\Exception $exception){
            throw $exception;
        }
    }


}
