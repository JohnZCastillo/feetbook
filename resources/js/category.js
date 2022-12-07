const newCategory = document.querySelector("#new-category");
const btnAddCategory = document.querySelector("#btn-category");

newCategory.addEventListener("submit", async (event) => {
  event.preventDefault();

  const title = document.querySelector("#category-title");
  const description = document.querySelector("#category-description");

  try {
    let result = await fetch("./add-type", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        title: title.value,
        description: description.value,
      }),
    });

    const status = await result.ok;
    result = await result.json();

    if (!status) throw new Error(result.message);

    alert("Added");
    newCategory.classList.add("hide");
    window.location.reload();
  } catch (error) {
    alert(error.message);
  }
});

const editService = (id) => {};
