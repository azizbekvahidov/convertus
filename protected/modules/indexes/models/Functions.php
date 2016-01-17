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

    public function ToStr($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
        $str = '';
        if(!is_array($arr['regId'])){
            $str .= $this->ToStr($arr['regId']);
        }
        else{
            $str[$arr['regionId']] .= $arr['regionName'];
        }
        return $str;
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
        $arr = array();
        $model = Yii::app()->db->createCommand()
                    ->select()
                    ->from('region r')
                    ->where('r.parentId = :id',array(':id'=>$id))
                    ->queryAll();
        foreach ($model as $val) {

            $check = $this->checkChild($val['regionId']);
            if($check == true){
                $arr['regId'] = $val +  $this->getRegion($val['regionId']);
            }
            else{
                $arr['regId'] = $val;
            }
            $str = $this->ToStr($arr);
        }
        return $arr;

    }

    public function getAddress($regId){
        $model = Yii::app()->db->createCommand()
                    ->select()
                    ->from('address adr')
                    ->join('region r','r.regionId = adr.regionId')
                    ->queryAll();
        echo "<pre>";
        print_r($model);
        echo "</pre>";
    }
}