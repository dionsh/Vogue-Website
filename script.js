
document.addEventListener("DOMContentLoaded", function() {
    const numberElement = document.getElementById("model-number");
    const finalNumber = 300;  // The max number
    const flickDuration = 2000; // duration of flick in milliseconds
    const intervalTime = 50;   // time between flicks

    let elapsed = 0;
    const flickInterval = setInterval(() => {
        // Show a random number while flicking
        const randomNum = Math.floor(Math.random() * finalNumber) + 1;
        numberElement.textContent = randomNum;

        elapsed += intervalTime;

        // Slowly change color for a flicker effect
        numberElement.style.color = `rgb(${Math.floor(Math.random()*255)},0,0)`;

        if (elapsed >= flickDuration) {
            clearInterval(flickInterval);
            numberElement.textContent = finalNumber; // stop at final number
            numberElement.style.color = "#c00"; // final color
        }
    }, intervalTime);
});

