<!-- footer.php -->
    <?php
    // Scripts adicionais no final do body
    if (isset($additionalScriptsFooter)) {
        foreach ($additionalScriptsFooter as $script) {
            echo '<script src="' . $script . '"></script>';
        }
    }
    ?>

</body>
</html>
