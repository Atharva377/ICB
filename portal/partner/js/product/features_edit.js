document.getElementById("features_edit").addEventListener("click", () => {
  document.getElementById("edit_popup").style.display = "block";
  let data = JSON.parse(localStorage.getItem("product_details"));
  console.log(data);
  const form_display = document.getElementById("form_display");
  let features = "";
  for (let i in data["features"]) {
    features += `<legend id="features_legend_${i}"><input name="feature_${i}" value="${data["features"][i]}" class="input_list_item"><i id="remove_feature_${i}" class="fa-solid fa-close"></i></legend>`;
  }

  form_display.innerHTML = `
    <form method="post" action="./database/product/edit_features.php">
        <h2>Features</h2>
        <legend class="pid">
            <input type="hidden" name="pid" value="${data["id"]}">
        </legend>
        <legend id="features_list">
            ${features}
        </legend>
        <input type="button" value="+" id="add_features">
        <br>
        <input type="submit" value="submit" name="submit"> 
    </form>
  `;
  let i;
  for (i in data["features"]) {
    document
      .getElementById(`remove_feature_${i}`)
      .addEventListener("click", () => {
        document
          .getElementById(
            `
        ${i}`
          )
          .remove();
      });
  }

  i = Number(i);
  document.getElementById("add_features").addEventListener("click", () => {
    document.getElementById(
      "features_list"
    ).innerHTML += `<legend id="features_legend_${
      i + 1
    }"><input name="feature_${
      i + 1
    }" value="" class="input_list_item"><i id="remove_feature_${
      i + 1
    }" placeholder="Add features" class="fa-solid fa-close"></i></legend>`;

    // Adding remove button functionality
    document
      .getElementById(`remove_feature_${i + 1}`)
      .addEventListener("click", () => {
        document.getElementById(`features_legend_${i + 1}`).remove();
      });
    i++;
    // }
  });
});
