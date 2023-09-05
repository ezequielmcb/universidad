const modal = document.querySelector('#modal');
const modalToggle = document.querySelector('#modalToggle');
const closeModal = document.querySelector('#closeModal');

modalToggle.addEventListener('click', function () {
    modal.classList.remove('hidden');
});

closeModal.addEventListener('click', function () {
    modal.classList.add('hidden');
});

const modal2 = document.querySelector('#modal');
const modalToggle2 = document.querySelector('#modalToggle');
const closeModal2 = document.querySelector('#closeModal');
const updateModal = document.querySelector('#updateModal');
const updateModalToggle = document.querySelector('#modalUpdateToggle');
const closeUpdateModal = document.querySelector('#closeUpdateModal');

modalToggle.addEventListener('click', function () {
    modal.classList.remove('hidden');
});

closeModal.addEventListener('click', function () {
    modal.classList.add('hidden');
});

updateModalToggle.addEventListener('click', function () {
    updateModal.classList.remove('hidden');
});

closeUpdateModal.addEventListener('click', function () {
    updateModal.classList.add('hidden');
});