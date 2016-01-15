<?
class Functions
{
    public function checkChild($id){
        $model = Yii::app()->db->createCommand()
            ->select()
            ->from('region r')
            ->where('r.parentId = :id',array(':id'=>$id))
            ->queryAll();
        return $model;
    }

    public function prepareTree($id)
    {
        $models = Yii::app()->db->createCommand()
            ->select()
            ->from('region r')
            ->where('r.parentId = :id',array(':id'=>$id))
            ->queryAll();
        return $models;
    /*
        $arr = array();
        echo "<pre>";
        print_r($categories);
        echo "</pre>";
        foreach($categories as $category)
        {
            if (!$category['parentId'])
                $category['parentId'] = 0;
            if(empty($arr[$category['parentId']]))
                $arr[$category['parentId']] = array();
            $arr[$category['parentId']][] = $category;
        }
        return $arr;*/
    }

    public function buildTree($arr,$parent_id,&$str = '')
    {
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
            $temp = $this->checkChild($val['regionId']);
            if(!empty($temp)){
                $arr[$val['regionId']] = $this->getRegion($val['regionId']);
            }
            else{
                $arr[$val['regionId']] = $val;
            }

        }
        return $arr;

    }
}