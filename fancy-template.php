<?php
/*
Template Name: Vogue Contact Special
*/
get_header();
?>

<main class="vogue-contact-template">
    <div class="content-area">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <article class="post page">
                    <h2><?php the_title(); ?></h2>
                    <div class="page-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile;
        else :
            echo '<p>No content found</p>';
        endif;
        ?>
    </div>

    <!-- Sidebar Info Boxes -->
    <aside class="info-boxes">

        <br><br>

        <!-- Headquarters Info -->
        <div class="info-box" id="hq-info">
            <h3>Headquarters</h3>
            <p id="hq-address"></p>
        </div>

        <!-- Office Vibe -->
        <div class="info-box" id="office-vibe">
            <h3>Office Vibe</h3>
            <p id="weather">Loading weather...</p>
        </div>

        <!-- Countdown Timer -->
        <div class="info-box" id="countdown-box">
            <h3>Next Fashion Show</h3>
            <p id="countdown"></p>
        </div>
         <!-- Countdown Timer -->
        <div class="info-box" id="hq-infol">
            <h3>Next Fashion Show Location</h3>
            <p id="hq-location"></p>
        </div>

    </aside>
</main>

<?php get_footer(); ?>

<!-- JS Effects -->
<script>
// 1. Headquarters Info (Fade in letter by letter)
const addressText = "One World Trade Center, New York, NY 10007";
const hqAddressEl = document.getElementById("hq-address");
let i1 = 0;
function typeAddress() {
    if (i1 < addressText.length) {
        hqAddressEl.innerHTML += addressText.charAt(i1);
        i1++;
        setTimeout(typeAddress, 100);
    }
}
typeAddress();

// 2. Office Vibe (Weather API Example - static fallback)
async function loadWeather() {
    try {
        // Example using free API (replace with real key if you want)
        let response = await fetch("https://api.open-meteo.com/v1/forecast?latitude=40.7128&longitude=-74.0060&current_weather=true");
        let data = await response.json();
        let temp = data.current_weather.temperature;
        document.getElementById("weather").innerText = "New York 🌇 " + temp + "°C";
    } catch {
        document.getElementById("weather").innerText = "New York 🌇 22°C";
    }
}
loadWeather();

// 3. Countdown Timer
const fashionShowDate = new Date("December 1, 2025 18:00:00").getTime();
const countdownEl = document.getElementById("countdown");

function updateCountdown() {
    const now = new Date().getTime();
    const distance = fashionShowDate - now;

    if (distance < 0) {
        countdownEl.innerText = "Fashion show is live!";
        return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    countdownEl.innerText = `${days}d ${hours}h ${minutes}m ${seconds}s`;
}
setInterval(updateCountdown, 1000);



// 4. Location Of Fashion Show
const locationText = "Tokyo, Japan";
const hqLocationEl = document.getElementById("hq-location");
let i2 = 0;
function typeLocation() {
    if (i2 < locationText.length) {
        hqLocationEl.innerHTML += locationText.charAt(i2);
        i2++;
        setTimeout(typeLocation, 100);
    }
}
typeLocation();
</script>

<!-- Basic Styling -->
<style>
.vogue-contact-template {
    display: flex;
    gap: 40px;
    max-width: 1200px;
    margin: 50px auto;
    padding: 0 20px;
}
.content-area {
    flex: 2;
}
.info-boxes {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 20px;
}
.info-box {
    background: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
}
.info-box h3 {
    margin-bottom: 10px;
    font-size: 24px;
    color: #111;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.info-box p {
    font-size: 20px;
    color: #c00;
}
</style>
