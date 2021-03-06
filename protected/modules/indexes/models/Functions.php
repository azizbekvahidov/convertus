<?
class Functions
{
    public function checkChild($id){
        $model = Yii::app()->db->createCommand()
            ->select()
            ->from('region r')
            ->where('r.parentId = :id',array(':id'=>$id))
            ->queryAll();
        if(!empty($model))
            return true;
        else
            return false;
    }

    public function prepareTree($id)
    {
        $models = Yii::app()->db->createCommand()
            ->select()
            ->from('region r')
            ->where('r.parentId = :id',array(':id'=>$id))
            ->queryAll();
        return $models;
    }



    public function buildTree($arr,$str = '')
    {
        $select = array();
        foreach ($arr as $val) {
        }
        return $str;
    }

    public function getRegion($id)
    {
        $str = array();
        $model = Yii::app()->db->createCommand()
                    ->select()
                    ->from('region r')
                    ->where('r.parentId = :id',array(':id'=>$id))
                    ->queryAll();
        foreach ($model as $val) {
            $check = $this->checkChild($val['regionId']);
            if($check == true){
                foreach($this->getRegion($val['regionId']) as $key => $value){
                    $str[$key] = $val['regionName']." ".$value;
                }
            }
            else {
                $str[$val['regionId']] = $val['regionName'];
            }
        }
        return $str;

    }

    public function getAddress($id){
        $list = array();
        $model = Yii::app()->db->createCommand()
            ->select()
            ->from('address adr')
            ->where('adr.regionId = :id',array(':id'=>$id))
            ->queryAll();
        foreach ($model as $val) {
            $list[$val['addressId']] = $val['streetName']." ".$val['laneName']." ".$val['house'];
        }
        return $list;

    }
}