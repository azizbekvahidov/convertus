<?

class Region extends CActiveRecord
{
    public function addRegion(){

    }

    public function getRegionListByParentId($parentId){
        $list = array();
        $model = Yii::app()->db->createCommand()
                    ->select()
                    ->from('region')
                    ->where('parentId = :id',array(':id'=>$parentId))
                    ->queryAll();
        foreach ($model as $val) {
            $list[$val['regionId']] = $val['regionName'];
        }

        return $list;
    }

    public function getRegionListById($parentId){
        $list = array();
        $model = Yii::app()->db->createCommand()
            ->select()
            ->from('region')
            ->where('parentId = :id',array(':id'=>$parentId))
            ->queryAll();
        foreach ($model as $val) {
            $list[$val['regionId']] = $val['regionName'];
        }

        return $list;
    }

}