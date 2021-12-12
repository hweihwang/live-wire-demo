<?php

namespace App\Services\Todo;

use App\Models\Todo;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;

class TodoService implements BaseService
{
    protected Todo $model;

    public function __construct(Todo $model)
    {
        $this->model = $model;
    }

    public function add($params)
    {
        DB::beginTransaction();
        try {
            $result = $this->model->create($params);

            DB::commit();

            return $result;
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function edit($params)
    {
        DB::beginTransaction();
        try {
            if(empty($params['id'])) {
                throw new \Exception('id is required');
            }

            $result = $this->model->find($params['id']);

            if(empty($result)) {
                throw new \Exception('id is not found');
            }

            $result->update($params);

            DB::commit();

            return $result;
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function delete($params)
    {

    }
}
