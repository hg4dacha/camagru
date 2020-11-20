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
        document.querySelector('#usr-img00').src = picture[k].src;
        document.querySelector('#cancel').addEventListener('click', () => {
        document.querySelector('#big-bloc-comment').style.display = 'none';
        });
    });
}

document.querySelector('#button').addEventListener('click', () => {
    document.querySelector('#big-bloc-comment').style.display = 'none';
});