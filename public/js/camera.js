//activate the camera
let camStatus = false;
let buttCam = document.querySelector('#camera');
buttCam.onclick = statCam();

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
    // else if (camStatus === true) {
    //     const stream = mediaStream;
    //     const tracks = stream.getTracks();
    //     tracks[0].stop;
    // }
}