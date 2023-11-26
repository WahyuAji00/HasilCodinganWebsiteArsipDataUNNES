<?php
include "connection.php";

    if (isset($_POST["submit"])) {
        $filename = $_FILES["file"]["name"];
        $filetype = $_FILES["file"]["type"];
        $filedata = $filename .".". $filetype;
        $tmp_name = $_FILES["file"]["tmp_name"];

        $direktori = "BerkasFile1/";
        $file = $direktori . $filename;
        move_uploaded_file($tmp_name, $file);

        $sql = "INSERT INTO dokumenlatihan (namafile, typefile, datafile) VALUES ('$filename', '$filetype', '$filedata')";
        if ($connection->query($sql) === TRUE) {
            echo "File berhasil diunggah.";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    }

    $connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="ms-4">
        <h1>UPLOAD FILE</h1>
            <form method="post" enctype="multipart/form-data">
                <label for="file">File Upload :</label> <br>
                <input type="file" value="file" name="file"> <br><br>
                <button class="btn btn-info" value="submit" name="submit">Submit</button>
            </form>
                <form method="post" action="dokumenlatihanupload.php">
                    <input type="submit" class="btn btn-info mt-2" value="Reset" name="reset">
                </form>
    </div>
</body>
</html>