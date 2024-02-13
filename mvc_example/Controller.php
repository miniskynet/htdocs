<?php

require_once 'model.php';

class Controller
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getUsers($id = null)
    {
        return $this->model->getUsers($id);
    }
}
