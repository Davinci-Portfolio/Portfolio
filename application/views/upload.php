<?php echo $error ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Uploading files</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Upload a file</h3>
                    </div>
                    <?php echo $error;?>

                    <?php echo form_open_multipart('upload/do_upload');?>

                    <input type="file" name="userfile" size="20" />

                    <br /><br />

                    <input type="submit" value="upload" />

                    </form>

                        <div class="col-xs-4">
                    <div class="box">
                </div>
            </div>
        </div>
    </section>
</div>


