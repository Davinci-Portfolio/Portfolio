<div class="content-wrapper">
    <section class="content-header">
        <h1>Overview Assignments</h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Assignments</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-striped overviews">
                            <thead>
                                <tr>
                                    <th>Assignment</th>
                                    <th>Subtopic</th>
                                    <th>Cohort</th>
                                    <th class="no-sort">Deadline</th>
                                    <th class="no-sort oneIcon icons">
                                        <button type="button" class="addButton">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($subjects as $subject) { ?>
                                    <tr data-row-id="<?= $subject->subject_id ?>">
                                        <td><?= $subject->subject ?></td>
                                        <td><?= $subject->subtopic ?></td>
                                        <td><?= $subject->cohort ?></td>
                                        <td class="smallWidth datePicker">
                                            <?= $subject->display_date ?>
                                        </td>
                                        <td class="smallWidth twoIcons">
                                            <button class="editButton" data-row-id="<?= $subject->subject_id ?>">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </button>
                                            <button type="button" class="<?=$subject->display?>Btn displayButton">
                                                <span class="glyphicon glyphicon-eye-<?= $subject->display ?>"></span>
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
