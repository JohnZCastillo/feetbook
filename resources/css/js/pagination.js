const newCategory = document.querySelector('#new-category');
const btnAddCategory = document.querySelector("#btn-category");

const btn1 = document.querySelector('.btn-1');
const btn2 = document.querySelector('.btn-2');
const btn3 = document.querySelector('.btn-3');
const btn4 = document.querySelector('.btn-4');
const btn5 = document.querySelector('.btn-5');

const content1 = document.querySelector('.content-1');
const content2 = document.querySelector('.content-2');
const content3 = document.querySelector('.content-3');
const content4 = document.querySelector('.content-4');
const content5 = document.querySelector('.content-5');

const contents = [content1, content2, content3, content4, content5];
const buttons = [btn1, btn2, btn3, btn4, btn5];

// buttons click event
buttons.forEach((button, index) => {
    button.addEventListener('click', () => {
        hidePages();
        contents[index].classList.remove('hide');
    })
});

// hide pages
const hidePages = () => {
    contents.forEach(content => {
        if (!content.classList.contains('hide')) {
            content.classList.add('hide');
        }
    });
}

btnAddCategory.addEventListener('click', () => {
    newCategory.classList.remove('hide');
})

//hide element base on id
const hideElement = (id) => {
    document.querySelector('#' + id).classList.add('hide');
}

newCategory.addEventListener('submit', async (event) => {

    event.preventDefault();

    const title = document.querySelector("#category-title");
    const description = document.querySelector("#category-description");

    try {
        let result = await fetch("./add-type", {
            method: "POST",
            headers: {
                'Content-Type': "application/json"
            },
            body: JSON.stringify({
                title: title.value,
                description: description.value,
            })
        });

        const status = result.ok;
        result = await result.json();

        if (!status) throw new Error(result.message);

        alert("Added");

        newCategory.classList.add('hide');

    } catch (error) {
        alert(error.message);
    }

})

//delete user
const deleteUser = (id) => {
    console.log(id);
}

const search = (name) => {
    console.log(name);
}

const showPagination = (id, page) => {

    const table = document.querySelector('#' + id);

    console.log(id + '-page-' + page);

    let index = 0;

    for (let row of table.rows) {

        //escape header
        if (index++ == 0) continue;

        if (row.classList.contains(id + '-page-' + page)) {
            row.classList.remove('hide');
        } else {
            row.classList.add('hide');
        }
    }

}
