<?php
$lampada = $_POST['lampada'] ?? '';
$status = $_POST['status'] ?? '';

if ($lampada && $status) {
    file_put_contents("log_lampada_{$lampada}.txt", $status);
    echo "OK";
} else {
    echo "Erro: parâmetros inválidos.";
}
?>
