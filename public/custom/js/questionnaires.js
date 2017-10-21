$('.subjectRow').on('click', function() {
    var assignmentId = $(this).data("row-id");
    document.location.href = '/portfolio/questionnaires/overviewQuiz/' + assignmentId;
});

$('.results').on('click', function() {
    var assignmentId = $(this).data("row-id");
    document.location.href = '/portfolio/questionnaires/overviewQuestionsAnswers/' + assignmentId;
});