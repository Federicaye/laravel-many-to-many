import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

const searchForm = document.getElementById("search-form-cat");
if (searchForm) {
    const searchSelect = document.getElementById("search-cat");
    searchSelect.addEventListener("change", () => {
        if (searchSelect.value) {
            searchForm.submit();
        }
    });
}


let editInput = document.querySelectorAll('.edit-input');
let editButton = document.querySelectorAll('.edit-button');
let p = document.querySelectorAll('.p');
editButton.forEach(function (button) {
    button.addEventListener('click', (e) => {
        e.preventDefault();
        let idButton = button.id.toString();
        /*  console.log(idButton); */
        editInput.forEach(function (input) {
            /*console.log(post.classList); */
            if (input.classList.contains(idButton)) {
                /*  console.log('true'); */
                input.classList.toggle('d-none');
            }
            else { console.log('false') }

        });
        p.forEach(function (ps) {
            let idButton = button.id.toString();
            console.log(idButton);
            if (ps.classList.contains(idButton)) {
                console.log('true');
                ps.classList.toggle('d-none');
            }
            else { console.log('false') }

        });
    })
})