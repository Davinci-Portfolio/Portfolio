<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Overview Subjects for questionnaires</h1>
  </section>

    <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Open question lists</h3>
          </div>
          <!-- Vragenlijsten die nog ingeleverd/ingevuld moeten worden -->
          <div class="box-body">
            <table class="table table-bordered table-striped overviews">
              <thead>
                <tr>
                  <th>Maintopic</th>
                  <th>Subtopic</th>
                </tr>
              </thead>
              <tbody>
              <?php if ($subjects) { ?>           
                <?php foreach ($subjects as $subject) { ?>
                  <tr title="Open <?= $subject->subject ?>" data-row-id="<?= $subject->id ?>" class="subjectRow">
                    <td><?= $subject->subject ?></td>
                    <td><?= $subject->subtopic ?></td>
                  </tr>   
                <?php } } ?> 
              </tbody>
            </table>
          </div>  
          <hr><div class="box-header">
            <h3 class="box-title">Finished question lists</h3>
          </div>
          <!-- ingeleverde vragenlijsten -->
          <div class="box-body">
            <table class="table table-bordered table-striped overviews">
              <thead>
                <tr>
                  <th>Maintopic</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($doneSubjects as $doneSubject) { ?>
                  <tr title="Open <?= $doneSubject->subject ?>" data-row-id="<?= $subject->id ?>" class="results">
                    <td><?= $doneSubject->subject ?></td>
	                </tr>   
                <?php } ?>
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
