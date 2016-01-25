<?=CHtml::dropDownList('tree','',$tree,array('empty'=>'Выберите Регион' ))?>
<br>
<br>

<div id="addData"></div>
<script>
    $('#tree').chosen({
        no_results_text: "Oops, nothing found!",
    }).change(function(){
        var value = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->createUrl('indexes/default/getAddress'); ?>",
            data: "val="+value,
            success: function(data){
                $('#addData').html(data);
            }
        });
    });
</script>
