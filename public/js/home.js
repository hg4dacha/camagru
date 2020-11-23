// --   likes   --  //
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

//  date and hour
function actualTime() {
    let time = new Date();
    let localTime = time.toLocaleString('fr-FR', {
        hour: '2-digit',
        minute: '2-digit'
    });
    localTime = localTime.replace(':', 'h');
    return(localTime);
}
//
function actualDate() {
    let date = new Date();
    let localDate = date.toLocaleString('fr-FR', {
        day: '2-digit',
        month: 'short',
        year: 'numeric'
    });
    return(localDate);
}

//  checking the comment
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
    let commHour = actualTime();
    let commDate = actualDate();

    let newComment = new FormData();
    newComment.append('picture_id', picture_id);
    newComment.append('comment', comment);
    newComment.append('commHour', commHour);
    newComment.append('commDate', commDate);
    let XHR = new XMLHttpRequest();
    XHR.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.responseText == "Le commentaire n'est pas valide.") {
                document.querySelector('#success').style.display = 'initial';
                document.querySelector('#success').style.color = '#EA2027';
                document.querySelector('#success').innerHTML = this.responseText;
                setTimeout( () => {
                    document.querySelector('#success').style.display = 'none';
                }, 2500);
                return;
            } else {
                console.log(this.responseText);
            }
        } };
    XHR.open('POST', '../controller/new_comment.php', true);
    XHR.send(newComment);

    document.querySelector('#big-bloc-comment').style.display = 'none';
    document.querySelector('#success').style.display = 'initial';
    document.querySelector('#success').style.color = '#27ae60';
    document.querySelector('#success').innerHTML = 'Votre commentaire a bien été posté !';
    let loc = document.location.href;
    loc = loc.replace('#big-bloc-comment', '#success');
    location = loc;
    setTimeout( () => {
    document.querySelector('#success').style.display = 'none';
    }, 2500);
});