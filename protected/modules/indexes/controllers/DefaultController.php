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

    public function actionajaxSearch(){
        $value = $_POST['val'];
        $str = '';
        $function = new Functions();
        $tree = $function->getRegion($value);
        $this->renderPartial('ajaxSearch',array(
            
        ));
    }


}