<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Overview of <?=$student[ARRAY_FIRST_INDEX]->name?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Assignment <?=$subject[ARRAY_FIRST_INDEX]->subject . ' of the subject ' . $subject[ARRAY_FIRST_INDEX]->subtopic ?> </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-striped overviews">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Correct</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!$questionsAndAnswers == null) {
                                    $countQuestions = 0;
                                    foreach ($questionsAndAnswers as $questionAndAnswer) {
                                        $countQuestions++ ?>
                                        <tr>
                                            <td class="smallWidth"><?= $countQuestions ?> </td>
                                            <td><?= $questionAndAnswer->question ?></td>
                                            <td><?= $questionAndAnswer->answer ?></td>
                                            <td class="smallWidth wrongAnswer btn-primary"><?= $questionAndAnswer->wrong ?></td>
                                        </tr>
                               <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                <!-- /.box-body -->
                </div>
            <!-- /.box -->
            </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
