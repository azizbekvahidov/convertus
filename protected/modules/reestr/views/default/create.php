<div class="col-md-3">

</div>
<div class="col-md-9">
    <h2>Реестр писем №<?=$model['reestrId']?> от <?=date('d.m.Y',strtotime($model['reestrDate']))?></h2>
    <a href="#" class="create">Создать адресат</a> или <a href="#" class="choose">Выбрать из адресной книги</a>
    <button type="button" id="addReestr">Добавить в реестр</button>
    <form id="createAddr" class="show clearfix " >
        <div class="col-md-12" >
            <input type="text" maxlength="6" name="index" id="index" class="col-md-2" > <input type="text" name="name" class="col-md-10" >
            <input type="text" name="address" class="col-md-12" >
        </div>
    </form>
    <form id="addAddr" class="hide clearfix ">
        <div>
            <?=Yii::app()->runController('/reestr/default/addresses');?>
        </div>
    </form>
    <div id="data" class="clearfix">
        <ul class="list-group">
            <? foreach ($models as $val) {?>
                <li class="list-group-item">
                    <?=$val['whom']?>    <a href="#" class="remove"><i class="glyphicon glyphicon-trash"></i></a><br>
                    <?=$val['index']?> <?=$val['address']?>
                </li>
            <?}?>
        </ul>
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
            if($.isNumeric($('#index').val())) {
                var data = $('#createAddr').serialize();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo $this->createUrl('default/createAddr'); ?>",
                    data: data+'&id=<?=$model['reestrId']?>',
                    success: function (data) {
                        $('#data ul').prepend(data);
                    },
                    error: function (XHR) {
                        return afterDelete(th, false, XHR);
                    }
                });
            }
            else{
                alert("введите числовой индекс");
                $('#index').val('');
            }
        }
        if($('#addAddr').hasClass('show')){
            var data = $('#addAddr').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo $this->createUrl('default/addAddr'); ?>",
                data: data+'&id=<?=$model['reestrId']?>',
                success: function (data) {
                    $('#data ul').prepend(data);
                },
                error: function (XHR) {
                    return afterDelete(th, false, XHR);
                }
            });
        }
    });
    $(document).on('click','#data a.remove',function() {
        console.log('');
        if(!confirm('Вы уверены, что хотите удалить данный элемент?')) return false;
        var th = this,
            afterDelete = function(){};
        $(this).parent().remove()
        /*$.ajax({
            type: 'POST',
            url: jQuery(this).attr('href'),
            success: function(data) {
                //jQuery('#dataTable').yiiGridView('update');
                afterDelete(th, true, data);
            },
            error: function(XHR) {
                return afterDelete(th, false, XHR);
            }
        });*/
        return false;
    });

</script>