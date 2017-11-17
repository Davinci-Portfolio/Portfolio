<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Creating Assignments</h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- TO DO List -->
                <div class="box box-primary">
                  <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Create Assignment</h3>
                  </div>
                  <!-- /.box-header -->
                  <form id="formInput">
                  <div class="box-body">
                    <input name="title" class="headText" type="text" placeholder="Titel vragenlijst">
                     <select name="topic" class="form-control">
                      <?php foreach($topics as $topic) { ?>
                        <option value="<?=$topic->topic ?>"><?=$topic->topic ?></option>
                      <?php } ?>
                    </select>
                    </br>
                    <ul class="todo-list">
                      <li class="inputQuest">
                        <!-- drag handle -->
                        <span class="handle">
                          <i class="fa fa-ellipsis-v"></i>
                          <i class="fa fa-ellipsis-v"></i>
                        </span>
                        <!-- checkbox -->
                        <input name="question[]" class="text" type="text" placeholder="Vraag">
                        <!-- General tools such as edit or delete-->
                        <div class="tools deleteInput">
                            <i class="fa fa-trash-o deleteInput"></i>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer clearfix no-border">      
                    <button id="sendData" type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Send</button>  
                    <button id="addItem" type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button> 
                    <div class="btn-group pull-right">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-caret-down"></i>Cohorten
                      </button>
                      <ul class="dropdown-menu" role="menu">
                      <?php foreach ($students as $student) { ?>
                      <tr data-row-id="<?= $student->cohort ?>" class="subjectRow">
                        <li>
                            <input name="cohort" value="<?= $student->cohort ?>" type="checkbox"><?= $student->cohort ?></input>
                        </li>
                      </tr>
                      <?php } ?>
                    </div>
                  </div>
              </form>
                <!-- /.box -->
            </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->