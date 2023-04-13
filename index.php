<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mirza Purnandi</title>
</head>

<body>
    <h3>.:: Kombinasi Soal ::.</h3>
    <form action="index.php" method="POST">
        <p>Soal(Masukkan nilai-nilai tiap pertanyaan dalam soal yang dipisah dengan koma,maksimal 10 pertanyaan)</p>
        <input type="text" name="datas" size="100" />
        <br>
        <br>
        <label for="total">T: </label><input type="text" name="total" size="5" />
        <input type="submit" name="AksiSubmit" />
    </form>

    <?php require_once('proses.php'); ?>
</body>

</html>