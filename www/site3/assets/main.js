// === Без плавного затухания ===

// const divTable = document.querySelector('.table-responsive');
// // Delegate event
// divTable.addEventListener('click', (e) => {
//     // Pagination
//     if (e.target.className === 'page-link') {
//         e.preventDefault();
//         let page = +e.target.dataset.page;
//         if (page) {
//             fetch('actions.php', {
//                 method: 'POST',
//                 body: JSON.stringify({ page: page })
//             })
//                 .then((response) => response.text())
//                 .then((data) => {
//                     document.querySelector('.table-responsive').innerHTML = data;
//                 });
//         }
//     }
// });

//=== С плавным затуханием при переходе на другую страницу ===
const divTable = document.querySelector('.table-responsive');

// Delegate event
divTable.addEventListener('click', (e) => {
    // Pagination
    if (e.target.className === 'page-link') {
        e.preventDefault();
        let page = +e.target.dataset.page;
        if (page) {
            // Добавляем класс с эффектом перехода
            divTable.classList.add('fade-out');

            // Отправляем запрос и обновляем таблицу
            fetch('actions.php', {
                method: 'POST',
                body: JSON.stringify({ page: page })
            })
                .then((response) => response.text())
                .then((data) => {
                    // После задержки удаляем класс с эффектом перехода и обновляем содержимое таблицы
                    setTimeout(() => {
                        divTable.innerHTML = data;
                        divTable.classList.remove('fade-out');
                    }, 200); // Задержка должна соответствовать времени перехода в CSS
                });
        }
    }

    // Get city for edit

    if (e.target.classList.contains('btn-edit')) {
        let id = +e.target.dataset.id;
        if (id) {
            fetch('actions.php', {
                method: 'POST',
                body: JSON.stringify({ id: id, action: 'get_city' })
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.answer === 'success') {
                        document.getElementById('editName').value = data.city.name;
                        document.getElementById('editPopulation').value = data.city.population;
                        document.getElementById('id').value = data.city.id;
                    }
                    // console.log(data);

                });
        }
    }

    // Delete city
    if (e.target.classList.contains('btn-delete')) {
        let id = +e.target.dataset.id;
        if (id) {
            fetch('actions.php', {
                method: 'POST',
                body: JSON.stringify({ id: id, action: 'delete_city' })
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.answer === 'success') {
                        setTimeout(() => {
                            Swal.fire({
                                icon: data.answer,
                                title: data.answer,
                                html: data?.errors
                            });
                            if (data.answer === 'success') {
                                let tr = document.getElementById(`city-${id}`);
                                tr.remove();
                            }
                        }, 1000);
                    }
                    // console.log(data);

                });
        }
    }


});

// Add city
const addCityForm = document.getElementById('addCityForm');
const btnAddSubmit = document.getElementById('btn-add-submit');

addCityForm.addEventListener('submit', (e) => {
    e.preventDefault();
    btnAddSubmit.textContent = 'Saving...'; // Исправлено
    btnAddSubmit.disabled = true;

    fetch('actions.php', {
        method: 'POST',
        body: new FormData(addCityForm)
    })
        .then((response) => response.json())
        .then((data) => {
            setTimeout(() => {
                Swal.fire({
                    icon: data.answer,
                    title: data.answer,
                    html: data?.errors
                });
                if (data.answer === 'success') {
                    addCityForm.reset();
                }
                btnAddSubmit.textContent = 'Save';
                btnAddSubmit.disabled = false;
            }, 1000);

        });

});

// Edit city
const editCityForm = document.getElementById('editCityForm');
const btnEditSubmit = document.getElementById('btn-edit-submit');

editCityForm.addEventListener('submit', (e) => {
    e.preventDefault();
    btnEditSubmit.textContent = 'Saving...'; // Исправлено
    btnEditSubmit.disabled = true;

    fetch('actions.php', {
        method: 'POST',
        body: new FormData(editCityForm)
    })
        .then((response) => response.json())
        .then((data) => {
            setTimeout(() => {
                Swal.fire({
                    icon: data.answer,
                    title: data.answer,
                    html: data?.errors
                });
                if (data.answer === 'success') {
                    let idValue = document.getElementById('id').value;
                    let nameValue = document.getElementById('editName').value;
                    let populationValue = document.getElementById('editPopulation').value;
                    let tr = document.getElementById(`city-${idValue}`);
                    tr.querySelector('.name').innerHTML = nameValue;
                    tr.querySelector('.population').innerHTML = populationValue;
                }
                btnEditSubmit.textContent = 'Save';
                btnEditSubmit.disabled = false;
            }, 1000);

        });

});

// Search
const sField = document.getElementById('search');
const loader = document.getElementById('loader');
sField.addEventListener('input', (e) => {
    let search = e.target.value.trim();
    if (search.length > 2) {
        fetch('actions.php', {
            method: 'POST',
            body: JSON.stringify({ search: search })
        })
            .then((response) => response.text())
            .then((data) => {
                // console.log(data);
                loader.style.display = 'block';
                setTimeout(() => {
                    divTable.innerHTML = data;
                    // https://www.cssscript.com/easy-javascript-plugin-word-highlighting-document-mark-js/
                    let instance = new Mark(divTable);
                    instance.mark(search);
                    loader.style.display = 'none';
                }, 500);
            })
    }

});

// Close search
document.getElementById('clear-search').addEventListener('click', () => {
    sField.value = '';
    fetch('actions.php', {
        method: 'POST',
        body: JSON.stringify({ page: 1 })
    })
        .then((response) => response.text())
        .then((data) => {
            divTable.innerHTML = data;
        });
});

