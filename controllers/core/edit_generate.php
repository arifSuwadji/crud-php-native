<?php
function gen_edit($table){
  require_once 'language_generate.php';
  $lang = gen_language($table);
  $nopf = NoPrimaryField($table);
  $pf   = PrimaryField($table);
  $urlPost = BASE_URL.$table.'/func';

$string .= "
<?php
require_once 'func.php';
\$id = \$_POST['$pf'];
\$one = GetOne(\$id);
?>
<?php require_once 'views/header.php'?>
<?php require_once 'views/menu.php'?>

  <!-- Content Header (Page header) -->
  <section class='content-header'>
  <div class='container-fluid'>
      <div class='row mb-2'>
      <div class='col-sm-6'>
          <h1>Edit <?php echo ucwords('$lang[$table]') ?></h1>
      </div>
      <div class='col-sm-6'>
          <ol class='breadcrumb float-sm-right'>
          <li class='breadcrumb-item'><a href='#'><?php echo ucwords('$lang[$table]') ?></a></li>
          <li class='breadcrumb-item active'>Edit <?php echo ucwords('$lang[$table]') ?></li>
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
        <input type='hidden' name='$pf' value=\"<?php echo \$_POST['$pf']; ?>\">
        ";
        $nopf = NoPrimaryField($table);
        foreach($nopf as $field){
        $string .= "<div class='form-group'>
            <label for=\"".$field['column_name']."\"> ".$lang[$field['column_name']]."</label>
            <input type=\"text\" class=\"form-control\" id=\"".$field['column_name']."\" name='".$field['column_name']."' placeholder='".$lang[$field['column_name']]."' value=\"<?php echo \$one[0]['".$field['column_name']."']; ?>\">
          </div>
        ";
        } 
        $string .="
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
";

createFile($string, "modules/".$table."/edit.php");
}
?>
