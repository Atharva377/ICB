document.getElementById("additionalInfo_edit").addEventListener("click", () => {
  document.getElementById("edit_popup").style.display = "block";
  let data = JSON.parse(localStorage.getItem("product_details"));
  console.log(data);
  const form_display = document.getElementById("form_display");
  let additional_info = "";
  console.log(data["additional_info"]);
  let count = 1;
  for (let i in data["additional_info"]) {
    console.log(data["additional_info"][i]);
    additional_info += `<legend id="additionalInfo_legend_${count}">
      <input name="additional_key_${count}" value="${i}" class="input_list_item_first" required>
      <input name="additional_value_${count}" value="${data["additional_info"][i]}" class="input_list_item__second" required>
      <i id="remove_additionalInfo${count}" class="fa-solid fa-close"></i>
    </legend>`;
    count++;
  }

  form_display.innerHTML = `
    <form method="post" action="./database/product/edit_faq.php">
        <h2>Additional Info</h2>
        <legend class="pid">
            <input type="hidden" name="pid" value="${data["id"]}">
        </legend>
        <legend id="additionalInfo_list">
            ${additional_info}
        </legend>
        <input type="button" value="+" id="add_additionalInfo">
        <br>
        <input type="submit" value="submit" name="submit"> 
    </form>
  `;

  console.log(document.getElementById("add_additionalInfo"));

  let i;
  console.log(count);
  for (i = 1; i <= count; i++) {
    // console.log(`remove_additionalInfo${i}`);
    document
      .getElementById(`remove_additionalInfo${i}`)
      .addEventListener("click", () => {
        document.getElementById(`additionalInfo_legend_${i - 1}`).remove();
      });
  }

  function add_new_input(i) {
    document.getElementById(
      "additionalInfo_list"
    ).innerHTML += `<legend id="additionalInfo_legend_${i}">
    <input name="question${i}" placeholder="FAQ Question"  class="input_list_item_first" required>
    <input name="answer${i}" placeholder="FAQ Answer" class="input_list_item__second" required>
    <i id="remove_additionalInfo${i}" class="fa-solid fa-close"></i>
  </legend>`;
  }

  function remove_input(i) {
    console.log(document.getElementById(`remove_additionalInfo${i}`));
    document
      .getElementById(`remove_additionalInfo${i}`)
      .addEventListener("click", () => {
        document.getElementById(`additionalInfo_legend_${i}`).remove();
      });
  }

  i = Number(i);
  console.log(document.getElementById("add_additionalInfo"));
  document
    .getElementById("add_additionalInfo")
    .addEventListener("click", () => {
      add_new_input(i);
      remove_input(i);
      i++;
    });
});
