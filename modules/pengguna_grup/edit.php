
<?php
require_once 'func.php';
$id = $_POST['grup_id'];
$one = GetOne($id);
?>
<?php require_once 'views/header.php'?>
<?php require_once 'views/menu.php'?>

  <!-- Content Header (Page header) -->
  <section class='content-header'>
  <div class='container-fluid'>
      <div class='row mb-2'>
      <div class='col-sm-6'>
          <h1>Edit <?php echo ucwords('pengguna grup') ?></h1>
      </div>
      <div class='col-sm-6'>
          <ol class='breadcrumb float-sm-right'>
          <li class='breadcrumb-item'><a href='#'><?php echo ucwords('pengguna grup') ?></a></li>
          <li class='breadcrumb-item active'>Edit <?php echo ucwords('pengguna grup') ?></li>
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
          <h3 class='card-title'>Form <?php echo ucwords('pengguna grup') ?></h3>
      </div>
      <!-- /.card-header -->
      <form role='form' action='<?php echo 'http://localhost/nixsms-center20/pengguna_grup/func' ?>' method='POST'>
        <div class='card-body'>
        <input type='hidden' name='grup_id' value="<?php echo $_POST['grup_id']; ?>">
        <div class='form-group'>
            <label for="nama_grup"> Nama Grup</label>
            <input type="text" class="form-control" id="nama_grup" name='nama_grup' placeholder='Nama Grup' value="<?php echo $one[0]['nama_grup']; ?>">
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
