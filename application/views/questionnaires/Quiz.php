<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Questions list about <?= $subjects[0]->subject ?></h1>
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
                      <td><input class="fullWidth form-control" type="text" placeholder="Your answer" name="<?= $question->subject_id ?>" data-id='<?= $question->id ?>'></td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td class="no-sort lead smallWidth" colspan="3">
                      Submit your answers - <button title="Submit answers" class="btn btn-primary" type="submit">Submit</button>
                    </td>
                  </tr>
                </tfoot>
              </table> 
                <input type="hidden" name="subjectId" value="<?= $subjects[0]->id ?>">
                <input type="hidden" name="subject" value="<?= $subjects[0]->subject ?>">
                <input type="hidden" name="username" value="<?= $_SESSION['username']; ?>">
                <input type="hidden" name="questionId" value="<?= $question->id ?>">
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

