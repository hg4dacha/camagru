let likes = document.querySelectorAll('.like');
let likesLength = likes.length;
let likeState = [];
likeState.length = likesLength;

for (let j = 0; j < likeState.length; j++) {
    likeState[j] = false;
}

for  (let i = 0; i < likes.length; i++) {

    likes[i].addEventListener('click', () => {
        if (likeState[i] === false) {
            likes[i].src = '/camagru/public/pictures/like01.png';
            likeState[i] = true;
        }
        else if (likeState[i] === true) {
            likes[i].src = '/camagru/public/pictures/like00.png';
            likeState[i] = false;
        }
    })
}

let comments = document.querySelectorAll('.comments');
let picture = document.querySelectorAll('.user-pictures');

for (let k = 0; k < comments.length; k++) {

    comments[k].addEventListener('click', () => {
        document.querySelector('#big-bloc-comment').style.display = 'block';
        document.querySelector('.usr-img00').src = picture[k].src;
        document.querySelector('.usr-img00').id = picture[k].id;
        document.querySelector('#cancel').addEventListener('click', () => {
        document.querySelector('#big-bloc-comment').style.display = 'none';
        });
    });
}

// document.querySelector('#form-submit').addEventListener('submit', (e) => {
//     e.preventDefault();
//     document.querySelector('#big-bloc-comment').style.display = 'none';
// });

document.forms['form-submit'].addEventListener('submit', (e) => {
    e.preventDefault();
    let comment = document.forms['form-submit']['comment'].value;
    let error;
    if (!comment) {
        error = 'Le champ est vide !';
    }
    else if (comment.length > 250) {
        error = 'Le commentaire doit faire 250 caractères au maximum.';
    }

    if (error) {
        document.querySelector('#error-comment').innerHTML = error;
        return false;
    }
    let id_picture = document.querySelector('.usr-img00').id;
    document.querySelector('#big-bloc-comment').style.display = 'none';
});