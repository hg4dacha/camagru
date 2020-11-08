/* --- DOM elements --- */
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
let interval;
let uploadImg;

// base canvas image
window.addEventListener('load', () => {
    context.drawImage(document.querySelector('#backCanvas'),0 ,0 , width, height);
});

/* --- activate or deactivate the camera --- */
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
            // To avoid instant deactivation, otherwise the "take-picture" button will be activated anyway.
            buttCam.disabled = true;
            buttCam.style.opacity = '0.4';
            buttCam.style.cursor = 'initial';
            setTimeout( () => {
                buttCam.disabled = false;
                buttCam.style.opacity = 'initial';
                buttCam.style.cursor = 'pointer';
                takePic.style.display='initial';
                takePic.disabled = true;
                takePic.style.opacity = '0.4';
                takePic.style.cursor = 'initial'; }, 200);
                passB = 0; // So that the paragraph "#select-filter" can be redisplayed if the button is disabled and no filter has been selected
            if (screen.width > 1100) {
                setTimeout( () => { document.querySelector('#buttons-div').style.marginRight='-136px'; }, 200);
            }
        })
        .catch(function(err) {
            console.log(`Error : ${err}`);
        });
    }
    else if (camStatus === true) {
        clearTimeout(fluxTimeOut);
        const mediaStream = video.srcObject;
        const tracks = mediaStream.getTracks();
        tracks[0].stop();
        video.srcObject = null;
        filtersArray = [];
        context.clearRect(0, 0, width, height);
        context.drawImage(document.querySelector('#backCanvas'), 0, 0, width, height);
        camStatus = false;
        buttImport.disabled = false;
        buttImportLabel.style.opacity = 'initial';
        buttImportLabel.style.cursor = 'pointer';
        buttCam.innerHTML='<img id="rec" src="/camagru/public/pictures/rec.png">Activer caméra';
        buttCam.style.border='initial';
        takePic.style.display='none';
        document.querySelector('#select-filter').style.display='none';
        if (screen.width >= 950) {
            document.querySelector('#buttons-div').style.marginRight='-220px';
        }
    }
}

/* --- import an image --- */
buttImportLabel.addEventListener('click', () => {
    if (importStatus === false) {
        buttImport.addEventListener('change', () => {
            let format = buttImport.files[0].type;
            if (format == 'image/jpeg' || format == 'image/png' || format == 'image/gif') {
                importStatus = true;
                uploadImg = new Image;
                uploadImg.src = URL.createObjectURL(buttImport.files[0]);
                context.clearRect(0, 0, width, height);
                context.drawImage(uploadImg, 0, 0, width, height);
                interval = setInterval( () => {
                    context.drawImage(uploadImg, 0, 0, width, height);
                    superimposeFilter(); }, 5);
                buttCam.disabled = true;
                buttCam.style.opacity = '0.4';
                buttCam.style.cursor = 'initial';
                buttImportLabel.innerHTML='<img id="import" src="/camagru/public/pictures/deleting.png">Annuler import.';
                buttImportLabel.style.border='2px #EA2027 solid';
                buttImport.type='';
                setTimeout( () => {
                    takePic.style.display='initial';
                    takePic.disabled = true;
                    takePic.style.opacity = '0.4';
                    takePic.style.cursor = 'initial'; }, 100);
                passB = 0;
                if (screen.width > 1100) {
                    setTimeout( () => { document.querySelector('#buttons-div').style.marginRight='-136px'; }, 100);
                }
            }
            else {
                alert('Seul les formats [.jpeg/jpg], [.png] et [.gif] sont acceptés !');
            } });
    }
    else if (importStatus === true) {
        importStatus = false;
        clearInterval(interval);
        buttImport.value = '';
        filtersArray = [];
        context.clearRect(0, 0, width, height);
        context.drawImage(document.querySelector('#backCanvas'), 0, 0, width, height);
        buttCam.disabled = false;
        buttCam.style.opacity = 'initial';
        buttCam.style.cursor = 'pointer';
        buttImportLabel.innerHTML='<img id="import" src="/camagru/public/pictures/import.png">Importer image';
        buttImportLabel.style.border='initial';
        takePic.style.display='none';
        document.querySelector('#select-filter').style.display = 'none';
        setTimeout( () => { buttImport.type='file'; }, 50); // Otherwise the file download window reopens
        if (screen.width >= 950) {
            document.querySelector('#buttons-div').style.marginRight='-220px';
        }
    }
});


takePic.addEventListener('click', () => {
    if (camStatus === true || importStatus === true) {
        if (camStatus === true && importStatus === false) {
            const mediaStream = video.srcObject;
            const tracks = mediaStream.getTracks();
            tracks[0].stop();
            clearTimeout(fluxTimeOut);
        }
        else if (importStatus === true && camStatus === false) {
            clearInterval(interval);
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

/* --- saving the picture, then processing it in the "back" --- */
document.querySelector('#save').addEventListener('click', () => {
    if (camStatus === true || importStatus === true) {
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
        document.querySelector('#save-butt').style.display = 'none';
        document.querySelector('#aside-msg').style.display = 'none';
        savePict(img);
        if (camStatus === true) {
            camStatus = false;
            stateCam();
        }
        else if (importStatus === true) {
            importStatus = false;
            filtersArray = [];
            context.clearRect(0, 0, width, height);            
            context.drawImage(document.querySelector('#backCanvas'), 0, 0, width, height);
            buttCam.disabled = false;
            buttCam.style.opacity = 'initial';
            buttCam.style.cursor = 'pointer';
            buttImportLabel.innerHTML='<img id="import" src="/camagru/public/pictures/import.png">Importer image';
            buttImportLabel.style.border='initial';
            buttImportLabel.style.opacity = 'initial';
            buttImportLabel.style.cursor = 'pointer';
            buttImport.disabled = false;
            buttImport.type='file';
        }
    }
})

function savePict(img) {
    let imgData = new FormData();
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

/* --- Cancel photo capture --- */
document.querySelector('#delete').addEventListener('click', () => {
    if (camStatus === true && importStatus === false) {
        camStatus = false;
        stateCam();
    }
    else if (importStatus === true && camStatus === false) {
        buttImport.disabled = false;
        buttImportLabel.style.opacity = 'initial';
        buttImportLabel.style.cursor = 'pointer';
        setTimeout( () => { takePic.style.display='initial'; }, 100);
        if (screen.width > 1100) {
            setTimeout( () => { document.querySelector('#buttons-div').style.marginRight='-136px'; }, 100);
        }
        filtersArray = [];
        context.clearRect(0, 0, width, height);
        context.drawImage(uploadImg, 0, 0, width, height);
        interval = setInterval( () => {
            context.drawImage(uploadImg, 0, 0, width, height);
            superimposeFilter(); }, 5);
    }
    document.querySelector('#save-butt').style.display = 'none';
})

/* --- add and remove filter --- */
function add_filter(filterID) {
    if (camStatus === true || importStatus === true){
        // Checks if the filter has already been selected
        if ( (filtersArray.find(element => element == filterID)) === undefined ) {
            filtersArray.push(filterID);
        }
        else {
            filtersArray.splice(filtersArray.indexOf(filterID), 1);
        }
    }
}

let fluxTimeOut;
/* --- print the flux video and the filter in the canvas --- */
video.addEventListener('canplay', function flux() {
    context.drawImage(video, 0, 0, width, height);
    superimposeFilter();
    fluxTimeOut = setTimeout(flux, 5);
})







let passA;
let passB = 0;
/* This function is used to avoid unnecessary repetition of the style change of
   the "takePic" button in the "SuperimposeFilter" function. */
function styleOfTakePic() {
    if (filtersArray.length == 0) {
        passA = 1;
    }
    else if (filtersArray.length > 0) {
        passA = 0;
    }
}

function overMouse() {
    takePic.style.backgroundColor='black';
    document.querySelector('#take-photo').src='/camagru/public/pictures/take-photo2.png';
}

function outMouse() {
    takePic.style.backgroundColor='#b33939';
    document.querySelector('#take-photo').src='/camagru/public/pictures/take-photo.png';
}

/* --- Superimpose the filter in the canvas --- */
function superimposeFilter() {
    styleOfTakePic();
    if (passA === 1 && passB === 0) {
        takePic.disabled = true;
        takePic.style.opacity = '0.4';
        takePic.style.cursor = 'initial';
        document.querySelector('#select-filter').style.display = 'initial';
        takePic.removeEventListener('mouseover', overMouse);
        takePic.removeEventListener('mouseout', outMouse);
        passB = 1;
    }
    else if (passA === 0 && passB === 1) {
        takePic.disabled = false;
        takePic.style.opacity = 'initial';
        takePic.style.cursor = 'pointer';
        document.querySelector('#select-filter').style.display = 'none';
        takePic.addEventListener('mouseover', overMouse);
        takePic.addEventListener('mouseout', outMouse);
        passB = 0;
    }
    if (importStatus === true) {
        // To remove the deselected filter
        context.clearRect(0, 0, width, height);
        context.drawImage(uploadImg, 0, 0, width, height);
    }
    filtersArray.forEach( (filterID) => {
        context.drawImage(document.querySelector('#' + filterID), 0, 0, width, height);
    });
}