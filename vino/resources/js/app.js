

const deleteModalBtn = document.getElementById('deleteModalBtn');
const closeDeleteModal = document.getElementById('closeDeleteModal');
const deleteModal = document.getElementById('deleteModal');


// "Show the dialog" button opens the <dialog> modally
deleteModalBtn.addEventListener('click', () => {
    deleteModal.showModal();
});


// "closeDeleteModal" button closes the <dialog> modally
closeDeleteModal.addEventListener('click', () => {
    deleteModal.close();
});


