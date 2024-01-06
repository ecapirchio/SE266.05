<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connections</title>
    <link rel="stylesheet" href="game.css">
</head>
<body>
    <div class="center-container">
        <h1>Create four groups of four!</h1>
        <div class="box-container1">
            <div class="box" onclick="changeColor(this)">Red</div>
            <div class="box" onclick="changeColor(this)">Yellow</div>
            <div class="box" onclick="changeColor(this)">Green</div>
            <div class="box" onclick="changeColor(this)">Blue</div>
        </div>
        <div class="box-container2">
            <div class="box" onclick="changeColor(this)">Hour</div>
            <div class="box" onclick="changeColor(this)">Day</div>
            <div class="box" onclick="changeColor(this)">Month</div>
            <div class="box" onclick="changeColor(this)">Year</div>
        </div>
        <div class="box-container3">
            <div class="box" onclick="changeColor(this)">A</div>
            <div class="box" onclick="changeColor(this)">B</div>
            <div class="box" onclick="changeColor(this)">C</div>
            <div class="box" onclick="changeColor(this)">D</div>
        </div>
        <div class="box-container4">
            <div class="box" onclick="changeColor(this)">One</div>
            <div class="box" onclick="changeColor(this)">Two</div>
            <div class="box" onclick="changeColor(this)">Three</div>
            <div class="box" onclick="changeColor(this)">Four</div>
        </div>
        <div id="tool-buttons">
            <span id="shuffle-button">Shuffle</span>
            <span id="deselect-all-button">Deselect All</span>
            <span id="submit-button" class="inactive">Submit</span>
        </div>
        <div id="results-buttons">
            <span id="results-button">View Results</span>
        </div>
        <div id="snackbar"></div>
        <button onclick="handleEnter()">Enter</button>
    </div>
    <script src="game.js"></script>
</body>
</html>