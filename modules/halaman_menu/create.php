
<?php
require_once 'func.php';
?>
<?php require_once 'views/header.php'?>
<?php require_once 'views/menu.php'?>

  <!-- Content Header (Page header) -->
  <section class='content-header'>
  <div class='container-fluid'>
      <div class='row mb-2'>
      <div class='col-sm-6'>
          <h1>Tambah <?php echo ucwords('halaman menu') ?></h1>
      </div>
      <div class='col-sm-6'>
          <ol class='breadcrumb float-sm-right'>
          <li class='breadcrumb-item'><a href='#'><?php echo ucwords('halaman menu') ?></a></li>
          <li class='breadcrumb-item active'>Tambah <?php echo ucwords('halaman menu') ?></li>
          </ol>
      </div>
      </div>
  </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class='content'>
  <div class='container-fluid'>
      <!-- form -->
      <div class='card card-default'>
      <div class='card-header'>
          <h3 class='card-title'>Form <?php echo ucwords('halaman menu') ?></h3>
      </div>
      <!-- /.card-header -->
      <form role='form' action='<?php echo 'http://localhost/nixsms-center20/halaman_menu/func' ?>' method='POST'>
        <div class='card-body'>
        <div class='form-group'>
            <label for="nama_table"> Nama Table</label>
            <input type="text" class="form-control" id="nama_table" name='nama_table' placeholder='Nama Table'>
          </div>
        <div class='form-group'>
            <label for="judul_menu"> Judul Menu</label>
            <input type="text" class="form-control" id="judul_menu" name='judul_menu' placeholder='Judul Menu'>
          </div>
        <div class='form-group'>
            <label for="sub_judul_menu"> Sub Judul Menu</label>
            <input type="text" class="form-control" id="sub_judul_menu" name='sub_judul_menu' placeholder='Sub Judul Menu'>
          </div>
        <div class='form-group'>
            <label for="url_menu"> Url Menu</label>
            <input type="text" class="form-control" id="url_menu" name='url_menu' placeholder='Url Menu'>
          </div>
        <div class='form-group'>
            <label for="icon_menu"> Icon Menu</label>
            <input type="text" class="form-control" id="icon_menu" name='icon_menu' placeholder='Icon Menu'>
          </div>
        <div class='form-group'>
            <label for="aktif_menu"> Aktif Menu</label>
            <input type="text" class="form-control" id="aktif_menu" name='aktif_menu' placeholder='Aktif Menu'>
          </div>
        
        </div>
        <!-- /.card-body -->
        <div class='card-footer'>
          <input type='hidden' name='insert' value='Save'>
          <button type='submit' class='btn btn-primary'>Simpan</button>
        </div>
      </form>
      </div>
  </div>
  </section>
  
<?php require_once 'views/footer.php'?>

