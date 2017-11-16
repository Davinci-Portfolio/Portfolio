function addDeleteInput() {
    var liInput = $('.todo-list').html();
    var addItemBtn = $('#addItem');
    //Add input
    $(addItemBtn).on('click', function() {
        $('.todo-list').append(liInput);
    });
    //Removes input
    $('.todo-list').on('click', '.deleteInput', function() {
        $(this).closest('li').remove();
    });
}

$('#sendData').on('click', function() { 
    $("input[name='title'], input[name='subtopic']").removeClass('error');
    var base_url = $('#searchTag').attr('data-baseurl');
    var inputTitle = $("input[name='title']").val();
    var inputSubtopic = $("input[name='subtopic']").val();
    var formData = $('#formInput').serialize();
 
    if (inputTitle == ''|| inputSubtopic == '') {
        if (inputTitle == '') {
            $("input[name='title']").addClass('error')
        }
        if (inputSubtopic == '') {
            $("input[name='subtopic']").addClass('error')
        }
    } else {
        $.ajax({
            url: base_url+'assignments/sendDataForm',
            data: formData,
            type: 'post',
            success: function() {
                // document.location.href = '/portfolio/Assignments/index';
            },
            error: function() {}
        });
    }
});

$(document).ready(function(){
    addDeleteInput()
});
