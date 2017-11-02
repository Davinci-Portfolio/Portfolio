<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Your Questions - Anwers - Feedback for - <?= $subjects[ARRAY_FIRST_INDEX]->subject ?></h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box"> 
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered table-striped overviews">
              <thead>
                <tr>
                  <th class="no-sort">Question</th>
                  <th class="no-sort">Answer</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($questions as $question) { ?>
                  <tr data-row-id="<?= $question->id ?>">
                    <td><?= $question->question ?></td>
                <?php } foreach($answers as $answer) { ?>
                    <td><?= $answer->answer ?></td>
                  </tr>
                <?php } ?>     
              </tbody>
            </table>
          </div> 
          <div class="box-body">
            <table class="table table-bordered table-striped overviews">
              <tfoot>
              <?php foreach($subjectsDone as $subjectDone) { ?>
                <tr>
                  <?php if($subjectDone->Comment) { ?>
                    <td class="lead smallWidth">Feedback left by <?= $subjectDone->edited_by ?> :</td>
                    <td class="lead"><?= $subjectDone->Comment ?></td>
                  <?php } else { ?>
                    <td class="lead smallWidth">The teacher has not left you any feedback yet.</td>
                  <?php } ?>
                </tr>
              <?php } ?>
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