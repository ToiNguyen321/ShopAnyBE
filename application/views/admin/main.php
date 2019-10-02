<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('admin/Header'); ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <?php $this->load->view('admin/Left'); ?>
        </div>

        <!-- top navigation -->
        <?php $this->load->view('admin/NavTop'); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <?php if (isset($message)) {
              $this->load->view('admin/message', $this->data);
          } ?>
          <?php if (isset($title)) {
              $this->load->view('admin/title', $this->data);
          } ?>
          <!-- top tiles -->
          <?php $this->load->view($temp); ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php $this->load->view('admin/Footer'); ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <?php $this->load->view('admin/FileJs'); ?>
    
  </body>
</html>
