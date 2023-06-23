fetch('categories.json')
    .then(response => response.json())
    .then(data => {
        const selectElement = document.getElementById('category-select');
        data.categories.forEach(category => {
            let optionElement = document.createElement('option');
            optionElement.value = category;
            optionElement.textContent = category;
            selectElement.appendChild(optionElement);
        });
        updateBookList('');
    });
function updateBookList(category) {
    fetch(`getBooksByCategory.php?category=${category}`)
        .then(response => response.json())
        .then(data => {
            const bookListElement = document.getElementById('book-list');
            bookListElement.innerHTML = '';
            data.books.forEach(book => {
                let bookDiv = document.createElement('div');
                bookDiv.className = 'book';
                bookDiv.innerHTML = `
                    <h2>${book.name}</h2>
                    <h3>${book.author}</h3>
                    <a id="more-info" href='book.php?id=${book.id}'>More Info</a><br>
                    <img src="${book.img_url}" alt="${book.name}">`;
                bookListElement.appendChild(bookDiv);
            });
        });
}
