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
});

// Add city
addCityForm = document.getElementById('addCityForm');
btnAddSubmit = document.getElementById('btn-add-submit');

addCityForm.addEventListener('submit', (e) => {
    e.preventDefault();
    btnAddSubmit.textContent = 'Saving...';
    btnAddSubmit.disabled = true;

    fetch('actions.php', {
        method: 'POST',
        body: new FormData(addCityForm)
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            // document.querySelector('.table-responsive').innerHTML = data;

        });
});