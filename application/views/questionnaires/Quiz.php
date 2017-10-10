    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Questions list about <?= $subjects[ARRAY_FIRST_INDEX]->subject ?></h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="answers" class="table table-bordered table-striped overviews" action="<?php echo base_url();?>assigments/uploadComment">
                                <thead>
                                    <tr>
                                        <th class="no-sort">Question</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <form id="answersForm" method="post">
                                    <?php foreach ($questions as $question) { ?>
                                        <tr data-row-id="<?= $question->id ?>">
                                            <td><?= $question->question ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input size="100", type="text" data-id='<?= $question->id ?>' name="answer<?= $question->id ?>" value="" placeholder="Vul hier uw antwoord in.">
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <input type="hidden" name="subjectId" value="<?= $subjects[0]->id ?>">
                                </form>    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="no-sort" colspan="3">Click here to submit your answers
                                            <button class="sendBtn">
                                                <i class="fa fa-send-o"></i>
                                            </button>
                                        </th>
                                    </tr>
                                </tfoot>
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

