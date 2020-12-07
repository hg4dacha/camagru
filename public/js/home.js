// --   likes   --  //
let likes = document.querySelectorAll('.like');
let likeState = [];
likeState.length = likes.length;


for (let j = 0; j < likeState.length; j++) {
    
    if (likes[j].src.includes('/camagru/public/pictures/like00.png')) {
        likeState[j] = false;
    }
    else if (likes[j].src.includes('/camagru/public/pictures/like01.png')) {
        likeState[j] = true;
    }
}

for  (let i = 0; i < likes.length; i++) {

    likes[i].addEventListener('click', () => {
        if (likeState[i] === false) {
            likes[i].src = '/camagru/public/pictures/like01.png';
            likeState[i] = true;
            let picture_id = picture[i].id;
            let newLike = new FormData();
            newLike.append('picture_id', picture_id);
            let XHR = new XMLHttpRequest();
            XHR.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    console.log(this.responseText);
                }
            }
            XHR.open('POST', '../controller/new_like.php', true);
            XHR.send(newLike);
        }
        else if (likeState[i] === true) {
            likes[i].src = '/camagru/public/pictures/like00.png';
            likeState[i] = false;
            let picture_id0 = picture[i].id;
            let newLike = new FormData();
            newLike.append('picture_id', picture_id0);
            let XHR = new XMLHttpRequest();
            XHR.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    console.log(this.responseText);
                }
            }
            XHR.open('POST', '../controller/delete_like.php', true);
            XHR.send(newLike);
        }
    })
}

// --   comments   --  //
let comments = document.querySelectorAll('.comments');
let picture = document.querySelectorAll('.user-pictures');

for (let k = 0; k < comments.length; k++) {

    comments[k].addEventListener('click', () => {
        document.querySelector('#error-comment').innerHTML = '';
        document.forms['form-submit']['comment'].value = '';
        document.querySelector('#big-bloc-comment').style.display = 'block';
        document.querySelector('.usr-img00').src = picture[k].src;
        document.querySelector('.usr-img00').id = picture[k].id;
    });
}

// cancel comment writing
document.querySelector('#cancel').addEventListener('click', () => {
    document.querySelector('#big-bloc-comment').style.display = 'none';
    let loc = document.location.href;
    loc = loc.replace('#big-bloc-comment', '#user-tittle');
    location = loc;
});


//  checking the comment and submit
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
    let picture_id = document.querySelector('.usr-img00').id;
    document.querySelector('body').style.pointerEvents='none';
    document.querySelector('body').style.backgroundColor='rgba(0, 0, 0, .3)';
    let newComment = new FormData();
    newComment.append('picture_id', picture_id);
    newComment.append('comment', comment);
    let XHR = new XMLHttpRequest();
    XHR.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.responseText != 'success') {
                document.querySelector('body').style.pointerEvents='auto';
                document.querySelector('body').style.backgroundColor='whitesmoke';
                document.querySelector('#success').style.display = 'initial';
                document.querySelector('#success').style.color = '#EA2027';
                document.querySelector('#success').innerHTML = "Le commentaire n'est pas valide.";
                setTimeout( () => {
                    document.querySelector('#success').style.display = 'none';
                }, 2500);
                console.log(this.responseText);
            } else if (this.responseText == 'success') {
                document.querySelector('body').style.pointerEvents='auto';
                document.querySelector('body').style.backgroundColor='whitesmoke';
                document.querySelector('#success').style.display = 'initial';
                document.querySelector('#success').style.color = '#27ae60';
                document.querySelector('#success').innerHTML = 'Votre commentaire a bien été posté !';
                setTimeout( () => {
                    document.querySelector('#success').style.display = 'none';
                }, 2500);
            }
        }
    };
    XHR.open('POST', '../controller/new_comment.php', true);
    XHR.send(newComment);
    
    document.querySelector('#big-bloc-comment').style.display = 'none';
    let loc = document.location.href;
    loc = loc.replace('#big-bloc-comment', '#success');
    location = loc;
});