<?php
/*
 * implement patient interface to this Eloquent
 */
namespace :uc:vendor\:uc:package\Http\Repositories\Eloqouent;

use :uc:vendor\:uc:package\Http\Models\:uc:package;
use :uc:vendor\:uc:package\Http\Repositories\:uc:packageRepository;


class :uc:packageEloquent implements :uc:packageRepository
{
    private $model;

    public function __construct(:uc:package $:uc:package)
    {
        $this->model = $:uc:package;
    }

    /**
     * get user from database
     */
    public function get() {

    }

    /**
     * create user to the database
     */
    public function create(array $attributes)
    {
        if ($id = $this->model->insertGetId($attributes)) {
            $attributes['id'] = $id;
            return $attributes;
        }
        return false;
    }

    /**
     * get user by specific id
     */
    public function getById(array $attributes)
    {
       return $this->model->where($attributes)->get();
    }

    /**
     * update specific user
     */
    public function update(array $attributes, array $keyValuePair)
    {
        return $this->model->where($keyValuePair)->update($attributes);
    }

    /**
     * @param $id
     * @param array $keyValuePair
     * @return bool|null
     * @throws \Exception
     */
    public function delete(array $keyValuePair) {
        return $this->model->where($keyValuePair)->delete();
    }

    public function getOneByManyWhere(array $attributes)
    {
        // TODO: Implement getOneByManyWhere() method.
    }
}