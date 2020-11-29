// likes


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
        document.querySelector('#success').style.color = '#EA2027';
        document.querySelector('#success').innerHTML = error;
        return false;
    }
    let picture_id = document.querySelector('.usr-image').id;
    document.querySelector('body').style.pointerEvents='none';
    document.querySelector('body').style.backgroundColor='rgba(0, 0, 0, .3)';
    document.querySelector('#champs').style.backgroundColor='rgba(0, 0, 0, .1)';
    let newComment = new FormData();
    newComment.append('picture_id', picture_id);
    newComment.append('comment', comment);
    let XHR = new XMLHttpRequest();
    XHR.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.responseText != 'success') {
                document.querySelector('body').style.pointerEvents='auto';
                document.querySelector('body').style.backgroundColor='whitesmoke';
                document.querySelector('#champs').style.backgroundColor='white';
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
                document.querySelector('#champs').style.backgroundColor='white';
                document.querySelector('#success').style.display = 'initial';
                document.querySelector('#success').style.color = '#27ae60';
                document.querySelector('#success').innerHTML = 'Votre commentaire a bien été posté !';
                setTimeout( () => {
                    document.querySelector('#success').style.display = 'none';
                }, 2500);
                console.log(this.responseText);
            }
        } };
        XHR.open('POST', '../controller/new_comment.php', true);
        XHR.send(newComment);

        document.forms['form-submit']['comment'].value = '';

});

let no_photo = document.querySelector('#no-photo');
if (no_photo.length != 0) {
    document.querySelector('footer').style.bottom='initial';
}