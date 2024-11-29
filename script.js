
function openFileExplorer() {
    document.getElementById('fileExplorer').style.display = 'flex';
}

function closeFileExplorer() {
    document.getElementById('fileExplorer').style.display = 'none';
}


function switchTab(folderName) {
   
    document.querySelectorAll('.tab').forEach(tab => {
        tab.classList.remove('active');
    });

    document.querySelectorAll('.icon').forEach(icon => {
        icon.classList.remove('active');
    });
    
    document.querySelectorAll('.folder-view').forEach(view => {
        view.classList.remove('active');
    });

    
    document.querySelector(`.tab.${folderName}`).classList.add('active');
    document.querySelector(`.icon.${folderName}`).classList.add('active');
   
    document.getElementById(folderName).classList.add('active');
}
document.querySelectorAll('.tab').forEach(tab => {
    tab.addEventListener('click', (e) => {
        const folderName = e.target.textContent.toLowerCase();
        switchTab(folderName);
    });
});

document.querySelectorAll('.icon').forEach(icon => {
    icon.addEventListener('click', (e) => {
        const folderName = e.target.textContent.toLowerCase().split(' ')[1];
        switchTab(folderName);
    });
});
