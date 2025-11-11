<?php
$resource_file = 'resources/image.png';

if (!file_exists($resource_file)) {
    if (!is_dir('resources')) {
        mkdir('resources', 0755, true);
    }

    $image = imagecreate(100, 100);
    $background = imagecolorallocate($image, rand(50, 200), rand(50, 200), rand(50, 200));
    $text_color = imagecolorallocate($image, 255, 255, 255);
    imagestring($image, 3, 10, 45, 'Cached Image', $text_color);
    imagepng($image, $resource_file);
    imagedestroy($image);
}

header('Content-Type: image/png');

readfile($resource_file);
?>
