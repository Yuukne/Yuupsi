<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/psicologia/"; // Diretório de destino dentro do diretório do XAMPP
  $pastaDestino = $_POST['pastaDestino']; // Pasta de destino selecionada
  
  // Verifica se o arquivo foi enviado
  if (isset($_FILES['fileToUpload'])) {
    $targetFile = $targetDir . $pastaDestino . "/" . basename($_FILES['fileToUpload']['name']);
    
    if (!file_exists($targetDir . $pastaDestino)) {
      mkdir($targetDir . $pastaDestino, 0777, true); // Cria a pasta de destino se não existir
    }
    
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile)) {
      echo "O arquivo foi enviado com sucesso para a pasta " . $pastaDestino . ".<br/>";
    } else {
      echo "Ocorreu um erro ao enviar o arquivo.<br/>";
    }
  } else {
    echo "Nenhum arquivo foi enviado.";
  }
}
?>
