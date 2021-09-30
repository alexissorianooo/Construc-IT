// document.querySelector('#newyear-button').addEventListener('click', newyear);

// function newyear(){
//     let button = document.querySelector('#newyear-button');
//     let warning = document.querySelector('#warning');
//     let message = document.querySelector('#message');

//     button.remove();
//     warning.remove();
//     message.setAttribute('style', 'visibility: visible')
// }


document.querySelector('#client-search-button').addEventListener('click', verify)

function verify(){
        var hideContent = document.querySelector('.bye');
        // var showContent = document.querySelector('.hello');
        // hideContent.style.opacity = '1';
        hideContent.addEventListener('transitionend', () => {
            hideContent.style.opacity = '0';
            // hideContent.remove();
        });
    
}


