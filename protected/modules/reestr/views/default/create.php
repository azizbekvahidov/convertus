<div class="col-md-3">

</div>
<div class="col-md-9">
    <h2>Реестр писем №<?=$model['reestrId']?> от <?=date('d.m.Y',strtotime($model['reestrDate']))?></h2>
    <a href="#" class="create">Создать адресат</a> или <a href="#" class="choose">Выбрать из адресной книги</a>
    <button type="button" id="addReestr">Добавить в реестр</button>
    <form id="createAddr" class="show" >
        <div class="col-md-12" >
            <input type="text" name="index" class="col-md-2" > <input type="text" name="name" class="col-md-10" >
            <input type="text" name="address" class="col-md-12" >
        </div>
    </form>
    <form id="addAddr" class="hide">
        <div>
            <?=Yii::app()->runController('/reestr/default/addresses');?>
        </div>
    </form>
    <div id="data">

    </div>
</div>
<script>
    $(document).on('click','.create',function(){
        $("#addAddr").addClass('hide').removeClass('show');
        $("#createAddr").addClass('show').removeClass('hide');
    });
    $(document).on('click','.choose',function(){
        $("#addAddr").addClass('show').removeClass('hide');
        $("#createAddr").addClass('hide').removeClass('show');
    });
    $(document).on('click','#addReestr',function(){
        if($('#createAddr').hasClass('show')){
            console.log('create')
        }
        if($('#addAddr').hasClass('show')){
            console.log('add')
        }
    })
</script>