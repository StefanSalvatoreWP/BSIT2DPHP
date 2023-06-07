const employeeLink = document.getElementById('employeeLink');
const form = document.querySelector('.studentForm');

employeeLink.addEventListener('click', (event) => {
    event.preventDefault();
    form.classList.toggle('hidden');
});