
<?php
require_once 'func.php';
$id = $_POST['menu_id'];
$one = GetOne($id);
?>
<?php require_once 'views/header.php'?>
<?php require_once 'views/menu.php'?>

  <!-- Content Header (Page header) -->
  <section class='content-header'>
  <div class='container-fluid'>
      <div class='row mb-2'>
      <div class='col-sm-6'>
          <h1>Edit <?php echo ucwords('halaman menu') ?></h1>
      </div>
      <div class='col-sm-6'>
          <ol class='breadcrumb float-sm-right'>
          <li class='breadcrumb-item'><a href='#'><?php echo ucwords('halaman menu') ?></a></li>
          <li class='breadcrumb-item active'>Edit <?php echo ucwords('halaman menu') ?></li>
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
        <input type='hidden' name='menu_id' value="<?php echo $_POST['menu_id']; ?>">
        <div class='form-group'>
            <label for="nama_table"> Nama Table</label>
            <input type="text" class="form-control" id="nama_table" name='nama_table' placeholder='Nama Table' value="<?php echo $one[0]['nama_table']; ?>">
          </div>
        <div class='form-group'>
            <label for="judul_menu"> Judul Menu</label>
            <input type="text" class="form-control" id="judul_menu" name='judul_menu' placeholder='Judul Menu' value="<?php echo $one[0]['judul_menu']; ?>">
          </div>
        <div class='form-group'>
            <label for="sub_judul_menu"> Sub Judul Menu</label>
            <input type="text" class="form-control" id="sub_judul_menu" name='sub_judul_menu' placeholder='Sub Judul Menu' value="<?php echo $one[0]['sub_judul_menu']; ?>">
          </div>
        <div class='form-group'>
            <label for="url_menu"> Url Menu</label>
            <input type="text" class="form-control" id="url_menu" name='url_menu' placeholder='Url Menu' value="<?php echo $one[0]['url_menu']; ?>">
          </div>
        <div class='form-group'>
            <label for="icon_menu"> Icon Menu</label>
            <input type="text" class="form-control" id="icon_menu" name='icon_menu' placeholder='Icon Menu' value="<?php echo $one[0]['icon_menu']; ?>">
          </div>
        <div class='form-group'>
            <label for="aktif_menu"> Aktif Menu</label>
            <input type="text" class="form-control" id="aktif_menu" name='aktif_menu' placeholder='Aktif Menu' value="<?php echo $one[0]['aktif_menu']; ?>">
          </div>
        
        </div>
        <!-- /.card-body -->
        <div class='card-footer'>
          <input type='hidden' name='update' value='Save'>
          <button type='submit' class='btn btn-primary'>Perbarui</button>
        </div>
      </form>
      </div>
  </div>
  </section>
<?php require_once 'views/footer.php'?>
