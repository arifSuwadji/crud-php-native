<?php
function gen_create($table){
  require_once 'language_generate.php';
  $lang = gen_language($table);
  $urlPost = BASE_URL.$table.'/func';
$string .= "
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
          <h1>Tambah <?php echo ucwords('$lang[$table]') ?></h1>
      </div>
      <div class='col-sm-6'>
          <ol class='breadcrumb float-sm-right'>
          <li class='breadcrumb-item'><a href='#'><?php echo ucwords('$lang[$table]') ?></a></li>
          <li class='breadcrumb-item active'>Tambah <?php echo ucwords('$lang[$table]') ?></li>
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
          <h3 class='card-title'>Form <?php echo ucwords('$lang[$table]') ?></h3>
      </div>
      <!-- /.card-header -->
      <form role='form' action='<?php echo '$urlPost' ?>' method='POST'>
        <div class='card-body'>
        ";
        $nopf = NoPrimaryField($table);
        foreach($nopf as $field){
        $string .= "<div class='form-group'>
            <label for=\"".$field['column_name']."\"> ".$lang[$field['column_name']]."</label>
            <input type=\"text\" class=\"form-control\" id=\"".$field['column_name']."\" name='".$field['column_name']."' placeholder='".$lang[$field['column_name']]."'>
          </div>
        ";
        } 
        $string .="
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

";
createFile($string, "modules/".$table."/create.php");
}
?>