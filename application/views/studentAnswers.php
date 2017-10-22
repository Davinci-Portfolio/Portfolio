<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Answers form <?= $_SESSION['username']; ?> on <?= $subjects[0]->subject ?></h1>
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
            <form method="post" action="<?php echo base_url();?>Assignments/uploadComment/">
              <table class="table table-bordered table-striped overviews">
                <thead>
                  <tr>
                    <th class="no-sort">Question</th>        
                    <th class="no-sort">Answer</th>         
                    <?php if($doneSubjects[0]->Comment) { ?><th class="no-sort"></th><?php } ?>             
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($getQuestions as $getQuestion) { ?>
                    <tr data-row-id="<?= $getQuestion->id ?>">
                      <td><?= $getQuestion->question ?></td>
                  <?php } foreach($getAnswers as $getAnswer) { ?>
                      <td><?= $getAnswer->answer ?></td> 
                      <?php if($doneSubjects[0]->Comment) { ?><td class="no-sort"></td><?php } ?>
                    </tr>
                  <?php } ?>  
                </tbody>
                <tfoot>
                  <tr>
                    <?php if($doneSubjects[0]->Comment) { ?>                    
                      <td><input type="text" name="comment" class="form-control" placeholder="Edit your comment"></td>
                      <td><?= $doneSubjects[0]->Comment ?></td>
                    <?php } else { ?>
                      <td><input type="text" name="comment" class="form-control" placeholder="Leave your comment"></td>
                    <?php } ?>
                      <td><button type="submit" class="btn btn-primary">Submit</td>
                  </tr> 
                </tfoot>              
              </table>
                <input type="hidden" name="studentId" value="<?= $doneSubjects[0]->subject_id ?>">
                <input type="hidden" name="username" value="<?= $_SESSION['username']; ?>">
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
