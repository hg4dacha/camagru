let imageUsrDiv = document.querySelectorAll('.picture-div');
let imageUsr = document.querySelectorAll('.user-pictures');
let trash = document.querySelectorAll('.delete-img');

for  (let i = 0; i < imageUsrDiv.length; i++) {

    imageUsrDiv[i].addEventListener('mouseover', () => {
        imageUsr[i].style.filter = 'brightness(30%)';
        trash[i].style.display = 'initial';
    });
}

for (let j = 0; j < imageUsrDiv.length; j++) {
    
    imageUsrDiv[j].addEventListener('mouseout', () => {
        imageUsr[j].style.filter = 'brightness(100%)';
        trash[j].style.display = 'none';
    });
}