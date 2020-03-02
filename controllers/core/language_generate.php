<?php
function gen_language($table){
    $nopf = NoPrimaryField($table);
    $pf   = PrimaryField($table);
    $name_table = str_replace('_',' ', $table);
    $arrLangunge = array($table => $name_table);
    foreach ($nopf as $field) {
        $langField = str_replace('_',' ', $field['column_name']);
        $langField = ucwords($langField);
        $arrLangunge[$field['column_name']] = $langField;
    }
    return $arrLangunge;
}

?>