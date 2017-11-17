$('.subjectRow').on('click', function() {
    var assignmentId = $(this).data("row-id");
    document.location.href = '/portfolio/questionnaires/overviewQuiz/' + assignmentId;
});

$('.results').on('click', function() {
    var assignmentId = $(this).data("row-id");
    document.location.href = '/portfolio/questionnaires/overviewQuestionsAnswers/' + assignmentId;
});

// $(window).on('load', function () {
//     $("#answersForm").on("submit", function (e) {
//         e.preventDefault();
//         var form = $(this).serialize();
//         alertAnswers = $('.alert-answers');
//         $.ajax({
//             url: base_url + '/questionnaires/sendQuizAnswers',
//             data: form,
//             method: 'POST'
//         })
//             .done(function(result) {
//                 console.log(result);
//                 if (result != 'false') {
//                    document.location.href = '/portfolio/questionnaires/index';
//                 } else {
//                     alertAnswers.delay(1000).fadeIn('slow');
//                     setTimeout(function () {
//                         alertAnswers.delay(1000).fadeOut('slow');
//                     }, 1000);
//                 }
//             });
//        });
// });