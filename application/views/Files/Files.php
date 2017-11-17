<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Geuploade files</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Alle bestanden die geupload zijn aan de database.</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <table class="table table-bordered table-striped overviews">
                            <thead>
                                <tr>
                                    <th>File</th>
                                    <th>File-Size (KB)</th>
                                    <th>Upload date</th>
                                    <th class="no-sort">Delete Files</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($imports as $import) { ?>
                                    <tr data-file-id="<?= $import->id ?>">
                                        <td><?= $import->filename ?></td>
                                        <td><?= $import->file_size ?></td>
                                        <td><?= $import->file_date ?></td>
                                        <td class="smallWidth oneIcon">
                                            <button class="deleteButton">
                                                <i class="fa fa-trash-o fa-lg"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div>
                            <?= form_open_multipart('upload/Upload');?>
                                <input type="file" name="userfile" size="20" />
                                <input type="submit" value="upload" />
                            </form>
                        </div>
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