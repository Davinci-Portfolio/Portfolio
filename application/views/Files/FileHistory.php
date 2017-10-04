<div class="content-wrapper">
    <section class="content-header">
        <h1>Deleted files</h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Removed files.</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped overviews">
                            <thead>
                                <tr>
                                    <th>File</th>
                                    <th>File Size (KB)</th>
                                    <th>Upload date</th>
                                    <th class="no-sort">Permanently delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($imports as $import) { ?>
                                    <tr data-file-id="<?= $import->id ?>">
                                        <td><?= $import->filename ?></td>
                                        <td><?= $import->file_size ?></td>
                                        <td><?= $import->file_date ?></td>
                                        <td class="smallWidth twoIcons">
                                            <button class="deleteBtn">
                                                <i class="fa fa-trash-o fa-lg"></i>
                                            </button>
                                            <button class="successBtn colorGreen">
                                                <span class="fa fa-eye fa-lg"></span>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
