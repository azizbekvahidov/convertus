<table class="table table-striped table-condensed" id="addrTable">
    <thead>
        <tr>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?
    foreach ($model as $val) {?>
        <tr>
            <td>
                        <input type="checkbox" name="addresses"> <?=$val['whom']?> <a href="#" class="show">показать адрес</a>
                    <div class="hide addr"><?=$val['index']?>, <?=$val['address']?></div>
            </td>
        </tr>

    <?
    }
    ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#addrTable').DataTable( {

            "paging":   false,
            "ordering": false,
            "info":     false
        } );

    } );
    $(document).on('click','.show',function(){
        $(this).parent().children('.addr').toggleClass('hide');
        $(this).toggle(function(){
            $(this).text('cкрыть адрес').stop();
        },function(){
            $(this).text('показать адрес').stop();
        })
    });
</script>