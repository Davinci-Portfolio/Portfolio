<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-4">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title"></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>/public/adminLTE/img/<?= $infoUsers[0]->profile_img ?>" alt="Profile img">
            
            <?= form_open_multipart('userInfo/do_upload'); ?>
            <br><input class="btn input-file" type="file" name="userfile">
            <button class="btn btn-primary input-file" type="submit" value="upload">submit</button><br>
            <h3 class="profile-username text-center"><?= $infoUsers[0]->name ?></h3>
            <p class="text-muted text-center">Software Engineer</p>
            <input type="hidden" name="name" value="<?= $infoUsers[0]->name ?>">
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