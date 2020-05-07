<?php
require('model/database.php');
require('model/functions.php');

$all_quotes = get_all_quotes();
?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotes</title>
    <link rel="stylesheet" type="text/css" href="view/css/main.css" />
</head>

<!-- the body section -->
<body>
    <header>
            <h1>Quotes</h1><hr>
    </header>

    <main>
    <section>
        <div id="quote-text">
        <?php foreach ($all_quotes as $quote) : ?>
        <h2><?php echo $quote['text']; ?></h2>
        <h4>--<?php echo $quote['authorName']; ?> ---- <?php echo $quote['categoryName']; ?></h4><hr>
        <?php endforeach; ?>
        </div>
    </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Stanley Obrock</p>
        </footer>
</body>
</html>
            



