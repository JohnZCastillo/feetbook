//delete user
const deleteUser = (id) => {
  console.log(id);
};

const search = (name) => {
  console.log(name);
};

const showPagination = (id, page) => {
  const table = document.querySelector("#" + id);

  console.log(id + "-page-" + page);

  let index = 0;

  for (let row of table.rows) {
    //escape header
    if (index++ == 0) continue;

    if (row.classList.contains(id + "-page-" + page)) {
      row.classList.remove("hide");
    } else {
      row.classList.add("hide");
    }
  }
};
