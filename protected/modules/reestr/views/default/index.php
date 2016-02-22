<a href="#" class="create">Создать адресат</a> или <a href="#" class="choose">Выбрать из адресной книги</a>
<div class="col-md-12" >
    <input type="text" name="index" class="col-md-2" > <input type="text" name="name" class="col-md-10" >
    <input type="text" name="address" class="col-md-12" >
</div>
<div>
    <?=Yii::app()->runController('/reestr/default/addresses');?>
</div>