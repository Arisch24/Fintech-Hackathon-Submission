const sidebarCollapse = document.querySelector('#sidebarCollapse');
const sidebar = document.querySelector('#sidebar');
const content = document.querySelector('#content');

sidebarCollapse.addEventListener("click", (e) => {
    if(sidebar.className.includes('unactive')){
        //if sidebar is unactive then show open sidebar
        sidebarCollapse.innerHTML = 'Open sidebar';
    }else{
        //if active then show as close sidebar
        sidebarCollapse.innerHTML = 'Close sidebar';
    }
    //if unactive then it is closed
    sidebar.classList.toggle('unactive');
    content.classList.toggle('active');
});