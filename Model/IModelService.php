<?php

namespace Model;

interface IModelService {

    public function Post($model);

    public function Put($model,$datawhere);

    public function Delete($id);

    public function GetById($id); 

    public function GetItems($params, $indexPage, $pageNumber, &$total);
}
