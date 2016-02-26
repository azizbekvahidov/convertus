<? foreach ($model as $val) {?>
    <li class="list-group-item">
        <?=$val['whom']?>    <a href="#" class="remove"><i class="glyphicon glyphicon-trash"></i></a><br>
        <?=$val['index']?> <?=$val['address']?>
    </li>
<?}
?>