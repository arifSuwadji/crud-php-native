<?php
function gen_func($table){
$pf = PrimaryField($table);
$nopf = NoPrimaryField($table);
$nextUrl = BASE_URL.$table;

$string .= "<?php
require_once 'config/conn.php';

function GetAll(){
  \$dataFilter = array();\n\t";
  foreach($nopf as $fieldName){
    $string .= "array_push(\$dataFilter, '".$fieldName['column_name']."');\n\t";
  }
  $string .="\$queryLimit = \"SELECT * FROM pengaturan WHERE pengaturan_id=1\";
  \$resultLimit = mysqli_query(Connect(), \$queryLimit);
  \$exeLimit = mysqli_fetch_object(\$resultLimit);
  \$limitQuery = \$exeLimit ? \$exeLimit->isi_pengaturan : 0;
  \$query = \"SELECT * FROM ".$table." limit 0,\$limitQuery\";
  \$array_search = array();
  foreach(\$dataFilter as \$fieldName){
    if(\$_GET[\$fieldName]){
      array_push(\$array_search, \$fieldName .' like \"%'.\$_GET[\$fieldName] .'%\"');
    }
  }
  if(count(\$array_search) > 0){
    \$query = \"SELECT * FROM ".$table." WHERE \". join(' AND ',\$array_search).\" limit 0,\$limitQuery\";
  }";
  $string .="\$exe = mysqli_query(Connect(),\$query);
  while(\$data = mysqli_fetch_array(\$exe)){
    \$datas[] = array(";
    $fields = AllField($table);
    foreach($fields as $fieldName){
      $string .= "'".$fieldName['column_name']."' => \$data['".$fieldName['column_name']."'],\n\t\t";
    }
$string .= "
    );
  }
  return \$datas;
}
";
$string .="
function GetOne(\$id){
  \$query = \"SELECT * FROM  `$table` WHERE  `$pf` =  '\$id'\";
  \$exe = mysqli_query(Connect(),\$query);
  while(\$data = mysqli_fetch_array(\$exe)){
    \$datas[] = array(";
    $fields = AllField($table);
    foreach($fields as $fieldName){
      $string .= "'".$fieldName['column_name']."' => \$data['".$fieldName['column_name']."'], \n\t\t";
    }
$string .= "
    );
  }
return \$datas;
}
";
$string .="
function Insert(){
  ";
$nopf = NoPrimaryField($table);
$pf   = PrimaryField($table);
foreach($nopf as $fieldName){
  $string .="\$".$fieldName['column_name']."=\$_POST['".$fieldName['column_name']."']; \n\t\t";
}
$string .="
  \$query = \"INSERT INTO `$table` (";
$i=0;
foreach($nopf as $fieldName){
  $i++;
  if(count($nopf) == $i){
    $string .="`".$fieldName['column_name']."`";
  }else{
    $string .="`".$fieldName['column_name']."`,";
  }

}
$string .=")
VALUES (";
$i=0;
foreach($nopf as $fieldName){
  $i++;
  if(count($nopf) == $i){
    $string .="'\$".$fieldName['column_name']."'";
  }else{
    $string .="'\$".$fieldName['column_name']."',";
  }
}
$string .=")\";
\$exe = mysqli_query(Connect(),\$query);
  if(\$exe){
    // kalau berhasil
    \$_SESSION['message'] = \" Data Sudah disimpan \";
    \$_SESSION['mType'] = \"success \";
    header(\"Location: $nextUrl\");
  }
  else{
    \$_SESSION['message'] = \" Data Gagal disimpan \";
    \$_SESSION['mType'] = \"danger \";
    header(\"Location: $nextUrl\");
  }
}";
$string .="
function Update(\$id){
  ";
$nopf = NoPrimaryField($table);
foreach($nopf as $fieldName){
  $string .="\$".$fieldName['column_name']."=\$_POST['".$fieldName['column_name']."']; \n\t\t";
}
$string .="
  \$query = \"UPDATE `$table` SET ";
$i = 0;
foreach($nopf as $fieldName){
  $i++;
  if(count($nopf) == $i){
    $string .="`".$fieldName['column_name']."` = '\$".$fieldName['column_name']."' ";
  }else{
    $string .="`".$fieldName['column_name']."` = '\$".$fieldName['column_name']."',";
  }
}
$string .="WHERE  `$pf` =  '\$id'";
$string .="\";
\$exe = mysqli_query(Connect(),\$query);
  if(\$exe){
    // kalau berhasil
    \$_SESSION['message'] = \" Data Sudah diubah \";
    \$_SESSION['mType'] = \"success \";
    header(\"Location: $nextUrl\");
  }
  else{
    \$_SESSION['message'] = \" Data Gagal diubah \";
    \$_SESSION['mType'] = \"danger \";
    header(\"Location: $nextUrl\");
  }
}";
$string .="
function Delete(\$id){
  \$query = \"DELETE FROM `$table` WHERE `$pf` = '\$id'\";
  \$exe = mysqli_query(Connect(),\$query);
    if(\$exe){
      // kalau berhasil
      \$_SESSION['message'] = \" Data Sudah dihapus \";
      \$_SESSION['mType'] = \"success \";
      header(\"Location: $nextUrl\");
    }
    else{
      \$_SESSION['message'] = \" Data Gagal dihapus \";
      \$_SESSION['mType'] = \"danger \";
      header(\"Location: $nextUrl\");
    }
}

";
$string .="
if(isset(\$_POST['insert'])){
  Insert();
}
else if(isset(\$_POST['update'])){
  Update(\$_POST['$pf']);
}
else if(isset(\$_POST['delete'])){
  Delete(\$_POST['$pf']);
}
?>
";

mkdir("modules/".$table);
createFile($string, "modules/".$table."/func.php");
Replace($table,"func",",)",")");
Replace($table,"func",",WHERE"," WHERE");
}
?>
