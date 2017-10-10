<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Your Questions - Anwers - Comments for - <?= $subjects[ARRAY_FIRST_INDEX]->subject ?></h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box"> 
          <!-- /.box-header -->
          <div class="box-body">
            <table id="answers" class="table table-bordered table-striped overviews" action="<?php echo base_url();?>assigments/uploadComment">
                <thead>
                  <tr>
                    <th class="no-sort">Question</th>
                    <th class="no-sort">Answer</th>
                  </tr>
                </thead>
              <tbody>
                <form id="answersForm" method="post">
                  <?php foreach($questions as $question) { ?>
                    <tr data-row-id="<?= $question->id ?>">
                      <td><?= $question->question ?></td>
                  <?php } foreach($answers as $answer) { ?>
                      <td><?= $answer->answer ?></td>
                      <td></td>  
                    </tr>
                  <?php } ?>  
                </form>    
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