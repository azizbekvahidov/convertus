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
        echo "<pre>";
        print_r($function->buildTree($tree,$value,$str));
        echo "</pre>";
        $this->renderPartial('ajaxSearch',array(
            
        ));
    }


}