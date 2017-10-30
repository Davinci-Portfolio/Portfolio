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
            <br>
            <label class="btn btn-default btn-file">
              Browse
              <input class="" type="file" name="userfile">
            </label>
            <button class="btn btn-primary input-file" type="submit" value="upload">submit</button><br>
            <h3 class="profile-username text-center"><?= $_SESSION['username']; ?></h3>
            <p class="text-muted text-center">Software Engineer</p>
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