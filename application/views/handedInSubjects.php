<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Handed in Subjects</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All handed in Assigments.</h3>
                    </div>
                    
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-striped overviews">
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Ov-number</th>
                                    <th>Finished?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($doneSubjects as $doneSubject) { ?>
                                    <tr data-row-id="<?= $doneSubject->id ?>" class="answerRow">
                                        <td><?= $doneSubject->name ?></td>
                                        <td><?= $doneSubject->ov_number ?></td>
                                        <td><?= $doneSubject->done ?></td>
                                    </tr>
                                <?php } ?>
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
