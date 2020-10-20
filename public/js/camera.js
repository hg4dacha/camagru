//activate the camera
let camStatus = false;
let $camera = document.querySelector('camera');
$camera.onclick = statCam();

function statCam() {
    
    if (camStatus === false){
        navigator.mediaDevices.getUserMedia({video: true, audio: false})
            .then(function(mediaStream) {
                video.srcObject = mediaStream;
                video.play();
                camStatus = true;
                $camera.innerHTML="Désactiver la caméra"
            })
            .catch(function(err) {
                console.log(`Error : ${err}`);
            });
    }
    else (camStatus === true) {
        
    }
}