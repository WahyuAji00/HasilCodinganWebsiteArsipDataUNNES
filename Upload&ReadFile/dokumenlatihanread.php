<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Reader</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <div class="ms-4">
        <h1>READER FILE</h1>
            <form method="post" enctype="multipart/form-data">
                <label for="file">File :</label> <br> <br>
            </form>
            <form class="d-flex row mt-2" method="get">
                <input type="text" placeholder="Cari File" name="keyword" size="35" autocomplete="off">
                <input type="submit" name="search" value="Search">
                <?php
                    if (isset($_GET['keyword'])) {
                        $search_query = $_GET['keyword'];

                        $folder_path = "BerkasFile1/";
                        $files = scandir($folder_path);

                        echo '<div class="search-result">';
                        foreach ($files as $file) {
                            if (stripos($file, $search_query) !== false) {
                                echo '<a href="' . $folder_path . '/' . $file . '">' . $file . '</a><br><br>';
                            }
                        }
                    }
                ?>
            </form>
    </div>
</body>
</html>

<?php
    include "connection.php";
    $files = scandir("BerkasFile1/");
    foreach($files as $file) {
        if ($file != "." && $file != "..") {
            echo "<li><a href='BerkasFile1/$file'>$file</a></li>";
        }
    }
?>