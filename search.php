<?php
$search_term = $_GET['search'] ?? '';

if (!empty($search_term)) {
    // Create a new database connection
    $conn = new mysqli("localhost", "username", "password", "database_name");

    // Prepare and execute the stored procedure
    $stmt = $conn->prepare("CALL search_products(?)");
    $stmt->bind_param("s", $search_term);
    $stmt->execute();
    
    // Get the results
    $result = $stmt->get_result();
    
    // Fetch and display the results
    while ($row = $result->fetch_assoc()) {
        echo "Product ID: " . $row['id'] . " - Name: " . $row['name'] . " - Price: " . $row['price'] . "<br>";
    }

    $stmt->close();
    $conn->close();
}
?>
