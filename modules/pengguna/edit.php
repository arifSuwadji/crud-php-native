
<?php
require_once 'func.php';
$id = $_POST['pengguna_id'];
$one = GetOne($id);
?>
<?php require_once 'views/header.php'?>
<?php require_once 'views/menu.php'?>

  <!-- Content Header (Page header) -->
  <section class='content-header'>
  <div class='container-fluid'>
      <div class='row mb-2'>
      <div class='col-sm-6'>
          <h1>Edit <?php echo ucwords('pengguna') ?></h1>
      </div>
      <div class='col-sm-6'>
          <ol class='breadcrumb float-sm-right'>
          <li class='breadcrumb-item'><a href='#'><?php echo ucwords('pengguna') ?></a></li>
          <li class='breadcrumb-item active'>Edit <?php echo ucwords('pengguna') ?></li>
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
          <h3 class='card-title'>Form <?php echo ucwords('pengguna') ?></h3>
      </div>
      <!-- /.card-header -->
      <form role='form' action='<?php echo 'http://localhost/nixsms-center20/pengguna/func' ?>' method='POST'>
        <div class='card-body'>
        <input type='hidden' name='pengguna_id' value="<?php echo $_POST['pengguna_id']; ?>">
        <div class='form-group'>
            <label for="pengguna_grup"> Pengguna Grup</label>
            <select id="pengguna_grup" name="pengguna_grup" class="form-control select2" data-placeholder="Pengguna Grup">
              <option value=""></option>
              <?php $penggunaGrup = getPenggunaGrup(); print_r($penggunaGrup); foreach($penggunaGrup as $grup){ print_r($grup); ?>
              <option value="<?php echo $grup['grup_id']?>" <?php echo $one[0]['pengguna_grup'] == $grup['grup_id'] ? 'selected' : ''?>><?php echo $grup['nama_grup'] ?></option>
              <?php }?>
            </select>
          </div>
        <div class='form-group'>
            <label for="nama_pengguna"> Nama Pengguna</label>
            <input type="text" class="form-control" id="nama_pengguna" name='nama_pengguna' placeholder='Nama Pengguna' value="<?php echo $one[0]['nama_pengguna']; ?>">
          </div>
        <div class='form-group'>
            <label for="username"> Username</label>
            <input type="text" class="form-control" id="username" name='username' placeholder='Username' value="<?php echo $one[0]['username']; ?>">
          </div>
        <div class='form-group'>
            <label for="email"> Email</label>
            <input type="text" class="form-control" id="email" name='email' placeholder='Email' value="<?php echo $one[0]['email']; ?>">
          </div>
        <div class='form-group'>
            <label for="password"> Password</label>
            <input type="password" class="form-control" id="password" name='password' placeholder='Password' value="">
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
