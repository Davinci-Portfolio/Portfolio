<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Overview Students</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List With all students.</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-striped overviews">
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>OV Number</th>
                                    <th>Klas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($students as $student) {  ?>
                                <tr class="studentRow" data-studentId="<?= $student->ov_number ?>">
                                    <td><?= $student->name ?></td>
                                    <td><?= $student->ov_number ?></td>
                                    <td><?= $student->klas ?></td>

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
