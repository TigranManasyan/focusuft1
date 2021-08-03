var img = new Image();
var img2 = new Image();
var img3 = new Image();
var imgBomb = '<img class="image3" src="pictures/bomb.png">';
var score = 0;
var bombCount = 1;
let rabitSrc = 'pictures/rabit.png';

function getCarrotDiv() {
    divIdsec = Math.floor(Math.random() * 29) + 1;
    return divIdsec;
}

function getRabitDiv() {
    divId = Math.floor(Math.random() * 29) + 1;
    return divId;
}

function getBombDiv() {
    divIdBomb = Math.floor(Math.random() * 29) + 1;
    return divIdBomb;
}

divId = getRabitDiv();
divIdsec = getCarrotDiv();
divIdBomb = getBombDiv();

drawCarrot();
let bombsInterval = setInterval(function () {
    let imgArr = document.getElementsByClassName('image3');
    for (let i = 0; i < imgArr.length; i++) {
        imgArr[i].remove();

    }
    getBombDiv();
    if (score >= 100){

        drawBomb(getBombDiv());

    }
    drawBomb(getBombDiv());

}, 2000);
drawBomb();
drawRabbit();

function drawRabbit() {
    let imageCode = '<img id="image1" src="' + rabitSrc + '">';
    img.onload = function () {


        document.getElementById(divId).innerHTML = imageCode;
    };
    img.src = rabitSrc;
    let bombDivsArr = document.getElementsByClassName('image3');
    for (let i = 0; i < bombDivsArr.length; i++) {
        let bombParentDivId = bombDivsArr[i].parentNode.id;
        if (divId == bombParentDivId){
            playAudio('sounds/bomb.mp3')
            playAudio('sounds/looser.mp3')
            clearInterval(bombsInterval)
            document.getElementById('modal').style.display = 'flex'
            document.getElementById('scored').innerText = score
            img.onload = function () {
                document.getElementById(divId).innerHTML = '<img id="image4" src="pictures/boom.png">';



            };
            img.src = 'pictures/boom.png';
        }
    }
  document.getElementById(divId).style = 'hover';
}

function drawCarrot() {
    if (divId == divIdsec || divIdsec == divIdBomb) {
        divIdsec = getCarrotDiv();

    }
    img2.onload = function () {
        document.getElementById(divIdsec).innerHTML = '<img id="image2" src="pictures/carrot.png">';
    }
    img2.src = 'pictures/carrot.jpg';
}

function drawBomb(divIdBomb = getBombDiv()) {
    if (divId == divIdBomb || divIdBomb == divIdsec) {
        divIdBomb = getBombDiv();
    }
    document.getElementById(divIdBomb).innerHTML = imgBomb;

    // img3.onload = function () {
    // }
    // img3.src = 'pictures/bomb.png';

}


function playAudio(url) {
    new Audio(url).play();
}

let started = 0;

document.onkeydown = function (event) {

    started++
    if (started === 1) {
        playAudio('sounds/music.mp3');
    }
    playAudio('sounds/walk.mp3')

    function moveRight() {
        rabit = document.getElementById('image1').remove();


        if (divId % 6 != 0) {
            divId++;
        }
        checkSuccess(divId, divIdsec, divIdBomb)
        drawRabbit()


    }

    function moveLeft() {
        rabit = document.getElementById('image1').remove();


        if ((divId - 1) % 6 != 0) {
            divId--;
        }
        checkSuccess(divId, divIdsec, divIdBomb)
        drawRabbit();


    }

    function moveDown() {
        rabit = document.getElementById('image1').remove();


        if (divId < 25) {
            divId += 6;
        }
        checkSuccess(divId, divIdsec, divIdBomb)
        drawRabbit();

    }

    function moveUp() {
        rabit = document.getElementById('image1').remove();

        if (divId >= 7) {
            divId -= 6;
        }
        checkSuccess(divId, divIdsec, divIdBomb)
        drawRabbit();


    }




    if (event.key == 'ArrowRight') {
        moveRight();
    }
    if (event.key == 'ArrowLeft') {

        moveLeft();
    }
    if (event.key == 'ArrowDown') {
        moveDown();
    }
    if (event.key == 'ArrowUp') {
        moveUp()
    }


}

function checkSuccess(divId, divIdsec, divIdBomb) {
    if (divId == divIdsec) {
        playAudio('sounds/eating.mp3')
        score += 10;
        let count = document.getElementById('count')
        count.innerText = score;
        getCarrotDiv()
        drawCarrot();
    }
    if (divId == divIdBomb) {

        
        let count = document.getElementById('count')
        count.innerText = score;

    }
}



