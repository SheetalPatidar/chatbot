<?php
include("db.php");

if (isset($_POST["userMsg"])) {
    // Retrieve user query from the chatbox
    $userQuery = $_POST["userMsg"];

    // Define the list of keywords
    $keywords = array("crash course", "course", "blog", "login", "selection", "team", "contact", "material");

    // Check if any keyword matches a word in the input sentence
    $matchedKeyword = '';
    foreach ($keywords as $keyword) {
        if (stripos($userQuery, $keyword) !== false) {
            $matchedKeyword = $keyword;
            break;
        }
    }

    if (!empty($matchedKeyword)) {
        // Search for the keyword in the database
        $query = "SELECT url_name FROM query WHERE user_query LIKE :keyword";
        $statement = $db->prepare($query);
        $statement->bindValue(':keyword', '%' . $matchedKeyword . '%');
        $statement->execute();

        // Fetch the corresponding paths
        $paths = $statement->fetchAll(PDO::FETCH_COLUMN);

        // If paths are found, redirect to the first path
        if (!empty($paths)) {
            $url = 'https://www.sciastra.com/' . $paths[0] . '/';
            header('Location: ' . $url);
            exit();
        } else {
            // Handle case when no paths are found
            echo 'No results found.';
        }
    } else {
        // Handle case when no keyword is matched
        echo 'No matching keyword found in the input.';
    }
}
?>
