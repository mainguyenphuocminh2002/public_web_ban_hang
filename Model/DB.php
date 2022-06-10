<?php

namespace Model;

class DB {

    public static $TableName;
    public static $Debug;
    private static $Connect;
    public static $fetch = \PDO::FETCH_OBJ;

    public function __construct() {
        if (self::$Connect == null) {
            global $INI;
            try {
                self::$Connect = new \PDO($INI['dburl'], $INI['username'], $INI['password']); 
                self::$Connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_SILENT);
            } catch (\PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }
    }

    protected function GetRows($sql,$data) {
        $arr = [];
        if (self::$Debug)
            echo $sql;
        $res = self::$Connect->prepare($sql);
        if($data){
            foreach($data as $key => $val){
                if($key === 'PT'){
                    $val['indexPage'] = ($val['indexPage']-1) * $val['pageNumber'];
                    $val['indexPage'] = max($val['indexPage'], 0);
                    if($val['indexPage'] == 0){
                        for($i = 0;$i<$val['pageNumber'];$i++){
                                $val['indexPage'] = ($i-1) * $val['pageNumber'];
                                $val['indexPage'] = max($i, 0);
                                $res->bindValue(":indexPage",$i,\PDO::PARAM_INT);
                                $res->bindValue(":pageNumber",$val['pageNumber'],\PDO::PARAM_INT);
                                if(isset($val['keyword'])){
                                    $res->bindValue("keyword",$val['keyword']);
                                }
                                if($res->execute()){
                                    $kq = $res->fetch(self::$fetch);
                                    if(!empty($kq)){
                                        array_push($arr,$kq);
                                    }
                                }
                            }
                    }else{
                        $val['pageNumber'] = $val['indexPage'] +  $val['pageNumber'];
                        for($i = $val['indexPage'];$i<$val['pageNumber'];$i++){
                            $val['indexPage'] = ($val['indexPage']-1) * $val['pageNumber'];
                            $val['indexPage'] = max($val['indexPage'], 0);
                            $res->bindValue(":indexPage",$i,\PDO::PARAM_INT);
                            $res->bindValue(":pageNumber",$val['pageNumber'],\PDO::PARAM_INT);
                            if(isset($val['keyword'])){
                                $res->bindValue("keyword",$val['keyword']);
                            }
                            if($res->execute()){
                                $kq = $res->fetch(self::$fetch);
                                if(!empty($kq)){
                                    array_push($arr,$kq);
                                }
                            }
                        }
                    }
                }else{
                        $res->bindValue(":$key",$val);
                }
            }
        }
        $res->execute();
        if(!empty($arr)){
            return $arr;
        }
        return $res->fetchAll(self::$fetch);
    }

    protected function GetRow($sql,$data) {
        if (self::$Debug)
            echo $sql;
        $res = self::$Connect->prepare($sql);
        if($res){
            if($data){
                foreach($data as $key => $val)
                {
                    if($key == 'PT'){
                        if(isset($val['keyword'])){
                            $res->bindValue(":keyword",$val['keyword']);
                        }
                    }else{
                            $res->bindValue(":$key",$val);
                        }
                    }
            }
                $res->execute();
                return $res->fetch(self::$fetch);
        }else{
            return null;
        }
    }

    // // đém so dòng
    protected function SelectCount($where,array $data = []) {
        $TableName = self::$TableName;
        $sql = "SELECT COUNT(*) as `Total` FROM `{$TableName}` WHERE {$where}";
        if(isset($data['PT'])){
            $res = $this->GetRow($sql,$data);
        }else{
            $res = $this->GetRow($sql,[]);
        }
        if(!$res){
            return null;
        }
        return $res->Total;
    }

    // Phan Trang
    protected function SelectPT($where, &$total = 0, array $data = [], $moreWhere = '' ) {
        $TableName = self::$TableName;
        $total = $this->SelectCount($where,$data);
        if($moreWhere !== ''){
            $sql = "SELECT * FROM `{$TableName}` WHERE {$where} limit :indexPage , :pageNumber AND $moreWhere = :$moreWhere";
        }else{
            $sql = "SELECT * FROM `{$TableName}` WHERE {$where} limit :indexPage , :pageNumber";
        }
        $data['PT']['total'] = $total;
        return $this->GetRows($sql,$data);
    }

    protected function Search($where, &$total = 0,array $data = []){
        $total = $this->SelectCount($where,$data);
        $where = "{$where} limit :indexPage,:pageNumber";
        $data['PT']['total'] = $total;
        return $this->Select($where,$data);
    }

    // // lấy 1 dòng
    public function SelectRow($where,$data ,$col = []) {
        $TableName = self::$TableName;
        $sql = "SELECT * FROM `{$TableName}` WHERE {$where}";
        if ($col) {
            $strCol = implode("`,`", $col);
            $sql = "SELECT `{$strCol}` FROM `{$TableName}` WHERE {$where}";
        }
        return $this->GetRow($sql,$data);
    }

    public function SelectById($id,$col = []) {
        $where = "`id` = :id";
        return $this->SelectRow($where,$id,$col);
    }

    // public function GetToSelect($where, $col) {
    //     $TableName = self::$TableName;
    //     $sql = "SELECT * FROM `{$TableName}` WHERE {$where}";
    //     if ($col) {
    //         $strCol = implode("`,`", $col);
    //         $sql = "SELECT `{$strCol}` FROM `{$TableName}` WHERE {$where}";
    //     }
    //     return $this->GetRowsToSelect($sql, $col);
    // }

    // lấy nhiều dòng
    public function Select($where,$data = [], $col = []) {
        $TableName = self::$TableName;
        $sql = "SELECT * FROM `{$TableName}` WHERE {$where}";
        if ($col) {
            $strCol = implode("`,`", $col);
            $sql = "SELECT `{$strCol}` FROM `{$TableName}` WHERE {$where}";
        }
        return $this->GetRows($sql,$data);
    }

    // // sửa

    // /**
    //  * sửa dữ liệu trong databse
    //  * @param {type} parameter
    //  */
    public function Update(array $model, $where,array $datawhere) {
        $TableName = self::$TableName;
        $strsql = "";
        foreach ($model as $col => $val) {
                $strsql .= "`{$col}`= :{$col},";
        }
        $strsql = substr($strsql, 0, -1);
        $sql = "UPDATE `{$TableName}` SET {$strsql} WHERE {$where}";
        $res = self::$Connect->prepare($sql);
        foreach($datawhere as $key => $value){
            $res->bindValue(":$key",$value);
        }
        foreach($model as $key => $value){
            $res->bindValue(":$key",$value);
        }
        if (self::$Debug == TRUE){
            echo $sql;
            die();
        }
        if (!$res) {
            throw new \Exception(self::$Connect->error);
        }
        $res->execute();
        return self::$Connect;
    }

    function UpdateRow(array $model,array $datawhere) {
        $where = " `id` = :id ";
        return $this->Update($model, $where,$datawhere);
    }

    // // xóa data base

    public function DeleteDB($where,$data=[]) {
        $TableName = self::$TableName;
        $sql = "DELETE FROM `{$TableName}` WHERE {$where}";
         if (self::$Debug == TRUE)
                echo $sql;
        $res = self::$Connect->prepare($sql);
        foreach($data as $key => $value){
           $res->bindValue(":$key",$value);
        }
        $res->execute();
        return self::$Connect;
    }

    public function DeleteById($data=[]) {
        $where = " `id` = :id ";
        return $this->DeleteDB($where,$data);
    }

    // //  Them6
    public function Insert($model) {
        $TableName = self::$TableName;
        $col = array_keys($model);
        $colstr = implode("`,`", $col);
        $valstr =":" . implode(", :", array_keys($model));
        $sql = "INSERT INTO `{$TableName}`(`{$colstr}`) VALUES ({$valstr})";
        $res = self::$Connect->prepare($sql);
        foreach($model as $key => $value){
            $res->bindValue(":$key",$value);
        }
        if (self::$Debug == TRUE) {
            echo $sql;
        }
        if (!$res) {
        throw new \Exception(self::$Connect->error);
        }
        $res->execute();
        return self::$Connect;
    }

    // public function GetRowsToSelect($sql, $col) {
    //     if (self::$Debug) {
    //         var_dump($col);
    //         echo $sql;
    //     }
    //     $res = self::$Connect->query($sql);
    //     $a = [];
    //     if ($res) {
    //         while ($row = $res->fetch_assoc()) {
    //             $a[$row[$col[0]]] = $row[$col[1]];
    //         }
    //     }
    //     return $a;
    // }

    public function SelectToOptions($where,$data = [], $columns) {
        $a = (array) $this->Select($where,$data, $columns);
        $d = [];
        $a = \Model\Common::ChangeObjectToArray($a);
        foreach ($a as $value) {
            if (isset($columns[2])) {
                $d[$value[$columns[0]]] = $value[$columns[1]] . " _ " . $value[$columns[2]];
            } else {
                $d[$value[$columns[0]]] = $value[$columns[1]];
            }
        }
        return $d;
    }

}
