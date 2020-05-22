$(
    function () {
        $('#SearchItem').on('input', function(){
            var input = $('#SearchItem').val();
            if(input=='')
                $('#SearchResult').html('No data available.');
            else{
                $.ajax({
                    type: "POST",
                    url: "Handler.php",
                    data: {
                        search: true,
                        searchVal: input
                    },
                    success: function(msg){
                        $('#SearchResult').html(msg);
                    }
                });
            }

        });
    }
);
function pullNewId(){
    $.ajax({
        type: "POST",
        url: "Handler.php",
        data:{
            pull_new_id: true
        },
        success:function (res) {
            $('#insert_person_id').val(res);
        }
    });
}
function insertRecord(){
    var person_name = $('#insert_person_name').val();
    $.ajax({
        type: "POST",
        url: "Handler.php",
        data:{
            perform_record_insert: true,
            person_name: person_name
        },
        success:function (res) {
            alert(res);
        }
    });
    pullNewId();
}
function loadEditDeleteForm(object) {
    $.ajax({
        type: "POST",
        url: "Handler.php",
        data:{
            load_edit_delete_form: true,
            person_id: object.value,
            form_action: object.innerHTML
        },
        success:function (res) {
            if(object.innerHTML == 'Edit')
                $('#EditForm').html(res);
            else
                $('#DeleteForm').html(res);
        }
    });
}
function performEditDelete(action){
    param1 = '', param2 = '';
    if(action == 'Edit'){
        param1 = $('#edit_person_id').val();
        param2 = $('#edit_person_name').val();
    }
    else{
        param1 = $('#delete_person_id').val();
        param2 = $('#delete_person_name').val()
    }
    $.ajax({
        type: "POST",
        url: "Handler.php",
        data:{
            perform_edit_delete: true,
            perform: action,
            person_id: param1,
            person_name: param2
        },
        success:function (res) {
            alert(res);
            $('.modal-backdrop').remove();
            $('#closeEditModal').trigger('click');
            $('#closeDeleteModal').trigger('click');
            $('#SearchItem').trigger("input");
        }
    });
}