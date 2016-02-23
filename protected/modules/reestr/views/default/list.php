<div class="list-group">
    <? foreach ($model as $val) {
        echo CHtml::link('Реестр №'.$val['reestrId'].' от '.date('d-m-Y',strtotime($val['reestrDate'])),array('default/create?id='.$val['reestrId']),array('class'=>'list-group-item'));
    }?>
</div>