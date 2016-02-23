<table class="table table-striped " id="addrTable">
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
                <label>
                    <input type="checkbox" name="addresses"> <?=$val['whom']?> <a href="#" class="show">показать адрес</a>
                </label>
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
        $(this).parent().parent().children('.addr').toggleClass('hide');

    });
</script>