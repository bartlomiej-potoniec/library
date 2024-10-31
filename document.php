<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Księgarnia</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="heading">Dokumenty Księgarni</h1>

        <div class="filters">
            <form method="get">
                <label for="document">Kategoria: </label>
                <select name="document" id="document">
                    <option value="regulamin.txt">Regulamin</option>
                    <option value="historia.txt">Historia księgarni</option>
                    <option value="biuletyn_informacyjny.txt">Biuletyn Informacyjny</option>
                </select>

                <button type="submit" class="search-button">Wyświetl</button>
            </form>
        </div>

        <div class="nav">
            <ul>
                <li><a href="index.php">Wyszukiwarka</a></li>
                <li><a href="document.php">Dokumenty</a></li>
            </ul>
        </div>

        <div style="clear: both;"></div>

        <div class="main">
            <?php
                if (isset($_GET['document'])) {
                    $document = $_GET['document'];

                    $file = readfile('documents/' . $document);
                    echo $file;
                }
            ?>
        </div>
    </div>
</body>
</html>

