<?php

include "inc/top.inc.php";


?>
<div class="blue-gradient">
    <div class="hero-container">
        <img class="hero-image" src="./images/sky-earth-space-working.jpg" alt="Hero Image">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Web Conference</h1>
            <span class="current-year">2024<span id="year"></span></span>
            <?php
// Include the content_fetch.php file
include("content_fetch.php");
?>
        </div>
    </div>
    <h2>Tracks</h2>
    <div class="track">
        <div class="tracks">
            <span class="track-number">1</span>
            <div class="track-container">
                <div class="track-left">
                    <span class="track-title">Sustainable Futures:</span>
                    <span class="track-description">Integrating Science and Technology for Environmental Harmony</span>
                </div>
                <div class="track-right">
                    <span class="track-date">12/02/2024</span>
                    <span class="track-room">A</span>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="track">
        <div class="tracks">
            <span class="track-number">2</span>
            <div class="track-container">
                <div class="track-left">
                    <span class="track-title">Frontiers in Biomedical Research:</span>
                    <span class="track-description">Unraveling Mysteries for Healthier Lives</span>
                </div>
                <div class="track-right">
                    <span class="track-date">12/02/2024</span>
                    <span class="track-room">B</span>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <br>
</div>

<?php

include "inc/bot.inc.php";


?>