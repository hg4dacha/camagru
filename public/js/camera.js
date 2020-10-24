//   activate/deactivate the camera
let camStatus = false;
const buttCam = document.querySelector('#buttCam');
buttCam.onclick = () => { statCam(); }
const video = document.querySelector('video');

const canvas = document.querySelector('#canvas');
const context = canvas.getContext('2d');
const width = canvas.width;
const height = canvas.height;


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
        const mediaStream = video.srcObject;
        const tracks = mediaStream.getTracks();
        tracks[0].stop();
        // context.clearRect(0, 0, width, height);
        camStatus = false;
        buttCam.innerHTML='Activer la caméra';
    }
}

//   canvas
video.addEventListener('canplay', function flux() {
    context.drawImage(video, 0, 0, width, height);
    setTimeout(flux, 1);
})