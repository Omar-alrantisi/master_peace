<?php
namespace App\Domains\Worker\Services;

use App\Domains\Worker\Models\Worker;
use App\Services\BaseService;
use App\Services\StorageManagerService;
class WorkerService extends BaseService
{

    protected $entityName = 'Worker';
    protected $storageManagerService;

    /**
     * @param Worker $worker
     * @param StorageManagerService $storageManagerService
     */
    public function __construct(Worker $worker ,StorageManagerService $storageManagerService)
    {
        $this->model = $worker;
        $this->storageManagerService = $storageManagerService;

    }
    public function store(array $data = [])
    {
//        $data['is_verified'] = false;

        if(!empty($data['personal_photo']) && request()->hasFile('personal_photo')){
            try {
                $this->upload($data,'personal_photo');
            } catch (\Exception $e) {
                throw $e;
            }
        }

        if(!empty($data['image']))
        {
            $this->upload($data, 'image');
        }
        $result = parent::store($data);
        return $result;
    }

    public function update($entity, array $data = [])
    {

        //echo json_encode($data['is_verified']);exit();

        $event = $this->getById($entity);
        if(!empty($data['personal_photo']) && request()->hasFile('personal_photo')){
            try {
                $this->storageManagerService->deletePublicFile($event->personal_photo,'personal_photo');
                $this->upload($data,'personal_photo');
            } catch (\Exception $e) {
                throw $e;
            }
        }

        if(request()->hasFile('image')){

            $this->storageManagerService->deletePublicFile($event,$event->image,'workers/images');
            $this->upload($data, 'image');
        }else{
            $data['image'] = $event->image;
        }

        if(isset($data['is_verified'])){
            $data['is_verified'] = 1;
            //echo json_encode($data['is_verified']);exit();
        }
        else {
            $data['is_verified'] = 0;
        }

        $store = parent::update($entity, $data);
        return $store;
    }

    private function upload(array &$data, $fileColumn, string $directory = 'workers/images')
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
