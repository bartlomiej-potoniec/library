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
        <div class="filters">
            <form action="get">
                <label for="title">Tytuł: </label>
                <input name="title" id="title" type="text">

                <label for="category">Kategoria: </label>
                <select name="category" id="category">
                    <option value="">Wszystkie</option>
                    <!-- skrypt PHP -->
                </select>

                <button type="submit">Szukaj</button>
            </form>
        </div>
    </div>
</body>
</html>