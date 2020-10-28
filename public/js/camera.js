//   activate/deactivate the camera
let camStatus = false;
const buttCam = document.querySelector('#button-cam');
buttCam.onclick = () => { stateCam(); }
const takePic = document.querySelector('#take-picture');
const video = document.querySelector('video');
const canvas = document.querySelector('#canvas');
const context = canvas.getContext('2d');
const width = canvas.width;
const height = canvas.height;
let filtersArray = [];

window.addEventListener('load', () => {
    context.drawImage(document.querySelector('#backCanvas'),0 ,0 , width, height);
});

function stateCam() {
    if (camStatus === false){
        navigator.mediaDevices.getUserMedia({video: true, audio: false})
        .then(function(mediaStream) {
            filtersArray = [];
            video.srcObject = mediaStream;
            video.play();
            camStatus = true;
            buttCam.innerHTML='<img id="rec" src="/camagru/public/pictures/cancel.png">Désactiver caméra';
            buttCam.style.width='175px';
            buttCam.style.paddingLeft="8px";
            setTimeout( () => { takePic.style.display='initial'; }, 1090);
        }) 
        .catch(function(err) {
            console.log(`Error : ${err}`);
        });
    }
    else if (camStatus === true) {
        // context.clearRect(0, 0, width, height);
        const mediaStream = video.srcObject;
        const tracks = mediaStream.getTracks();
        tracks[0].stop();
        camStatus = false;
        buttCam.innerHTML='<img id="rec" src="/camagru/public/pictures/rec.png">Activer caméra';
        buttCam.style.width='180px';
        buttCam.style.paddingLeft="12px";
        takePic.style.display='none';
    }
}

/**********************************************************************************/

takePic.addEventListener('click', () => {
    if (camStatus === true) { // || image
        const mediaStream = video.srcObject;
        const tracks = mediaStream.getTracks();
        tracks[0].stop();
        camStatus = false;
        buttCam.disabled = true;
        buttCam.style.opacity = '0.4';
        buttCam.style.cursor = 'initial';
        document.querySelector('#save-butt').style.display = 'initial';
    }
})

document.querySelector('#save').addEventListener('click', () => {
    if (camStatus === false) {
        const canvasURL = canvas.toDataURL('image/png');
        let pictueID = (Math.floor(Math.random() * 1000000000000)).toString();
        let div = document.createElement('div');
        div.setAttribute('class', 'div-padd-img');
        document.querySelector('#photo-list').appendChild(div);
        let img = document.createElement('img');
        img.setAttribute('src', canvasURL);
        img.setAttribute('id', pictueID);
        img.setAttribute('class', 'aside-image');
        div.appendChild(img);
        buttCam.disabled = false;
        buttCam.style.opacity = 'initial';
        buttCam.style.cursor = 'pointer';
        document.querySelector('#save-butt').style.display = 'none';
        savePict(img);
        stateCam();
    }
})

function savePict(img) {
    let XHR = new XMLHttpRequest();
    let imgData = new FormData();
    imgData.append('imgData', img.currentSrc); // add a key and a value in formData
    XHR.onreadystatechange = () => {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);
        } else { console.log('error'); }
    }
    XHR.open('POST', '../../controller/savePict.php', true);
    XHR.setRequestHeader('Content-Type', 'multipart/form-data');
    XHR.send(imgData);
}

document.querySelector('#delete').addEventListener('click', () => {
    if (camStatus === false) {
        buttCam.disabled = false;
        buttCam.style.opacity = 'initial';
        buttCam.style.cursor = 'pointer';
        document.querySelector('#save-butt').style.display = 'none';
        stateCam();
    }
})

takePic.addEventListener('mouseover', () => {
    takePic.style.backgroundColor='black';
    document.querySelector('#take-photo').src='/camagru/public/pictures/take-photo2.png';
})

takePic.addEventListener('mouseout', () => {
    takePic.style.backgroundColor='#b33939';
    document.querySelector('#take-photo').src='/camagru/public/pictures/take-photo.png';    
})

//   add and remove filter
function add_filter(filterID) {
    if (camStatus === true){
        // Checks if the filter has already been selected
        if ( (filtersArray.find(element => element == filterID)) === undefined ) {
            filtersArray.push(filterID);
        }
        else {
            filtersArray.splice(filtersArray.indexOf(filterID), 1);
        }
    }
}

//   print the flux video and the filter in the canvas
video.addEventListener('canplay', function flux() {
    context.drawImage(video, 0, 0, width, height);
    superimposeFilter();
    setTimeout(flux, 5);
})

//   Superimpose the filter in the canvas
function superimposeFilter() {

    filtersArray.forEach( (filterID) => {
        context.drawImage(document.querySelector('#' + filterID), 0, 0, width, height);
    });
}