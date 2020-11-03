//   DOM elements
let camStatus = false;
const buttCam = document.querySelector('#button-cam');
buttCam.onclick = () => { stateCam(); }
let importStatus = false;
const buttImportLabel = document.querySelector('#downl-file');
const buttImport = document.querySelector('#imprt-inpt');
const takePic = document.querySelector('#take-picture');
const video = document.querySelector('video');
const canvas = document.querySelector('#canvas');
const context = canvas.getContext('2d');
const width = canvas.width;
const height = canvas.height;
let filtersArray = [];

//   base canvas image
window.addEventListener('load', () => {
    context.drawImage(document.querySelector('#backCanvas'),0 ,0 , width, height);
});

//   activate or deactivate the camera
function stateCam() {
    if (camStatus === false){
        navigator.mediaDevices.getUserMedia({video: true, audio: false})
        .then(function(mediaStream) {
            filtersArray = [];
            video.srcObject = mediaStream;
            video.play();
            camStatus = true;
            buttImport.disabled = true;
            buttImportLabel.style.opacity = '0.4';
            buttImportLabel.style.cursor = 'initial';
            buttCam.innerHTML='<img id="rec" src="/camagru/public/pictures/cancel.png">Désactiv. caméra';
            buttCam.style.border='2px #EA2027 solid';
            setTimeout( () => { takePic.style.display='initial'; }, 1500);
            if (screen.width > 1100) {
                setTimeout( () => { document.querySelector('#buttons-div').style.marginRight='-136px'; }, 1500);
            }
        }) 
        .catch(function(err) {
            console.log(`Error : ${err}`);
        });
    }
    else if (camStatus === true) {
        const mediaStream = video.srcObject;
        const tracks = mediaStream.getTracks();
        tracks[0].stop();
        video.srcObject = null;
        context.clearRect(0, 0, width, height);
        context.drawImage(document.querySelector('#backCanvas'), 0, 0, width, height);
        camStatus = false;
        buttImport.disabled = false;
        buttImportLabel.style.opacity = 'initial';
        buttImportLabel.style.cursor = 'pointer';
        buttCam.innerHTML='<img id="rec" src="/camagru/public/pictures/rec.png">Activer caméra';
        buttCam.style.border='initial';
        takePic.style.display='none';
        if (screen.width >= 950) {
            document.querySelector('#buttons-div').style.marginRight='-220px';
        }
    }
}

buttImportLabel.addEventListener('click', () => {
    if (importStatus === false) {
        buttImport.addEventListener('change', () => {
            let format = buttImport.files[0].type;
            if (format == 'image/jpeg' || format == 'image/png' || format == 'image/gif') {
                importStatus = true;
                let uploadImg = new Image;
                uploadImg.src = URL.createObjectURL(buttImport.files[0]);
                context.clearRect(0, 0, width, height);
                uploadImg.onload = () => { context.drawImage(uploadImg, 0, 0, width, height) };
                buttCam.disabled = true;
                buttCam.style.opacity = '0.4';
                buttCam.style.cursor = 'initial';
                buttImportLabel.innerHTML='<img id="import" src="/camagru/public/pictures/deleting.png">Annuler import.';
                buttImportLabel.style.border='2px #EA2027 solid';
                buttImport.type='';
                setTimeout( () => { takePic.style.display='initial'; }, 1500);
                if (screen.width > 1100) {
                    setTimeout( () => { document.querySelector('#buttons-div').style.marginRight='-136px'; }, 1500);
                }
            }
            else {
                alert('Seul les formats [.jpeg/jpg], [.png] et [.gif] sont acceptés !');
            } });
    }
    else if (importStatus === true) {
        importStatus = false;
        buttCam.disabled = false;
        buttCam.style.opacity = 'initial';
        buttCam.style.cursor = 'pointer';
        buttImportLabel.innerHTML='<img id="import" src="/camagru/public/pictures/import.png">Importer image';
        buttImportLabel.style.border='initial';
        takePic.style.display='none';
        context.clearRect(0, 0, width, height);
        context.drawImage(document.querySelector('#backCanvas'), 0, 0, width, height);
        setTimeout( () => { buttImport.type='file' }, 50); //   Otherwise the file download window reopens
        if (screen.width >= 950) {
            document.querySelector('#buttons-div').style.marginRight='-220px';
        }
    }
});

/**********************************************************************************/

takePic.addEventListener('click', () => {
    if (camStatus === true || importStatus === true) {
            if (camStatus === true) {
            const mediaStream = video.srcObject;
            const tracks = mediaStream.getTracks();
            tracks[0].stop();
            camStatus = false;
        }
        takePic.style.display = 'none';
        buttCam.disabled = true;
        buttCam.style.opacity = '0.4';
        buttCam.style.cursor = 'initial';
        buttImport.disabled = true;
        buttImportLabel.style.opacity = '0.4';
        buttImportLabel.style.cursor = 'initial';
        document.querySelector('#save-butt').style.display = 'initial';
        if (screen.width > 1100) {
        document.querySelector('#buttons-div').style.marginRight='-220px';
        }
    }
})

document.querySelector('#save').addEventListener('click', () => {
    if (camStatus === false) {
        const canvasURL = canvas.toDataURL('image/jpeg');
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
        document.querySelector('#aside-msg').style.display = 'none';
        savePict(img);
        stateCam();
    }
})

function savePict(img) {
    let imgData = new FormData();
    // add a key and a value in formData
    imgData.append('imgData', img.src);
    imgData.append('imgID', img.id);
    let XHR = new XMLHttpRequest();
    XHR.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText); }
        };
    XHR.open('POST', '../controller/save_picture.php', true);
    XHR.send(imgData);
}

document.querySelector('#delete').addEventListener('click', () => {
    if (camStatus === false) {
        buttCam.disabled = false;
        buttCam.style.opacity = 'initial';
        buttCam.style.cursor = 'pointer';
        buttImport.disabled = false;
        buttImportLabel.style.opacity = 'initial';
        buttImportLabel.style.cursor = 'pointer';
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