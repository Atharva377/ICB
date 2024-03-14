document.getElementById("faq_edit").addEventListener("click", () => {
  document.getElementById("edit_popup").style.display = "block";
  let data = JSON.parse(localStorage.getItem("product_details"));
  console.log(data);
  const form_display = document.getElementById("form_display");
  let faq = "";
  console.log(data["faq"]);
  let count = 1;
  for (let i = 0; i < Object.keys(data["faq"]).length / 2; i++) {
    faq += `<legend id="faq_legend_${count}">
      <input name="question${count}" value="${
      data["faq"][`question${count}`]
    }" class="input_list_item_first" required>
      <input name="answer${count}" value="${
      data["faq"][`answer${count}`]
    }" class="input_list_item__second" required>
      <i id="remove_faq_${count}" class="fa-solid fa-close"></i>
    </legend>`;
    // console.log(data["faq"][`question${i + 1}`]);
    // console.log(data["faq"][`answer${i + 1}`]);
    count++;
  }
  // console.log(faq);

  form_display.innerHTML = `
    <form method="post" action="./database/product/edit_faq.php">
        <h2>FAQ</h2>
        <legend class="pid">
            <input type="hidden" name="pid" value="${data["id"]}">
        </legend>
        <legend id="faq_list">
            ${faq}
        </legend>
        <input type="button" value="+" id="add_faq">
        <br>
        <input type="submit" value="submit" name="submit"> 
    </form>
  `;
  let i;
  console.log(count);
  for (i = 1; i <= count / 2; i++) {
    console.log(`remove_faq_${i}`);
    document.getElementById(`remove_faq_${i}`).addEventListener("click", () => {
      document.getElementById(`faq_legend_${i - 1}`).remove();
    });
  }

  function add_new_input(i) {
    document.getElementById(
      "faq_list"
    ).innerHTML += `<legend id="faq_legend_${i}">
    <input name="question${i}" placeholder="FAQ Question"  class="input_list_item_first" required>
    <input name="answer${i}" placeholder="FAQ Answer" class="input_list_item__second" required>
    <i id="remove_faq_${i}" class="fa-solid fa-close"></i>
  </legend>`;
  }

  function remove_input(i) {
    console.log(document.getElementById(`remove_faq_${i}`));
    document.getElementById(`remove_faq_${i}`).addEventListener("click", () => {
      document.getElementById(`faq_legend_${i}`).remove();
    });
  }

  i = Number(i);
  console.log(document.getElementById("add_faq"));
  document.getElementById("add_faq").addEventListener("click", () => {
    // console.log("adding new element");
    add_new_input(i);
    remove_input(i);
    i++;
    //     document.getElementById(
    //       "additional_info_list"
    //     ).innerHTML += `<legend id="additionalInfo_legend_${i}">
    //   <input name="additional_key_${i}" value="${i}" class="input_list_item_first">
    //   <input name="additional_value_${i}" value="${data["additional_info"][i]}" class="input_list_item__second">
    //   <i id="remove_additional_${i}" class="fa-solid fa-close"></i>
    // </legend>`;

    // Adding remove button functionality
    // document
    //   .getElementById(`remove_feature_${i}`)
    //   .addEventListener("click", () => {
    //     document.getElementById(`features_legend_${i}`).remove();
    //   });
    // i++;
    // }
  });
});
