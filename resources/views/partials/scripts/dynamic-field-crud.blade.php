
<!-- pest_record -->
<script type="text/javascript">
    $(document).ready(function(){
        var i=1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field_pest_record').append('<tr id="row_pest_record'+i+'"><td><input type="text" name="pest_record[]" placeholder="Enter your Phone" class="form-control name_list_pest_record" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_pest_record">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove_pest_record', function(){
            var button_id = $(this).attr("id");
            $('#row_pest_record'+button_id+'').remove();
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '.btn_remove_pest_record1', function(){
            var button_id = $(this).attr("id");
            $('#row_pest_record_from_db'+button_id+'').remove();
        });
    });
</script>

