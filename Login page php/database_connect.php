<?php
// Connect to the database
$servername = "localhost";
$username = "ZRGMEDIA";
$password = "admin";
$dbname = "MSANII";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve artist data from the database
$sql = "SELECT * FROM artists";
$result = mysqli_query($conn, $sql);

?>

<!-- Dashboard HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content goes here -->
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-column">
            <h2>Welcome to your Dashboard</h2>
            
            <?php
            // Display artist data from the database
            while ($row = mysqli_fetch_assoc($result)) {
                $profilePicture = $row['profile_picture'];
                $name = $row['name'];
                $description = $row['description'];
                $youtubeChannel = $row['youtube_channel'];
            ?>
            
            <div class="artist">
                <img src="<?php echo $profilePicture; ?>" alt="<?php echo $name; ?> Profile Picture" class="artist-profile-picture">
                <div class="artist-details">
                    <div>
                        <h3 class="artist-name"><?php echo $name; ?></h3>
                        <p class="artist-description"><?php echo $description; ?></p>
                    </div>
                    <a href="<?php echo $youtubeChannel; ?>" target="_blank" class="btn btn-primary subscription-button">Subscribe</a>
                </div>
            </div>
            
            <?php
            }
            
            // Close the database connection
            mysqli_close($conn);
            ?>
            
        </div>
    </div>
</body>
</html>
