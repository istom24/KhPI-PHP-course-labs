<!--4. Перевірка наявності файлу:-->
<!--● Реалізуйте перевірку, чи існує файл з таким же ім'ям у папці uploads.-->
<!--● Якщо файл вже існує, повідомте про це користувача та запропонуйте йому змінити назву файлу або автоматично додайте унікальний суфікс
до імені файлу (наприклад, дату або випадковий номер).-->
<?php
if (isset($_FILES['file'])) {// isset - перевірка, що змінну оголосили й вона не null
    $uploaddir = 'uploads/';
    if (!is_dir($uploaddir)) {
        mkdir($uploaddir, 0777, true); // 0777 - права на читання, запис й створення запису
    }
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        $file_name = basename($_FILES['file']['name']);
        $file_type = mime_content_type($_FILES['file']['tmp_name']); // exif_imagetype
        echo $file_type;
        $is_correct_type = in_array($file_type, array("image/jpg", "image/jpeg", "image/png"));
//        var_dump($is_correct_type);
        $sizeInBytes = $_FILES['file']['size'];
//        var_dump($sizeInBytes);
        $is_correct_size = ($sizeInBytes <= 2 * 1024 * 1024);
//        var_dump($is_correct_size);


        if ($is_correct_size and $is_correct_type) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], // ['file']['tmp_name'] - тимчасове імя, під яких PHP зберігає файл, який зберіг на сервері
                    $uploaddir . $_FILES['file']['name'])) {
                echo "<p>Файл завантажений</p>";
                echo "<p>Файл успішно завантажений</p>";
                echo "<p>Ім'я файлу: " . $file_name . "</p>";
                echo "<p>Тип файлу: " . $file_type . "</p>";
                echo "<p>Розмір файлу: " . $sizeInBytes / 1024 . " Kб</p>";
                echo "<p><a href= '" . $uploaddir . $file_name . "' download>Завантажити файл</a></p>";
            }
        } else {
            echo "Тип файлу повинен бути png/jpeg/jpg";
        }
    }
} else { ?>
    <form enctype="multipart/form-data" action="process.php" method="POST">
        <input type="file" name="file"><br>
        <input type="submit" value="Відправити">
    </form>
<?php } ?>