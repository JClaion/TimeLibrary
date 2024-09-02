<!-- header.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : "TimeLibrary"; ?></title>
    <?php
        // Links adicionais (CSS)
        if (isset($additionalLinks)) {
            foreach ($additionalLinks as $link) {
                echo '<link rel="stylesheet" href="' . $link . '">';
            }
        }
    ?>
</head>
<body>