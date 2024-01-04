<?php //template name: ListForm ?>
<?php
global $wpdb;
$tabela = 'wpyy_formularioDbECM';

$sql = "SELECT * FROM $tabela";
$registros = $wpdb->get_results($sql);

if($registros){
    foreach($registros as $registro){
        echo $registro->Nome . '<br>';
        echo $registro->Email . '<br>';
        echo $registro->Telefone . '<br>';
        echo $registro->Checkbox . '<br>';

    }
} else {
    echo 'Nenhum registro encontrado';
}