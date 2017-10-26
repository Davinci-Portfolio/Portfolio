<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <?php
      echo link_tag('public/adminLTE/css/bootstrap.min.css');
      echo link_tag('public/adminLTE/css/AdminLTE.min.css');
      echo link_tag('public/adminLTE/css/skins/skin-blue.min.css');
      echo link_tag('public/adminLTE/css/datatables/dataTables.bootstrap.css');
      echo link_tag('public/adminLTE/plugins/datepicker/datepicker3.css');
      echo link_tag('public/custom/css/Login.css');
    ?>
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="row">
          <div class="col-xs-12">
              <div class="box">
                  <div class="box-header">
                      <h3 class="box-title"></h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <body class="hold-transition login-page">
                      <div class="login-box">
                        <div class="login-logo">
                          <a><b>Port</b>folio</a>
                        </div>
                        <!-- /.login-logo -->
                        <div class="login-box-body">
                          <p class="login-box-msg">Sign in to start your session</p>

                          <form method="post" action="<?php echo base_url();?>Login/Login">
                            <div class="form-group has-feedback">
                              <span><?= $error ?></span>
                              <input type="text" name="Username" class="form-control" placeholder="Name">
                              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                              <input type="password" name="Password" class="form-control" placeholder="Password">
                              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="row">
                              <div class="col-xs-8">
                                <div class="checkbox icheck">
                                  <!-- <label>
                                    <input type="checkbox"> Remember Me
                                  </label> -->
                                </div>
                              </div>
                              <!-- /.col -->
                              <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                              </div>
                              <!-- /.col -->
                            </div>
                          </form>

                          <!-- <a href="#">I forgot my password</a><br> -->
                          <!-- <a href="#" class="text-center">Register a new membership</a> -->

                        </div>
                        <!-- /.login-box-body -->
                      </div>
                      </body>
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