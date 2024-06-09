<?php
$filePath = '/var/www/html/S203/test.txt';

// Vérifie si le fichier existe
if (file_exists($filePath)) {
	// Envoie les en-têtes HTTP pour forcer le téléchargement du fichier
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($filePath));
	readfile($filePath); // Lit le fichier et le transmet au client
	exit;
} else {
	// Si le fichier n'existe pas, affiche un message d'erreur
	echo "Le fichier n'existe pas.";
}
?>

