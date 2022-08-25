require('./bootstrap');

const deleteButton = document.querySelectorAll('.js-delete');
const eleOverlay = document.querySelector('.overlay');

if(eleOverlay) {
    deleteButton.forEach(button => {
        button.addEventListener('click', function () {
            eleOverlay.classList.remove('d-none');
        })
    });

    document.querySelector('.js-no').addEventListener('click', function () {
        eleOverlay.classList.add('d-none');
    });
};

