let likes = document.querySelectorAll('.like');
let likesLength = likes.length;
let likeState = [];
likeState.length = likesLength;
for (let j = 0; j < likeState.length; j++) {
    likeState[j] = false;
}
console.log(likeState);

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