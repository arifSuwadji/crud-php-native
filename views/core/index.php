<?php
require_once 'controllers/core/function.php';
$s_cwd = "modules/";
if(isset($_GET['delete'])){
  rmdirs($s_cwd.$_GET['delete']);
  rmdatahalamanmenu($_GET['delete']);
}
function rmdatahalamanmenu($s_table){
  $query = mysqli_query(Connect(),"DELETE FROM halaman_menu WHERE nama_table='$s_table'");
}
function rmdirs($s_d){
	$s_f = glob($s_d . '*', GLOB_MARK);
	foreach($s_f as $s_z){
		if(is_dir($s_z)) rmdirs($s_z);
		else unlink($s_z);
	}
	if(is_dir($s_d)) rmdir($s_d);
}
$s_fname = array();
$s_dname = array();
if(function_exists("scandir") && $s_dh = @scandir($s_cwd)){
  foreach($s_dh as $s_file){
    if(is_dir($s_cwd.$s_file)) $s_dname[] = $s_file;
    elseif(is_file($s_cwd.$s_file)) $s_fname[] = $s_file;
  }
}
else{
  if($s_dh = @opendir($s_cwd)){
    while($s_file = readdir($s_dh)){
      if(is_dir($s_cwd.$s_file)) $s_dname[] = $s_file;
      elseif(is_file($s_cwd.$s_file))$s_fname[] = $s_file;
    }
    closedir($s_dh);
  }
}
?>
<?php require_once 'views/header.php' ?>
<?php 
if(is_file("config/conn.php")){
  require_once 'views/menu.php';
}
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>PHP CRUD Generator</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">CRUD Generator</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>
      <?php
      if(is_file("config/conn.php")){
        if(!Connect()){ ?>
          <section class="content">
          <div class="container-fluid">
            <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Remove Config</h3>

                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                </div>
            </div>
            <div class="card-body">
              <p>
                Config untuk koneksi ke database telah dibuat.<br>
                Namun terjadi kesalahan yang mengakibatkan tidak terhubungnya database ke system ini.<br>
                Silahkan ubah data pada config/conn.php untuk memperbaikinya<br>
                Atau hapus dan buat ulang menggunakan button ini ==> <a href="?delete=config" class="btn btn-danger btn-sm"> Hapus </a>
              </p>
            </div>
            </div>
          </div>
          </section>

        <?php }else{ ?>
          <section class="content">
          <div class="container-fluid">
            <div class="row">
            <div class="col-md-6">
              <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title"> One By One</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                  </div>
              </div>
              <div class="card-body">
                <form action="createGenerator" method="post">
                  <div class="form-group">
                    <label>Table Name</label>
                    <select  name="table" class="select2 form-control" data-placeholder="Please Select">
                      <option value="">Please Select</option>
                      <?php
                        $Table = Table();
                        foreach ($Table as $key) {
                          $find = array_search($key['table_name'], $s_dname);
                          if($key['table_name'] == 'pengaturan') continue;
                          if($key['table_name'] == 'hak_akses_menu') continue;
                          if(empty($find)){
                            echo "<option value='".$key['table_name']."'> ".$key['table_name']."</option>";
                          }
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="menu_title"> Menu Title</label>
                    <input type="text" class="form-control" id="menu_title" name='menu_title' placeholder='Pengguna'>
                  </div>
                  <div class="form-group">
                    <label for="menu_icon"> Menu Icon</label>
                    <input type="text" class="form-control" id="menu_icon" name='menu_icon' placeholder='nav-icon fas fa-edit'>
                  </div>
                  <br>
                  <input type="submit" name="generate" value="Generate" class="btn btn-info">
                </form>
              </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title"> Generate All</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>'
                  </div>
              </div>
              <div class="card-body">
                <form action="createGenerator" method="post">
                  <input type="submit" name="all" value="Generate All" class="btn btn-danger ">
                </form>
              </div>
              </div>
            </div>
            </div>
          </div>
          </section>
        <?php }
      } else{ ?>
        <section class="content">
        <div class="container-fluid">
          <div class="card card-default">
          <div class="card-header">
              <h3 class="card-title">Create Database Connection</h3>

              <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
              </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form class="form-horizontal" action="createGenerator" method="post">
              <div class="form-group">
                <label class="control-label col-sm-4" for="hostname">Hostname</label>
                <div class="col-sm-8">
                  <input type="text" name='host' class="form-control" id="hostname" placeholder="localhost">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4" for="dbname">Database Name</label>
                <div class="col-sm-8">
                  <input type="text" name='dbname' class="form-control" id="dbname" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4" for="dbuser">Database User</label>
                <div class="col-sm-8">
                  <input type="text" name='dbuser' class="form-control" id="dbuser" placeholder="root">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4" for="dbpwd">Database Password</label>
                <div class="col-sm-8">
                  <input type="text" name='dbpwd' class="form-control" id="dbpwd" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                  <button type="submit" name="genConf" class="btn btn-warning">Generate Config File</button>
                </div>
                <div class="col-sm-4"></div>
              </div>
            </form>
          </div>
          </div>
        </div>
        </section>
      <?php } ?>

      <section class="content">
        <div class="container-fluid">
          <div class="card card-default">
          <div class="card-header">
              <h3 class="card-title">List Folder</h3>

              <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
              </div>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <tbody>
                <tr>

                  <?php
                  foreach ($s_dname as $folders) {

                    if(
                      $folders == ".." ||
                      $folders == "." ||
                      $folders == "halaman_menu" ||
                      $folders == "pengguna" ||
                      $folders == "pengguna_grup"
                    ){}
                    else{
                      // bikin link :
                      ?>
                      <td>
                        <a href="<?php echo $folders;?>"><?php echo $folders;?></a>
                      </td>
                      <td>
                        <a href="?delete=<?php echo $folders; ?>" class="btn btn-danger btn-sm"> Delete</a>
                      </td>
                    </tr>
                      <?php
                    }
                  }
                    ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>
<?php require_once 'views/footer.php'?>
