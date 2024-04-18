<?php
include('../config/app_config.php'); // Include the file with database connection details

if (isset($_POST['type']) && $_POST['type'] == "addReview") {

    $name = $_POST['name']; 
    $ageRange = $_POST['ageRange'];
    $title = $_POST['title'];
    $reviewText = $_POST['reviewText'];
    $rating = $_POST['rating'];
    $recommend = $_POST['recommend'];
    $producto = $_POST['producto'];

    // Initialize imagePaths array using array() for PHP version compatibility
    $imagePaths = array();
    $targetDir = "../../images/review_files/";  // Directory to store uploaded images

    for ($i = 1; $i <= 3; $i++) {
        if (isset($_FILES["image$i"]) && $_FILES["image$i"]["error"] == 0) {
            $extension = pathinfo($_FILES["image$i"]["name"], PATHINFO_EXTENSION);
            $targetFileName = $targetDir . date('Y-m-d_H-i-s') . '_' . uniqid() . '.' . $extension;
            if (move_uploaded_file($_FILES["image$i"]["tmp_name"], $targetFileName)) {
                $imagePaths[] = $targetFileName;
            }
        }
    }

    // Combine image paths into a comma-separated list
    $imagePathList = implode(',', array_map('mysql_real_escape_string', $imagePaths));
    $imagePathList = "'" . $imagePathList . "'";

    // Prepare and execute the database query to save the review data with image path list
    $sql = "INSERT INTO reviews (id, name, age_range, title, review_text, rating, recommend, image_path_list, review_date, producto)
            VALUES ('" . uniqid() . "', '$name', '$ageRange', '$title', '$reviewText', '$rating', '$recommend', $imagePathList, NOW(), '$producto')";

    if (mysql_query($sql)) {
        echo "¡Revisión guardada exitosamente!";
    } else {
        echo "Error: " . $sql . "<br>" . mysql_error();
    }

} else if (isset($_POST['type']) && $_POST['type'] == "getReviewsByProducto") {
    $producto = $_POST['producto'];
    $sql = "SELECT * FROM reviews WHERE producto = '$producto' LIMIT 10";
    $result = mysql_query($sql);

    if ($result) {
        $reviews = array();

        while ($row = mysql_fetch_assoc($result)) {
            $respond = json_decode($row['respond'], true); // Add true as the second parameter to return an associative array
            
            if (isset($respond["reply_name"])) {
                $replyName = (int)$respond["reply_name"];
                
                $userQuery = "SELECT * FROM usuario_admin WHERE id = $replyName";
                $userResult = mysql_query($userQuery);
                
                if ($userResult && mysql_num_rows($userResult) > 0) {
                    $user = mysql_fetch_assoc($userResult);
                    $respond["user"] = $user['usuario'];
                    $respond["imagenes"] = $user['imagenes'];
                }
            }

            $reviews[] = array(
                'id' => $row['id'],
                'author' => $row['name'],
                'ageRange' => $row['age_range'],
                'date' => $row['review_date'],
                'rating' => $row['rating'],
                'title' => $row['title'],
                'reviewText' => $row['review_text'],
                'images' => $row['image_path_list'],
                'recommend' => $row['recommend'],
                'approve' => $row['approve'],
                'respond' => $respond
            );
        }

        // Output reviews data as JSON
        header('Content-Type: application/json');
        echo json_encode($reviews);
    } else {
        echo 'Error fetching review data.';
    }

} else if (isset($_POST['type']) && $_POST['type'] == "getReviews") {

} else if (isset($_POST['type']) && $_POST['type'] == "reverseApprove") {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $value = isset($_POST['value']) ? $_POST['value'] : '';

    // Update the database record based on the received data
    $updateQuery = "UPDATE reviews SET approve = '" . mysql_real_escape_string($value) . "' WHERE id = '" . mysql_real_escape_string($id) . "'";
    $result = mysql_query($updateQuery);

    if ($result) {
        $response = array('status' => 'success', 'message' => 'Database record updated successfully');
    } else {
        $response = array('status' => 'error', 'message' => 'Error updating database record: ' . mysql_error());
    }

    // Send JSON response back to the client
    header('Content-Type: application/json');
    echo json_encode($response);
} else if (isset($_POST['type']) && $_POST['type'] == "replyReview") {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $addArray = array('description' => $description, 'reply_name' => $_SESSION["LOGUEO"], 'reply_date' => NOW('Y-m-d H-i-s')); 

    // Fetch the current JSON data from the database
    $selectQuery = "SELECT respond FROM reviews WHERE id = '" . mysql_real_escape_string($id) . "'";
    $selectResult = mysql_query($selectQuery);

    if ($selectResult) {
        $row = mysql_fetch_assoc($selectResult);
        $currentJsonData = $row['respond'];
        
        // Decode the current JSON data
        $currentData = $currentJsonData ? json_decode($currentJsonData, true) : array();

        // Merge the current data with the new data
        $mergedData = array_merge($currentData, $addArray);

        // Encode the merged data as JSON
        $mergedJsonData = json_encode($mergedData);

        // Update the database record with the merged data
        $updateQuery = "UPDATE reviews SET respond = '" . mysql_real_escape_string($mergedJsonData) . "' WHERE id = '" . mysql_real_escape_string($id) . "'";
        $result = mysql_query($updateQuery); 

        if ($result) {
            $response = array('status' => 'success', 'message' => 'Database record updated successfully');
        } else {
            $response = array('status' => 'error', 'message' => 'Error updating database record: ' . mysql_error());
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Error fetching data: ' . mysql_error());
    }

    // Send JSON response back to the client
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>