<?=CHtml::dropDownList('region','',$list,array('empty'=>'Выберите Регион'))?>
<br>
<br>

<div id="data"></div>
<input id="index" name="index">
<script>
    $('#region').chosen({
        no_results_text: "Oops, nothing found!",
    }).change(function(){
        var value = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->createUrl('indexes/default/ajaxSearch'); ?>",
            data: "val="+value,
            success: function(data){
                    $('#data').html(data);
            }
        });
    });
</script>