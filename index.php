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
        <h1 class="heading">Ksiągarnia</h1>

        <div class="filters">
            <form method="get">
                <label for="title">Tytuł: </label>
                <input name="title" id="title" type="text">

                <label for="category">Kategoria: </label>
                <select name="category" id="category">
                    <option value="">Wszystkie</option>
                    <?php
                        require_once 'config.php';

                        $query = "SELECT DISTINCT category FROM lectures";
                        $stmt = $pdo->query($query);

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row['category'] . '">' . $row['category'] . '</option>';
                        }
                    ?>
                </select>

                <button type="submit" class="search-button">Szukaj</button>
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
            <table class="table">
                <thead>
                    <th>Tytuł</th>
                    <th>Autor</th>
                    <th>Opis</th>
                    <th>Kategoria</th>
                    <th>Dostępnych sztuk</th>
                </thead>
                <tbody>

                    <?php
                        require_once 'config.php';

                        $title = '';
                        $category = '';

                        if (isset($_GET['title'])) {
                            $title = filter_input(INPUT_GET, 'title', FILTER_SANITIZE_STRING);
                        }

                        if (isset($_GET['category'])) {
                            $category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING);
                        }

                        $stmt = $pdo->prepare("SELECT * FROM lectures WHERE title LiKE :title AND category LIKE :category");

                        $stmt->execute([
                            ':title' => '%' . $title . '%',
                            ':category' => '%' . $category . '%'
                        ]);

                        if ($stmt->rowCount() < 1) {
                            echo 'Brak książek dla tego tytułu i kategorii';
                        } else {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . $row['title'] . "</td>";
                                echo "<td>" . $row['author'] . "</td>";
                                echo "<td>" . $row['description'] . "</td>";
                                echo "<td>" . $row['category'] . "</td>";
                                echo "<td>" . $row['quantity'] . "</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

