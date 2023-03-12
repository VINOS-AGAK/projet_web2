
const deleteModalBtn = document.querySelectorAll('.deleteModalBtn');
const closeDeleteModal = document.querySelectorAll('.closeDeleteModal');
const deleteModal = document.getElementById('deleteModal');


// "Show the dialog" button opens the <dialog> modally
deleteModalBtn.forEach(button=>{
    button.addEventListener('click', () => {
        const dialogId = button.dataset.dialogId;
        const dialog = document.getElementById(dialogId);
        dialog.showModal();   
    });
});


// "closeDeleteModal" button closes the <dialog> modally
closeDeleteModal.forEach(button=>{
    button.addEventListener('click', () => {
        const dialogId = button.dataset.dialogId;
        const dialog = document.getElementById(dialogId);
        dialog.close();
    })
});


