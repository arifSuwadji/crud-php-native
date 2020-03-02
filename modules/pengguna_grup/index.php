
<?php
require_once 'func.php';
session_start();
?>

<?php require_once 'views/header.php'?>
<?php require_once 'views/menu.php'?>
  <!-- Content Header (Page header) -->
  <section class='content-header'>
  <div class='container-fluid'>
      <div class='row mb-2'>
      <div class='col-sm-6'>
          <h1><?php echo ucwords('pengguna grup') ?></h1>
      </div>
      <div class='col-sm-6'>
          <ol class='breadcrumb float-sm-right'>
          <li class='breadcrumb-item'><a href='#'><?php echo ucwords('pengguna grup') ?></a></li>
          <li class='breadcrumb-item active'>Data <?php echo ucwords('pengguna grup') ?></li>
          </ol>
      </div>
      </div>
  </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class='content'>
  <div class='container-fluid'>
      <!-- SELECT2 EXAMPLE -->
      <div class='card card-default'>
      <div class='card-header'>
          <h3 class='card-title'>Pencarian </h3>

          <div class='card-tools'>
          <button type='button' class='btn btn-tool' data-card-widget='collapse'><i class='fas fa-minus'></i></button>
          <button type='button' class='btn btn-tool' data-card-widget='remove'><i class='fas fa-remove'></i></button>
          </div>
      </div>
      <!-- /.card-header -->
      <div class='card-body'>
      <form role='form'>
      <div class='row'>
        <div class='col-md-6'>
          <div class='form-group'>
            <label for="nama_grup"> Nama Grup</label>
            <input type="text" class="form-control" id="nama_grup" name='nama_grup' placeholder='Nama Grup' value="<?php echo $_GET['nama_grup']; ?>">
          </div>
        </div>
        
      </div>
      <div class='card-footer'>
          <button type='submit' class='btn btn-primary'>Cari</button>
      </div>
      </form>
      </div>
      <!-- /.card-body -->
      </div>
      <div class='row'>
      <div class='col-md-12'>
          <div class='card'>
          <div class='card-header'>
              <h3 class='card-title'>Data <?php echo ucwords('pengguna grup') ?></h3>
              <?php
              if(!empty($_SESSION['message'])){ ?>
                <div class="alert alert-<?php echo $_SESSION['mType'];?> alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                  <strong>Notif !</strong> <?php echo $_SESSION['message']; ?>
                </div>
                <br>
                <?php unset($_SESSION['mType']); ?>
                <?php unset($_SESSION['message'])?>
              <?php } ?>
              <a href='<?php echo BASE_URL.'pengguna_grup/create'?>' class='btn btn-info btn-sm float-right'>Tambah</a>
          </div>
          <!-- /.card-header -->
          <div class='card-body table-responsive p-0'>
              <table class='table table-striped table-bordered table-hover text-nowrap'>
              <thead>
                <tr>
                  <th style='text-align:center; vertical-align:middle;'>No</th>
                  <th style='text-align:center; vertical-align:middle;'>Nama Grup</th> 

                  <th style='text-align:center; vertical-align:middle;'>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $ga = GetAll();
                  $no = 1;
                  if($ga){
                    foreach($ga as $data){
                      echo "<tr>";
                      echo "<td>".$no++."</td>"; 
                    echo "<td>".$data['nama_grup']."</td>"; 

                      echo "<td>
                        <div class='btn-group dropleft'>
                          <button type='button' class='btn btn-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <span class='fa fa-ellipsis-v'></span>
                          </button>
                          <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                            <a class='dropdown-item' href='#'>
                              <form method='POST' action='http://localhost/nixsms-center20/pengguna_grup/edit'>
                              <input type='hidden' name='grup_id' value='".$data['grup_id']."'>
                              <button class='btn btn-warning btn-block btn-sm' name='edit' type='submit'><span class='nav-icon fas fa-edit'></span> Edit</button>
                              </form>
                            </a>
                            <a class='dropdown-item' href='#'>
                              <form method='POST' action='http://localhost/nixsms-center20/pengguna_grup/func'>
                              <input type='hidden' name='grup_id' value='".$data['grup_id']."'>
                              <button class='btn btn-danger btn-block btn-sm' name='delete' type='submit'><span class='nav-icon fas fa-times'></span> Delete</button>
                              </form>
                            </a>
                          </div>
                        </div>
                      </td></tr>";
                    }
                  }else{
                    echo "<tr>"; 
                    echo "<td colspan='3'>Data tidak ditemukan</td>";
                    echo "<tr>"; 
                  }
                  ?>
                  
              </tbody>
              </table>
          </div>
      </div>
      </div>
  </div>
  </section>

<?php require_once 'views/footer.php'?>



