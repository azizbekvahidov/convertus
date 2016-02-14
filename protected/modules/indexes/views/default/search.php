<div class="region selects"><?=CHtml::dropDownList('region','',$list,array('empty'=>'Выберите Регион'))?></div>
<div class="address selects"><?=CHtml::dropDownList('address','',array(),array('empty'=>'Выберите Регион' ))?></div>
<div class="street selects"><?=CHtml::dropDownList('street','',array(),array('empty'=>'Выберите Регион'))?></div>
<style>
    .selects{
        margin-bottom: 25px;
    }
</style>
<div id="data"></div>
<input id="index" name="index">
<div id="fullAddr"> </div>
<script>
    $(document).ready(function(){
        $('#region').chosen({
            no_results_text: "Ничего не найдено!"
        });
        $('#address').chosen({
            no_results_text: "Ничего не найдено!"
        });
        $('#street').chosen({
            no_results_text: "Ничего не найдено!"
        });

    });
    $(document).on('change','#region',function(){
        var value = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->createUrl('indexes/default/ajaxSearch'); ?>",
            data: "val="+value,
            success: function(data){
                $('.address').html(data);
                $('#address').chosen({
                    no_results_text: "Ничего не найдено!"
                });
            }
        });
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->createUrl('indexes/default/getAddress'); ?>",
            data: "val="+0,
            success: function(data){
                $('.street').html(data);
                $('#street').chosen({
                    no_results_text: "Ничего не найдено!"
                });
            }
        });
    });

    $(document).on('change','#address',function () {
        var value = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->createUrl('indexes/default/getAddress'); ?>",
            data: "val=" + value,
            success: function (data) {
                $('.street').html(data);
                $('#street').chosen({
                    no_results_text: "Ничего не найдено!"
                });
            }
        });
    });
    $(document).on('change','#street',function(){
        var value = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->createUrl('indexes/default/getIndex'); ?>",
            data: "val="+value,
            success: function(data){
                $('#index').val(data);
                $('#fullAddr').text($("#region  option:selected").text() + " " + $("#address  option:selected").text() + " " + $("#street  option:selected").text())
            }
        });
    });

</script>