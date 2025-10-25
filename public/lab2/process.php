<?php
$upload_dir = 'uploads/';
$maxFileSize = 2 * 1024 * 1024;

if (isset($_FILES['file'])) {

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        $fileName = basename($_FILES['file']['name']);
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $parts = explode('.', $fileName);
        $fileExtension = strtolower(end($parts));
        $fileMimeType = mime_content_type($fileTmpName);

        if (!in_array($fileExtension, array("jpg", "jpeg", "png"))) {
            die('Дозволені лише файли JPG, JPEG, PNG');
        }

        if ($fileSize > $maxFileSize) {
            die('Файл перевищує 2 МБ');
        }

        $targetPath = $upload_dir . $fileName;
        if (file_exists($targetPath)) {
            $fileInfo = pathinfo($fileName);
            $baseName = $fileInfo['filename'];
            $fileName = $baseName . '_' . time() . '.' . $fileExtension;
            $targetPath = $upload_dir . $fileName;
        }

        if (move_uploaded_file($fileTmpName, $targetPath)) {
            echo "Файл успішно завантажений<br>";
            echo "Ім'я файлу: " . $fileName . "<br>";
            echo "Тип файлу: " . $fileMimeType . "<br>";
            echo "Розмір файлу: " . round($fileSize / 1024, 2) . " КБ<br>";
            echo "<a href='" . $upload_dir . $fileName . "' download>Завантажити файл</a><br>";
        } else {
            echo "Помилка при завантаженні файлу";
        }
    } else {
        echo "Файл не був завантажений коректно";
    }
}
?>
