let imageUsrDiv = document.querySelectorAll('.picture-div');
let imageUsr = document.querySelectorAll('.user-pictures');
let trash = document.querySelectorAll('.delete-img');
let i;
let j;
console.log(imageUsr[0]['id']);


function viewDelete(index) {
    imageUsr[index].style.filter = 'opacity(40%)';
    trash[index].style.display = 'initial';
    console.log('OK');
}

function maskDelete(index) {
    imageUsr[index].style.filter = 'opacity(100%)';
    trash[index].style.display = 'none';
    console.log('XX');
}

for ( i = 0; i < imageUsrDiv.length; i++ ) {
    imageUsrDiv[i].addEventListener( 'mouseover', viewDelete(i) );
}

for ( j = 0; j < imageUsrDiv.length; j++ ) {
    imageUsrDiv[j].addEventListener( 'mouseout', maskDelete(j) );
}