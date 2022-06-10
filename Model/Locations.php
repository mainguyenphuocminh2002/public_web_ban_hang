<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

/**
 * Description of Locations
 *
 * @author MSI
 */
class Locations extends DB implements IModelService{

    public $Id, $Name, $ParentsId, $IsPublic, $Note;

    //put your code here
    public function __construct($loc = null) {
        parent::$TableName = "locations";
        parent::__construct();
        if ($loc) {
            if (!is_array($loc) && !is_object($loc)) {
                $id = $loc;
                $loc = $this->GetById($id);
            }
            if ($loc) {
                $this->Id = isset($loc->Id) ? $loc->Id : 0;
                $this->Name = isset($loc->Name) ? $loc->Name : 0;
                $this->ParentsId = isset($loc->ParentsId) ? $loc->ParentsId : 0;
                $this->IsPublic = isset($loc->IsPublic) ? $loc->IsPublic : 0;
                $this->Note = isset($loc->Note) ? $loc->Note : 0;
            }
        }
    }

    public function Delete($Id) {
        $this->DeleteById(['id'=>$Id]);
    }

    public function GetById($Id) {
        return $this->SelectById(['id'=>$Id]);
    }

    public function GetItems($params, $indexPage, $pageNumber, &$total) {
        if (isset($params['keyword']) && !empty($params['keyword'])) {
            $dataPT['PT']['indexPage'] = $indexPage;
            $dataPT['PT']['pageNumber'] = $pageNumber;
            $dataPT['PT']['keyword'] = !empty($params['keyword']) ? '%' . $params['keyword'] . '%' : '';
            $where = "`username` like :keyword";
            return $this->Search($where, $total,$dataPT);
        }
        $dataPT['PT']['indexPage'] = $indexPage;
        $dataPT['PT']['pageNumber'] = $pageNumber;
        return $this->SelectPT(1, $total, $dataPT);
    }

    public function Post($model) {
        $this->Insert($model);
    }

    public function Put($model,$datawhere) {
        $this->UpdateRow($model,$datawhere);
    }

    public static function ToSelect($pid = 0) {
        $loc = new Locations();
        return $loc->SelectToOptions("`ParentsId`= '{$pid}'",[], ["Id", "Name"]);
    }

    public static function btnThem() {
        if (Permission::CheckPremision([User::Admin, md5(\Controller\locations::class . "_put")]) == false) {
            return;
        }
        ?> 
        <a href="/locations/post/ " class="btn btn-primary" >Thêm Mới</a>
        <?php
    }

    public function Parents() {
        return new Locations($this->ParentsId);
    }

    public function btnPut() {
        if (Permission::CheckPremision([User::Admin, md5(\Controller\locations::class . "_put")]) == false) {
            return;
        }
        ?> 
        <a href="/locations/put/<?php echo $this->Id ?>" class="btn btn-primary" >Sửa</a>
        <?php
    }

    public function btnDelete() {
        if (Permission::CheckPremision([User::Admin, md5(\Controller\locations::class . "_delete")]) == false) {
            return;
        }
        ?> 
        <a title="Xóa Tỉnh Thành Này?" href="/locations/delete/<?php echo $this->Id ?>" class="btn btn-danger" >Xóa</a>
        <?php
    }

    public function GetByIdParents($idTinh) {
        $where = "`ParentsId` = :idTinh ";
        $data['idTinh'] = $idTinh;
        return $this->Select($where,$data);
    }

}
