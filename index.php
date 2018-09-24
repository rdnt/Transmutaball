<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link href="/css/main.css?t=<?=date("U")?>" type="text/css" rel="stylesheet" media="screen"/>
<title>Football</title>
</head>
<body>
    <div class="pitch">
        <div class="c center"></div>
        <div class="c left"></div>
        <div class="c right"></div>
        <div class="p left"></div>
        <div class="p right"></div>
        <div class="p-bg left"></div>
        <div class="p-bg right"></div>
        <div class="g left"></div>
        <div class="g right"></div>
        <div class="m center"></div>
        <div class="m left"></div>
        <div class="m right"></div>
        <div class="hw"></div>
        <div class="area"></div>
        <div class="area-shadow"></div>
        <div class="area"></div>
        <div class="area-shadow"></div>
        <div class="area"></div>
        <div class="area-shadow"></div>
        <div class="area"></div>
        <div class="area-shadow"></div>
        <div class="area"></div>
        <div class="area-shadow"></div>
        <div class="area"></div>
        <div class="area-shadow"></div>

        <div class="area"></div>
        <div class="area-shadow"></div>
        <div class="area"></div>
        <div class="area-shadow"></div>
        <div class="area"></div>
        <div class="area-shadow"></div>
        <div class="area"></div>
        <div class="area-shadow"></div>
        <div class="area"></div>
        <div class="area-shadow"></div>
        <div class="area"></div>
        <div class="area-shadow"></div>
        <b id="ball"></b>
        <p id="player"></p>
    </div>
<script>
var player = {};
player.el = document.getElementById("player");
player.x = 0;
player.y = 0;
player.step = 1;

var ball = {};
ball.el = document.getElementById("ball");
ball.x = 0;
ball.y = 0;

var keys = {};

this.interval = setInterval(updateGame, 10);

function updateGame() {
    if (keys[16]) {
        player.step = 1.5;
    }
    else {
        player.step = 1;
    }
    if (keys[87]) {
        player.y = player.y - player.step;
    }
    if (keys[65]) {
        player.x = player.x - player.step;
    }
    if (keys[83]) {
        player.y = player.y + player.step;
    }
    if (keys[68]) {
        player.x = player.x + player.step;
    }
    //console.log(player.x + " " + player.y);

    var disX = player.x - ball.x;
    var disY = player.y - ball.y;

    var distance = Math.sqrt( disX*disX + disY*disY );
    //console.log(distance);
    if (distance <= 8) {
        kickBall();
    }
    movePlayer();
    moveBall();
}

function kickBall() {
    var min = -100;
    var max = +100;
    var randX = Math.random() * (max - min) + min;
    var randY = Math.random() * (max - min) + min;
    ball.x += randX;
    ball.y += randY;
}

document.onkeydown = function(e) {
    keys[e.which] = true;
};

document.onkeyup = function(e) {
    delete keys[e.which];
};

function movePlayer() {
    player.el.style.transform = "perspective(20px) translate(" + player.x + "px," + player.y + "px)";
}

function moveBall() {
    ball.el.style.transform = "perspective(20px) translate(" + ball.x + "px," + ball.y + "px)";
}

var areas = Array.from(document.querySelectorAll('.area'));
areas.forEach((element, index) => {
    setTimeout(function() {
        areas[index].classList.add("pulse");
    }, 100 * index);
});




</script>

</body>
</html>
