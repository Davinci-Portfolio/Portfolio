<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1></h1>
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
                        <table class="table table-bordered table-striped overviews">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="no-sort">Assignment</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($questions as $question) { ?>
                                    <tr data-row-id="<?= $question->id ?>">
                                        <td class="smallWidth">0</td>
                                        <td class="changeQuestion">
                                            <p><?= $question->question ?></p>
                                        </td>
                                        <td class="smallWidth threeIcons">
                                            <button type="button" class="saveInput" name="button">
                                                <span class="glyphicon glyphicon-ok"></span>
                                            </button>
                                            <button type="button" class="cancelChange" name="button">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </button>
                                            <button type="button" class="deleteQuestion" name="button">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </td>
    								</tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="no-sort" colspan="3">Click on an question to change it.</th>
                                </tr>
                                <tr>
                                    <th class="no-sort" colspan="2">
                                        <input class="addQuestion" type="text" name="" value="" placeholder="Voeg hier een nieuwe vraag toe">
                                    </th>
                                    <th>
                                        <button data-topic-id="<?= $topicId ?>" disabled type="button" class="saveNewQuestion" name="button">
                                            <span class="glyphicon glyphicon-ok"></span>
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
