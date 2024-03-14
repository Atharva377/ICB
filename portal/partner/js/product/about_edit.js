document.getElementById("about_edit").addEventListener("click", () => {
  document.getElementById("edit_popup").style.display = "block";
  let data = JSON.parse(localStorage.getItem("product_details"));
  console.log(data);
  const form_display = document.getElementById("form_display");
  form_display.innerHTML = `
    <form method="post" action="./database/product/edit_description.php">
        <h2>About</h2>
        <legend class="pid">
            <input type="hidden" name="pid" value="${data["id"]}">
        </legend>
        <legend>
            <input class="edit_field" name="description" value="${data["description"]}" id="about_product" name="product">
        </legend>
        <input type="submit" value="description" name="submit"> 
    </form>
  `;
});
