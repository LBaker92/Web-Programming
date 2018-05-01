// Thank you Paolo Forgia of StackOverflow.
// https://stackoverflow.com/questions/1484506/random-color-generator

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function getRandomEasing() {
    var index = Math.floor(Math.random() * 2);
    switch (index) {
        case 0:
            return "linear";
            break;
        case 1:
            return "swing";
            break;
    }
}

function animate() {
    var color = getRandomColor();
    var easing = getRandomEasing();
    //console.log("Background color = " + color);
    //console.log("Easing = " + easing);
    $('html').animate({
        backgroundColor: color
    },
        5000,
        easing,
        { queue: false }
    );
    $('body').animate({
        backgroundColor: color
    },
        5000,
        easing,
        { queue: false }
    );
}

$(document).ready(function () {
    animate();
    setInterval(animate, 5000);
});