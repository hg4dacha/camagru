//   activate/deactivate the camera
let camStatus = false;
const buttCam = document.querySelector('#buttCam');
buttCam.onclick = () => { statCam(); }
const video = document.querySelector('video');

const canvas = document.querySelector('#canvas');
const context = canvas.getContext('2d');
const width = canvas.width;
const height = canvas.height;
let filtersArray = [];


function statCam() {

    if (camStatus === false){
        navigator.mediaDevices.getUserMedia({video: true, audio: false})
            .then(function(mediaStream) {
                video.srcObject = mediaStream;
                video.play();
                camStatus = true;
                buttCam.innerHTML='Désactiver la caméra';
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
        buttCam.innerHTML='Activer la caméra';
    }
}

//   add and remove filter
function add_filter(filterID) {
    if ( (filtersArray.find(element => element == filterID)) === undefined ) {
        filtersArray.push(filterID);
    }
    else {
        filtersArray.splice(filtersArray.indexOf(filterID), 1);
    }
}

//   Superimpose the filter in the canvas
function superimposeFilter() {

    filtersArray.forEach( (filterID) => {
        console.log(filterID);
        context.drawImage(document.querySelector('#' + filterID), 0, 0, width, height);
    });
}

//   print the flux video and the filter in the canvas
video.addEventListener('canplay', function flux() {
    context.drawImage(video, 0, 0, width, height);
    superimposeFilter();
    setTimeout(flux, 1);
})
