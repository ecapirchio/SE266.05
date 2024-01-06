document.addEventListener("DOMContentLoaded", function () {
    // Select all item elements
    var items = document.querySelectorAll(".item");

    // Select the submit button
    var submitButton = document.getElementById("submit-button");
    
    // Add click event listeners to each item
    items.forEach(function (item) {
        item.addEventListener("click", function () {
            // Toggle the selected class on click
            this.classList.toggle("selected");

            // Check the number of selected items
            var selectedItems = document.querySelectorAll(".item.selected");
             
            // If exactly four items are selected, activate the submit button
            if (selectedItems.length === 4) {
                submitButton.classList.remove("inactive");
            } else {
                submitButton.classList.add("inactive");
            }
        });
    });
});