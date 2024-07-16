// Display current date
function displayCurrentDate() {
    var currentDateElement = document.getElementById('currentDate');
    
    var currentDate = new Date();
    
    var date = currentDate.getDate();
    var month = currentDate.getMonth() + 1; // Months are zero-based
    var year = currentDate.getFullYear();
    
    var currentDateLine = date + "/" + month + "/" + year;
    
    currentDateElement.textContent = currentDateLine;
}

window.onload = displayCurrentDate;


function displayOutput() {
    var outputElement = document.getElementById('total');
    
    // Get the selected radio button value
    var selectedOption = document.querySelector('input[name="package"]:checked').value;
    
    // Display different output based on the selected option
    if (selectedOption === 'Option 1') {
        outputElement.textContent = '$50';
    } else if (selectedOption === 'Option 2') {
        outputElement.textContent = '$100';
    } else if (selectedOption === 'Option 3') {
        outputElement.textContent = '$250';
    }else if (selectedOption === 'Option 4') {
        outputElement.textContent = '$350';
    }else if (selectedOption === 'Option 5') {
        outputElement.textContent = '$500';
    }

}

// Call the function to display the output when a radio button is clicked
document.querySelectorAll('input[name="package"]').forEach(function(radio) {
    radio.addEventListener('click', displayOutput);
});

var radioButtons = document.querySelectorAll('input[name="method"]');
var image = document.getElementById('paymeth');
        
radioButtons.forEach(function(radioButton) {
    radioButton.addEventListener('change', function() {

    if (this.checked) {
        image.src = this.value;
                }
        });
});