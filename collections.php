<?php
// Include the database connection
require_once 'includes/db.php';

try {
    // Query the database for all collections
    $stmt = $pdo->query('SELECT id, name FROM collections');
    $collections = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Query the database for all products (books)
    $stmt_books = $pdo->query('SELECT id, name, price, image FROM products');
    $books = $stmt_books->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Handle database errors
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore Collections</title>
    <!-- Add the link to the CSS file here -->
    <link rel="stylesheet" href="style.css"> <!-- Ensure the path is correct -->
 
    <style>
        /* Set background to light blue with dark text for better contrast */
        body {
            background-color: #ADD8E6; /* Light blue background */
            color: #333333; /* Dark gray text for readability */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Header style */
        header {
            background-color: #4682B4; /* Steel blue header */
            padding: 20px;
            text-align: center;
        }

        header h1 {
            color: #ffffff; /* White text for header */
            font-size: 2.5em;
        }

        /* Navigation Bar */
        .navbar {
            background-color: #5F9EA0; /* Cadet blue navbar */
            padding: 10px;
        }

        .nav-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        .nav-item {
            margin-right: 20px;
            position: relative;
        }

        .nav-item a {
            color: #ffffff; /* White text for nav items */
            text-decoration: none;
            font-size: 1.2em;
        }

        .dropdown {
            display: none;
            position: absolute;
            background-color: #4682B4;
            list-style-type: none;
            padding: 0;
            margin-top: 10px;
        }

        .nav-item:hover .dropdown {
            display: block;
        }

        .dropdown li {
            padding: 10px;
        }

        .dropdown li a {
            color: #ffffff; /* White text for dropdown items */
            text-decoration: none;
        }

        /* Books section */
        .books-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .book {
            background-color: #f0f8ff; /* Alice blue for book cards */
            border: 1px solid #87CEEB; /* Light sky blue border */
            margin: 10px;
            padding: 15px;
            width: 200px;
            text-align: center;
            border-radius: 8px;
        }

        .book h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .book p {
            font-size: 1.1em;
        }

        .book img {
            width: 150px;
            height: auto;
            border-radius: 5px;
        }

        /* Footer style */
        footer {
            background-color: #4682B4; /* Steel blue footer */
            padding: 15px;
            text-align: center;
            color: #ffffff;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>

<body>

<header>
    <h1>Bookstore Collections</h1>
</header>

<main>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="#">Collections</a>
                <ul class="dropdown">
                    <!-- Option to show all books -->
                    <li><a href="#">All Collections</a></li>

                    <!-- Loop through all collections and display them in the dropdown -->
                    <?php foreach ($collections as $collection): ?>
                        <li><a href="#"><?php echo htmlspecialchars($collection['name']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Books Section -->
    <div class="books-container">
        <!-- Loop through all books and display them -->
        <?php foreach ($books as $book): ?>
            <div class="book">
                <h3><?php echo htmlspecialchars($book['name']); ?></h3>
                <p>Price: ₹<?php echo htmlspecialchars($book['price']); ?></p>
                <?php if (!empty($book['image'])): ?>
                    <img src="<?php echo htmlspecialchars($book['image']); ?>" alt="<?php echo htmlspecialchars($book['name']); ?>">
                <?php else: ?>
                    <p>No image available</p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Bookstore</p>
</footer>

</body>
</html>
