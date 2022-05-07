console.log('start');

window.addEventListener("load", function() {
    // (A) GET ALL BOOKS
    var books = document.getElementsByClassName("book-wrap");


    // (B) LOOP THROUGH ALL BOOKS
    for (let book of books) {
        // (B1) ON CLICKING A BOOK
        book.addEventListener("click", function() {
            // (B2) GET SELECTED BOOK ID, NAME, DESCRIPTION
            var id = this.dataset.id,
                name = this.getElementsByClassName("book-title")[0].innerHTML,
                desc = this.getElementsByClassName("book-desc")[0].innerHTML;

            // (B3) SHOW IN DIALOG BOX
            alert(`You have selected - ID: ${id}, TITLE: ${name} DESC: ${desc}`);
        });
    }
});