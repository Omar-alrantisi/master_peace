<?php
namespace App\Domains\Lookups\Services;

use App\Domains\Lookups\Models\Category;
use App\Services\BaseService;
use App\Services\StorageManagerService;
class CategoryService extends BaseService
{

    protected $entityName = 'Category';
    protected $storageManagerService;

    /**
     * @param Category $category
     * @param StorageManagerService $storageManagerService
     */
    public function __construct(Category $category ,StorageManagerService $storageManagerService)
    {
        $this->model = $category;
        $this->storageManagerService = $storageManagerService;

    }
    public function store(array $data = [])
    {
        if(!empty($data['image']))
        {
            $this->upload($data, 'image');
        }
        $result = parent::store($data);
        return $result;
    }

    public function update($entity, array $data = [])
    {
        $event = $this->getById($entity);
        if(request()->hasFile('image')){
            //$data = $this->upload($data, 'img');
            $this->storageManagerService->deletePublicFile($event,$event->image,'categories/images');
            $this->upload($data, 'image');
        }else{
            $data['image'] = $event->image;
        }
        $store = parent::update($entity,$data);
        return $store;
    }
    private function upload(array &$data, $fileColumn, string $directory = 'categories/images')
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
