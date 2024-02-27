<?php
function classificarIMC($imc) {
    $classificacoes = array(
        array('Limite Inferior' => 0, 'Limite Superior' => 18.5, 'Classificacao' => 'Magreza'),
        array('Limite Inferior' => 18.51, 'Limite Superior' => 24.9, 'Classificacao' => 'Saudável'),
        array('Limite Inferior' => 25.0, 'Limite Superior' => 29.9, 'Classificacao' => 'Sobrepeso'),
        array('Limite Inferior' => 30.0, 'Limite Superior' => 34.9, 'Classificacao' => 'Obesidade Grau I'),
        array('Limite Inferior' => 35.0, 'Limite Superior' => 39.9, 'Classificacao' => 'Obesidade Grau II'),
        array('Limite Inferior' => 40.0, 'Limite Superior' => PHP_FLOAT_MAX, 'Classificacao' => 'Obesidade Grau III')
    );
    foreach ($classificacoes as $faixa) {
        if ($imc >= $faixa['Limite Inferior'] && $imc <= $faixa['Limite Superior']) {
            $classificacao = $faixa['Classificacao'];
            echo "Atenção, seu IMC é $imc, e você está classificado como $classificacao";
            return;
        }
    }
    echo "Faixa de IMC não encontrada para o valor $imc";
}
if (isset($_POST['imc'])) {
    $valorIMC = floatval($_POST['imc']);
    classificarIMC($valorIMC);
} else {
    echo "Informe um valor de IMC.";
}
?>
<form method="post" action="">
    <label for="imc">Informe o valor do IMC:</label>
    <input type="text" name="imc" id="imc" required>
    <button type="submit">Enviar</button>
</form>