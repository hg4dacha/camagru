let imageUsrDiv = document.querySelectorAll('.picture-div');
let imageUsr = document.querySelectorAll('.user-pictures');
let trash = document.querySelectorAll('.delete-img');

if (imageUsrDiv.length === 0) {
    
    document.querySelector('#gallery-empty').style.display = 'initial';
    document.querySelector('section').style.paddingBottom = '45px';
}
else {

    for  (let i = 0; i < imageUsrDiv.length; i++) {
    
        imageUsrDiv[i].addEventListener('mouseover', () => {
            imageUsr[i].style.filter = 'brightness(30%)';
            trash[i].style.display = 'initial';
            trash[i].addEventListener('click', (e) => {
                e.stopImmediatePropagation();
                let answer = confirm('Êtes-vous sûr de vouloir supprimer l\'image ?');
                if (answer) {
                    deletePict(imageUsr[i]);
                    imageUsrDiv[i].style.display = 'none';
                }
            });
        });
    }
    
    for (let j = 0; j < imageUsrDiv.length; j++) {
        
        imageUsrDiv[j].addEventListener('mouseout', () => {
            imageUsr[j].style.filter = 'brightness(100%)';
            trash[j].style.display = 'none';
        });
    }
    
    function deletePict(img) {
        let imgToDelete = new FormData();
        imgToDelete.append('imgID', img.id);
        let XHR = new XMLHttpRequest();
        XHR.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                console.log(this.responseText); }
            };
        XHR.open('POST', '../controller/delete_picture.php', true);
        XHR.send(imgToDelete);
    }
}