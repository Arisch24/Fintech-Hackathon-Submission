const closeBtn = document.querySelector('#close-btn');

closeBtn.addEventListener('click', e => {
    e.preventDefault();
    // redirect user to home page if closeBtn is clicked
    window.location.href = 'index.php';
});