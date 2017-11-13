<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Your Questions - Anwers - Feedback for - <?= $subjects[0]->subject ?></h1>
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
                <?php foreach($questionAnswers as $questionAnswer) { ?>
                  <tr>
                    <td><?= $questionAnswer->question ?></td>               
                    <td><?= $questionAnswer->answer ?></td>  
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