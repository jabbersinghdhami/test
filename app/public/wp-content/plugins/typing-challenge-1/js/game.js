const targetText = "The quick brown fox jumps over the lazy dog again and again without stopping to rest.";
let startTime;

// Start timing when user focuses on the text area
document.getElementById('userInput').addEventListener('focus', () => {
    startTime = new Date().getTime();
});

// Check if user typed the correct paragraph
document.getElementById('userInput').addEventListener('input', () => {
    const userInput = document.getElementById('userInput').value;

    if (userInput === targetText) {
        const timeTaken = ((new Date().getTime() - startTime) / 1000).toFixed(2); // Time in seconds
        showPopup(timeTaken);
    }
});

// Show popup with result
function showPopup(timeTaken) {
    const popup = document.getElementById('popup');
    const popupHeader = document.getElementById('popupHeader');
    const popupResult = document.getElementById('popupResult');
    const timeTakenElement = document.getElementById('timeTaken');
    
    popup.style.display = 'block';
    setTimeout(() => popup.classList.add('show'), 50);

    timeTakenElement.textContent = `Time Taken: ${timeTaken} seconds`;

    let result = 'lose';
    if (timeTaken <= 30) {
        popupHeader.textContent = 'You Win!';
        popupResult.textContent = 'Congratulations!';
        result = 'win';
    } else {
        popupHeader.textContent = 'You Lose!';
        popupResult.textContent = 'Better luck next time.';
    }

    // Save score via AJAX
    jQuery.post(tc_ajax.ajax_url, {
        action: 'tc_save_score',
        time: timeTaken,
        result: result
    }, function(response) {
        console.log(response);
    });
}

// Retry typing challenge
function retry() {
    const popup = document.getElementById('popup');
    popup.classList.remove('show');
    setTimeout(() => {
        popup.style.display = 'none';
    }, 400);
    document.getElementById('userInput').value = '';
    document.getElementById('userInput').focus();
}
