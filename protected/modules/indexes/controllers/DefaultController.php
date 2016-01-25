<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
    
    public function actionSearch(){
        $model = new Region();
        $list = $model->getRegionListById(0);
        $this->render('search',array(
            'list'=>$list
        ));
    }

    public function actionAjaxSearch(){
        $value = $_POST['val'];
        $function = new Functions();
        $tree = $function->getRegion($value);
        $this->renderPartial('ajaxSearch',array(
            'tree'=>$tree
        ));
    }

    public function actionGetAddress(){
        $value = $_POST['val'];
        $function = new Functions();
        $address = $function->getAddress($value);
        $this->renderPartial('getAddress',array(
            'address'=>$address
        ));
    }
    
    public function actiongetIndex(){
        $id = $_POST['val'];
        $model = Yii::app()->db->createCommand()
                    ->select()
                    ->from('indexes i')
                    ->where('i.addressId = :id',array(':id'=>$id))
                    ->queryRow();
        echo $model['index'];
    }


}