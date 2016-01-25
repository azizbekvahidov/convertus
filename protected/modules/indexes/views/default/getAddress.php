<?=CHtml::dropDownList('address','',$address,array('empty'=>'Выберите Регион'))?>
<br>
<br>
<script>
    $('#address').chosen({
        no_results_text: "Oops, nothing found!",
    }).change(function(){
        var value = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->createUrl('indexes/default/getIndex'); ?>",
            data: "val="+value,
            success: function(data){
                $('#index').val(data);
            }
        });
    });
</script>