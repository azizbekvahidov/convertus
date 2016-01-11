
Название : <?=CHtml::textField('name','',array())?><br><br>
Регион: <span id="data"><?=CHtml::dropDownList('name','',$list,array('empty'=>'Выберите Регион','class'=>'parent'))?></span><br><br>
<script>
        $('.parent').chosen({
            no_results_text: "Oops, nothing found!",
        }).change(function(){
            var value = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->createUrl('indexes/region/checkParent'); ?>",
                data: "val="+value,
                success: function(data){
                    if($data != 'null')
                        $('#data').html(data);

                }
            });
        });
</script>
