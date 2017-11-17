<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Answers from <?= $doneSubjects[0]->name ?> on <?= $doneSubjects[0]->subject ?></h1>
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
          <form method="post" action="<?php echo base_url();?>Assignments/uploadComment/">
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
                <input type="hidden" name="subject_id" value="<?= $doneSubjects[0]->subject_id ?>">
                <input type="hidden" name="username" value="<?= $_SESSION['username']; ?>">
            </div>
            <hr>
            <div class="box-body">
              <table class="table table-bordered table-striped overviews">
                <tbody>
                  <tr>
                    <?php if($doneSubjects[0]->Comment) { ?>                    
                      <td><input type="text" name="comment" class="form-control" autocomplete="off" placeholder="Edit your feedback"></td>
                    <?php } else { ?>
                      <td><input type="text" name="comment" class="form-control" autocomplete="off"  placeholder="Leave your feedback"></td>
                    <?php } ?>
                    <td class="smallWidth">
                      <button type="submit" class="btn btn-primary" title="submit feedback">Submit feedback</button>
                    </td>
                  </tr>
                </tbody> 
              </table>
            </div>
            <?php if($doneSubjects[0]->Comment) { ?>  
              <div class="box-body">
                <table class="table table-bordered table-striped overviews">  
                  <tfoot> 
                    <tr>
                      <td class="lead smallWidth">Feedback :</td>
                      <td class="lead"><?= $doneSubjects[0]->Comment ?></td>
                    </tr>
                  </tfoot>   
                </table>
              </div>       
            <?php } ?>
          </form>
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
