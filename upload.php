<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the file was uploaded without errors
    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
	$fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Check if the file is a ZIP file
        if ($fileExtension === 'zip') {
            // Define destination paths for the uploaded file and extraction
            $uploadFileDir = '/S203/fichiers_uploades/';
            $uploadFilePath = $uploadFileDir.$fileName;
	    echo $uploadFilePath;
	    echo $uploadFileDir.$fileName;
            $extractPath = $uploadFileDir.'/extracted/';

            // Move the uploaded file to the destination directory
            if (move_uploaded_file($fileTmpPath, $uploadFilePath)) {
                echo "Le fichier a été uploadé avec succès.";

                // Open and extract the ZIP archive
                $zip = new ZipArchive();
                if ($zip->open($uploadFilePath) === TRUE) {
                    $zip->extractTo($extractPath);
                    $zip->close();
                    echo "Le fichier a été extrait avec succès.";

                    // Display the extracted files
                    $extractedFiles = scandir($extractPath);
                    foreach ($extractedFiles as $file) {
                        if ($file !== '.' && $file !== '..') {
                            echo "<br>File: " . $file;
                        }
                    }
                } else {
                    echo "Échec de l'ouverture de l'archive ZIP.";
                }
            } else {
                echo "Erreur lors du déplacement du fichier téléchargé.";
            }
        } else {
            echo "Seuls les fichiers ZIP sont autorisés.";
        }
    } else {
        echo "Erreur lors de l'upload du fichier : " . $_FILES['file']['error'];
    }
} else {
    echo "Méthode de requête non autorisée.";
}
?>

