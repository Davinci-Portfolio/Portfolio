<div class="content-wrapper">
  <section class="content-header">
    <h1>Uploading files</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-4">
        <div class="box">
          <form method="post" action="<?php echo base_url();?>upload/uploadFile"> 
            <div class="box-header">
              <h3 class="box-title">Upload a file</h3>
            </div>
            <input type="file" name="userfile" size="20" />

            <br><br>
            <input type="submit" value="upload">

          </form>

        <?php if (!empty($csv)) { ?>
          <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
              <td width="10%">Naam</td>
              <td width="20%">OV Nummer</td>
              <td width="20%">Klas</td>
            </tr>
          </table>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
</div>







