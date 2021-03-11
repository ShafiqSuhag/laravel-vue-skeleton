<?php
namespace :uc:vendor\:uc:package\Http\Repositories;

interface :uc:packageRepository
{
    public function get();

    public function create(array $attributes);

    public function getById(array $attributes);

    public function getOneByManyWhere(array $attributes);

    public function update(array $attributes, array $keyValuePair);

    public function delete(array $keyValuePair);
}