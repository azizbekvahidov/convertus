<? 
class Functions 
{
    public function createAddress($index,$whom,$address,$reestrId){
        Yii::app()->db->createCommand()->insert('addresses',array(
            'address'=>$address,
            'whom'=>$whom,
            'index'=>$index,
            'IDUser'=>1//Yii::app()->user->id()
        ));
        $id = Yii::app()->db->lastInsertID;
        $model = $this->createReestr($id,$reestrId);
        return $model;
    }

    public function createReestr($id,$reestrId){
        Yii::app()->db->createCommand()->insert('reestrAddr',array(
            'reestrId'=>$reestrId,
            'addressId'=>$id
        ));
        return Yii::app()->db->getLastInsertID();;
    }
}