<link rel="stylesheet" href="copy.css">
<div id="game">
    <div id="top-text">
        <div id="game prompt-text">Create four groups of four!</div>
    </div>
    <div class="flex-grid" id="board">
        <div id="row-0">
            <div class="item item-row-0 item-col-0" id="item-0" style="font-size: 16px;">RED</div>
            <div class="item item-row-0 item-col-1" id="item-1" style="font-size: 16px;">YELLOW</div>
            <div class="item item-row-0 item-col-2" id="item-2" style="font-size: 16px;">GREEN</div>
            <div class="item item-row-0 item-col-3" id="item-3" style="font-size: 16px;">BLUE</div>
        </div>
        <div id="row-1">
            <div class="item item-row-1 item-col-0" id="item-4" style="font-size: 16px;">HOUR</div>
            <div class="item item-row-1 item-col-1" id="item-5" style="font-size: 16px;">DAY</div>
            <div class="item item-row-1 item-col-2" id="item-6" style="font-size: 16px;">MONTH</div>
            <div class="item item-row-1 item-col-3" id="item-7" style="font-size: 16px;">YEAR</div>
        </div>
        <div id="row-2">
            <div class="item item-row-2 item-col-0" id="item-8" style="font-size: 16px;">A</div>
            <div class="item item-row-2 item-col-1" id="item-9" style="font-size: 16px;">B</div>
            <div class="item item-row-2 item-col-2" id="item-10" style="font-size: 16px;">C</div>
            <div class="item item-row-2 item-col-3" id="item-11" style="font-size: 16px;">D</div>
        </div>
        <div id="row-3">
            <div class="item item-row-3 item-col-0" id="item-12" style="font-size: 16px;">ONE</div>
            <div class="item item-row-3 item-col-1" id="item-13" style="font-size: 16px;">TWO</div>
            <div class="item item-row-3 item-col-2" id="item-14" style="font-size: 16px;">THREE</div>
            <div class="item item-row-3 item-col-3" id="item-15" style="font-size: 16px;">FOUR</div>
        </div>
    </div>
    <div id="attempts-remaining-text" style="display: flex;">
        <span id="text-label-attempts-remaining">Mistakes remaining:</span>
        <span id="attempts-remaining-bubbles">
            <span id="bubble-0" class="bubble"></span>
            <span id="bubble-1" class="bubble lost"></span>
            <span id="bubble-2" class="bubble lost"></span>
            <span id="bubble-3" class="bubble lost"></span>
        </span>
    </div>
    <div id="tool-buttons">
        <span id="shuffle-button">Shuffle</span>
        <span id="deselect-all-button">Deselect All</span>
        <span id="submit-button" class="inactive">Submit</span>
    </div>
    <script>
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
                    this.classList.toggle("selected-item");
    
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
    
            // Select the shuffle button
            var shuffleButton = document.getElementById("shuffle-button");
    
            // Add click event listener to the shuffle button
            shuffleButton.addEventListener("click", function () {
                // Iterate through each row and shuffle the items
                var rows = document.querySelectorAll(".flex-grid > div");
                rows.forEach(function (row) {
                    var itemsInRow = Array.from(row.children);
                    itemsInRow.sort(function () {
                        return 0.5 - Math.random();
                    });
                    row.innerHTML = "";
                    itemsInRow.forEach(function (item) {
                        row.appendChild(item);
                    });
                });
    
                // Deselect all items
                items.forEach(function (item) {
                    item.classList.remove("selected");
                    item.classList.remove("selected-item");
                });
    
                // Deactivate the submit button
                submitButton.classList.add("inactive");
            });
    
            // Select the deselect all button
            var deselectAllButton = document.getElementById("deselect-all-button");
    
            // Add click event listener to the deselect all button
            deselectAllButton.addEventListener("click", function () {
                // Deselect all items
                items.forEach(function (item) {
                    item.classList.remove("selected");
                    item.classList.remove("selected-item");
                });
    
                // Deactivate the submit button
                submitButton.classList.add("inactive");
            });
    
            // Select the submit button
            var submitButton = document.getElementById("submit-button");
    
            // Add click event listener to the submit button
            submitButton.addEventListener("click", function () {
                // Call the function to check the selected items against the answer key
                checkAnswer();
            });
    
            // Function to check the selected items against the answer key
            function checkAnswer() {
                var selectedItems = document.querySelectorAll(".item.selected-item");
    
                // Extract text content of selected items
                var selectedValues = Array.from(selectedItems).map(function (item) {
                    return item.textContent.trim().toUpperCase();
                });
    
                // Define the answer key
                var answerKey = {
                    connection1: ['RED', 'YELLOW', 'GREEN', 'BLUE'],
                    connection2: ['HOUR', 'DAY', 'MONTH', 'YEAR'],
                    connection3: ['A', 'B', 'C', 'D'],
                    connection4: ['ONE', 'TWO', 'THREE', 'FOUR']
                };
    
                // Check if the selected items match any of the connections in the answer key
                for (var connection in answerKey) {
                    var correctConnection = answerKey[connection].every(function (item) {
                        return selectedValues.includes(item);
                    });
    
                    if (correctConnection) {
                        alert('You matched ' + connection + '!');

                        // Deselect all items
                        items.forEach(function (item) {
                            item.classList.remove("selected");
                            item.classList.remove("selected-item");
                        });

                        // Hide the correct connection items
                        var boardItems = document.querySelectorAll('.item');
                        boardItems.forEach(function (boardItem) {
                            var boardItemText = boardItem.textContent.trim().toUpperCase();
                            if (answerKey[connection].includes(boardItemText)) {
                                boardItem.style.display = 'none';
                            }
                        });

                        // Check if all board items are gone
                        var remainingItems = document.querySelectorAll('.item:not([style*="display: none"])');
                        if (remainingItems.length === 0) {
                            // If all items are gone, navigate to the win.php page
                            window.location.href = 'win.php';
                        }

                        // Deactivate the submit button
                        submitButton.classList.add("inactive");

                    }
                }
            }
        });
    </script>    

</div>