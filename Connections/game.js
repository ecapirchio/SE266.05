function changeColor(element) {
    var currentColor = element.style.backgroundColor || getComputedStyle(element).backgroundColor;

    if (currentColor === "rgb(0, 0, 255)" || currentColor === "#0000ff") {
        element.style.backgroundColor = "";
    } else {
        element.style.backgroundColor = "#0000ff"; // Set to blue color
    }
}

function handleEnter() {
    var boxContainer1 = document.querySelector(".box-container1");
    var boxContainer2 = document.querySelector(".box-container2");

    var initialBoxes1 = Array.from(boxContainer1.children);
    var initialBoxes2 = Array.from(boxContainer2.children);

    var allBlue1 = initialBoxes1.every(function(box) {
        return box.style.backgroundColor === "rgb(52, 152, 219)" || box.style.backgroundColor === "#3498db";
    });

    var allBlue2 = initialBoxes2.every(function(box) {
        return box.style.backgroundColor === "rgb(52, 152, 219)" || box.style.backgroundColor === "#3498db";
    });

    if (allBlue1 && initialBoxes1.length === 4) {
        alert("Congratulations! You have four blue boxes in box-container1.");

        // Change the color of the blue boxes in box-container1 to green and disable further clicks
        initialBoxes1.forEach(function(box) {
            box.style.backgroundColor = "#00ff00";
            box.onclick = null;
        });
    } else if (allBlue2 && initialBoxes2.length === 4) {
        alert("Congratulations! You have four blue boxes in box-container2.");

        // Change the color of the blue boxes in box-container2 to green and disable further clicks
        initialBoxes2.forEach(function(box) {
            box.style.backgroundColor = "#00ff00";
            box.onclick = null;
        });
    } else {
        alert("Please make sure you have four blue boxes in either box-container1 or box-container2.");
    }
}function handleEnter() {
    var boxContainer1 = document.querySelector(".box-container1");
    var boxContainer2 = document.querySelector(".box-container2");
    var boxContainer3 = document.querySelector(".box-container3");
    var boxContainer4 = document.querySelector(".box-container4");

    var initialBoxes1 = Array.from(boxContainer1.children);
    var initialBoxes2 = Array.from(boxContainer2.children);
    var initialBoxes3 = Array.from(boxContainer3.children);
    var initialBoxes4 = Array.from(boxContainer4.children);

    var allBlue1 = initialBoxes1.every(function(box) {
        return box.style.backgroundColor === "rgb(0, 0, 255)" || box.style.backgroundColor === "#0000ff";
    });

    var allBlue2 = initialBoxes2.every(function(box) {
        return box.style.backgroundColor === "rgb(0, 0, 255)" || box.style.backgroundColor === "#0000ff";
    });

    var allBlue3 = initialBoxes3.every(function(box) {
        return box.style.backgroundColor === "rgb(0, 0, 255)" || box.style.backgroundColor === "#0000ff";
    });

    var allBlue4 = initialBoxes4.every(function(box) {
        return box.style.backgroundColor === "rgb(0, 0, 255)" || box.style.backgroundColor === "#0000ff";
    });

    if (allBlue1 && initialBoxes1.length === 4) {
        alert("Congratulations! You have four blue boxes in box-container1.");

        // Change the color of the blue boxes in box-container1 to green and disable further clicks
        initialBoxes1.forEach(function(box) {
            box.style.backgroundColor = "#00ff00";
            box.onclick = null;
        });
    } else if (allBlue2 && initialBoxes2.length === 4) {
        alert("Congratulations! You have four blue boxes in box-container2.");

        // Change the color of the blue boxes in box-container2 to green and disable further clicks
        initialBoxes2.forEach(function(box) {
            box.style.backgroundColor = "#00ff00";
            box.onclick = null;
        });
    } else if (allBlue3 && initialBoxes3.length === 4) {
        alert("Congratulations! You have four blue boxes in box-container3.");

        // Change the color of the blue boxes in box-container3 to green and disable further clicks
        initialBoxes3.forEach(function(box) {
            box.style.backgroundColor = "#00ff00";
            box.onclick = null;
        });
    
    } else if (allBlue4 && initialBoxes4.length === 4) {
        alert("Congratulations! You have four blue boxes in box-container4.");

        // Change the color of the blue boxes in box-container4 to green and disable further clicks
        initialBoxes4.forEach(function(box) {
            box.style.backgroundColor = "#00ff00";
            box.onclick = null;
        });
    
    } else {
        alert("Please make sure you have four blue boxes in either box-container1 or box-container2 or box-container3 or box-container4.");
    }
}