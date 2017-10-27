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
          <!-- /.box-header -->
          <div class="box-body">
            <form method="post" action="<?php echo base_url();?>Questionnaires/sendQuizAnswers/">
              <table id="answers" class="table table-bordered table-striped overviews">
                <thead>
                  <tr>
                    <th class="no-sort">Question</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($questions as $question) { ?>
                    <tr data-row-id="<?= $question->id ?>">
                      <td><?= $question->question ?></td>
                    </tr>
                    <tr>
                      <td><input size="100" type="text" data-id='<?= $question->id ?>' name="<?= $question->subject_id ?>"></td>
                    </tr>
                  <?php } ?>
                  <input type="hidden" name="subjectId" value="<?= $subjects[0]->id ?>">
                  <input type="hidden" name="username" value="<?= $_SESSION['username']; ?>">
                  <input type="hidden" name="questionId" value="<?= $question->id ?>">
                </tbody>
                <tfoot>
                  <tr>
                    <td class="no-sort " colspan="3">
                      <button title="send answers" class="btn btn-primary" type="submit">send</button>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </form>    
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

