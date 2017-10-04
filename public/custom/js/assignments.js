$('.editButton, .addButton').on('click', function() {
    var btnElement = $(this).attr('class');
    if (btnElement == 'editButton') {
        var rowId = $(this).data("row-id");
    } else {
        var rowId = '';
    }
    document.location.href = '/portfolio/assignments/formPage/' + btnElement + '/' + rowId;
});

$('.editButton').on('click', function() {
    var assignmentId = $(this).data("row-id");
    document.location.href = '/portfolio/assignments/overviewSubjectAssignments/' + assignmentId;
});

$('.deleteQuestion').bind('click', deleteQuestion);

function deleteQuestion() {
    if (window.confirm("Weet je het zeker dat je dit wilt verwijderen?")) {
        var questionId = $(this).closest('tr').attr("data-row-id");
        $.ajax({
            url: base_url+'assignments/deleteQuestion',
            data:  {questionId: questionId},
            method: 'post',
            success: function() {
                location.reload();
            },
            error: function() {}
        });
    }
}

$('.changeQuestion').bind('click', changeQuestion);

function changeQuestion() {
    $('.changeQuestion').unbind('click');
    function changeInput(thisButton, questionVal) {
        var paragraph = document.createElement("p");
        paragraph.innerHTML = questionVal;
        $(thisButton).closest('tr').find(input).replaceWith(paragraph);
        $(thisButton).closest('td').find('button').prop('disabled', true);
        $('.deleteQuestion').prop('disabled', false);
        $('.changeQuestion').bind('click', changeQuestion);
    }
    //Creating input
    var questionVal = $(this).children("p").text();
    var input = document.createElement("input");
    input.name = 'changing';
    input.className = 'text';
    input.value = questionVal;
    //Replaced Paragraph with input for changing
    var paragraph = $(this).children("p");
    $(paragraph).replaceWith(input);
    //Enabled button
    $(this).closest('tr').find('button').prop('disabled', false);
    $('.deleteQuestion').prop('disabled', true);
    var cancelButton = $(this).closest('tr').find('button.cancelChange');
    var saveButton = $(this).closest('tr').find('button.saveInput');
    //if user cancel his action
    $(cancelButton).on('click', function() {
        $(cancelButton).unbind();
        $(saveButton).unbind();
        changeInput(cancelButton, questionVal);
    });
    //if user saves his action
    $(saveButton).on('click', function() {
        $(cancelButton).unbind();
        $(saveButton).unbind();
        var newQuestionVal = $(input).val();
        var questionId = $(saveButton).closest('tr').attr("data-row-id");
        updateQuestion(newQuestionVal, questionId, saveButton);
    });
}

function updateQuestion(newQuestionVal, questionId, saveButton) {
    var base_url = $('#searchTag').attr('data-baseurl');
    $.ajax({
        url: base_url+'assignments/updateData',
        data:  {newQuestionVal: newQuestionVal, questionId: questionId},
        method: 'post',
        success: function() {
            location.reload();
        },
        error: function() {}
    });
}

$(".addQuestion").on('keyup paste', function() {
    var newQuestionText = $(this).val();
    if (newQuestionText == '') {
        $('.saveNewQuestion').prop('disabled', true);
    } else {
        $('.saveNewQuestion').prop('disabled', false);
    }
});

$('.saveNewQuestion').on('click', function() {
    var base_url = $('#searchTag').attr('data-baseurl');
    var newQuestionText = $('.addQuestion').val();
    var topicId = $(this).attr('data-topic-id');
    $.ajax({
        url: base_url+'assignments/addNewQuestion',
        data:  {newQuestionText: newQuestionText, topicId: topicId},
        method: 'post',
        success: function() {
            location.reload();
        },
        error: function() {}
    });
});

$('.displayButton').on('click', function() {
    var base_url = $('#searchTag').attr('data-baseurl');
    var topicId = $(this).closest('tr').attr('data-row-id');
    var displayBtn = $(this).attr('class').split(' ')[0];
    $.ajax({
        url: base_url+'assignments/changeDisplay',
        data:  {topicId: topicId, displayBtn: displayBtn},
        method: 'post',
        success: function() {
            location.reload();
        },
        error: function() {}
    });
});

$(function() {
    $('.deleteQuestion').prop('disabled', false);
    $('button.saveInput, button.cancelChange').prop('disabled', true);
});

$('.answerRow').on('click', function() {
    var studentId = $(this).data("row-id");
    document.location.href = '/portfolio/Assignments/studentAnswers/' + studentId;
});