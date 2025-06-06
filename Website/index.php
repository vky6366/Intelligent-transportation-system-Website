<?php
require_once __DIR__ . '/includes/db.php';

// Get available videos
$conn = getDBConnection();
$videos = [];
if ($conn) {
    $stmt = $conn->query("SELECT video_id, title FROM videos ORDER BY created_at DESC");
    $videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITS Learning Platform</title>
    <link rel="stylesheet" href="assets/css/style.css">


</head>

<body>
    <div class="real ">
        <div class="container">
            <i class="phone"></i>
            <b></b>
            <i class="envelope_icon"></i>
        </div>
    </div>

    <div class="container1">
        <div class="row1">
            <div class="site_header_1">
                <a class="back" href="https://aitmbgm.ac.in">
                    <img class="photo" src="https://aitmbgm.ac.in/wp-content/themes/aitmbgm-20/images/Suresh-Angadi.jpg"
                        alt="AITMBGM" title="AITMBGM">
            </div>

            <div class="site_header_2">
                <a class="back" href="https://aitmbgm.ac.in">
                    <img class="photo" src="https://aitmbgm.ac.in/wp-content/themes/aitmbgm-20/images/aitmbgm-logo.png"
                        alt="AITMBGM" title="AITMBGM">
                </a>
            </div>

            <div class="site_header_3">
                <h6>SURESH ANGADI EDUCATION FOUNDATIONS</h6>
                <h2>ANGADI INSTITUTE OF TECHNOLOGY AND MANAGEMENT</h2>
                <span>Approved by AICTE, New Delhi, Affiliated to VTU, Belagavi. <br>Accredited by *NBA and NAAC</span>
            </div>

            <div class="site_header_4">
                <img class="photo" src="https://aitmbgm.ac.in/wp-content/themes/aitmbgm-20/images/aitm-logo.png"
                    alt="AITM" title="AITM">
            </div>
        </div>
    </div>

    <nav class="navbar">
        <ul>
            <li><a href="#">Home</a></li>
            <!-- Add more nav items as needed -->
        </ul>
        <div class="language-dropdown"
            style="margin-left:auto; margin-right:10px; display:flex; align-items:center; font-weight: bold; font-size: 16px; w-4">
            <label for="languageSelect"
                style="color:white; margin-right:8px; font-weight: bold; font-size: 16px; ">Language:</label>
            <select id="languageSelect" onchange="changeLanguage(this.value)">
                <option value="en">English</option>
                <option value="hi">Hindi</option>
                <option value="kn">Kannada</option>
                <!-- Add more languages as needed -->
            </select>
        </div>
    </nav>

    <div class="container_page_layout">
        <div class="video-list">
            <h2>Available Videos</h2>
            <ul id="videosList">
                <?php foreach ($videos as $video): ?>
                <li>
                    <a href="#" onclick="selectVideo(<?php echo $video['video_id']; ?>); return false;">
                        <?php echo htmlspecialchars($video['title']); ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="main-content">
            <div class="video-container">
                <div class="video-wrapper">
                    <video id="videoElement" controlsList="nodownload">
                        Your browser does not support the video element.
                    </video>
                    <div class="video-controls">
                        <button id="playPauseBtn">Play</button>
                        <div id="progressBar">
                            <div id="progress"></div>
                        </div>
                        <div class="time-display">
                            <span id="currentTime">00:00</span> /
                            <span id="duration">00:00</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="transcription-container">
                <div id="transcriptionText" class="transcription-text"></div>
            </div>
        </div>
    </div>

    <footer>
        <h2>Angadi Institute Of Technology And Management</h2>
    </footer>

    <script src="assets/js/player.js"></script>

</body>

</html>