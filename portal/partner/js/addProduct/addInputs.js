// Features add
document.getElementById("feature_add").addEventListener("click", () => {
  let count = Array.from(document.getElementsByClassName("features")).length;
  //   console.log(count);
  if (count < 10) {
    document.getElementById("features_div").innerHTML += `
  <label for="features" class="input_field_box input_field_box-90 features">
                                <i class="fa-solid fa-circle-dot"></i>
                                <input type="text" class="input_field_80" name="description" placeholder="Describe about your product ..." id="feature_${
                                  count + 1
                                }" required>
                            </label>
                            `;
  } else {
    alert("Max limit is 10 features");
  }
});

// Additonal Sepcification add
document.getElementById("additional_spec_add").addEventListener("click", () => {
  //   console.log("Event triggered");
  let count = Array.from(
    document.getElementsByClassName("additional_spec")
  ).length;
  //   console.log(count);
  if (count < 10) {
    document.getElementsByClassName("additional_spec_div")[0].innerHTML += `
    <label for="additonal_spec_${count}" class="input_field_box input_field_box-90 additional_spec">
                                <input type="text" class="input_field_60" name="additional_spec_key_${
                                  count + 1
                                }" placeholder="Key" required>
                                <input type="text" class="input_field_80" name="additional_spec_value_${
                                  count + 1
                                }" placeholder="Value" required>
                            </label>
                              `;
  } else {
    alert("Max limit is 10 features");
  }
});

// faq add
document.getElementById("faq_add").addEventListener("click", () => {
  //   console.log("Event triggered");
  let count = Array.from(document.getElementsByClassName("faq")).length;
  //   console.log(count);
  if (count < 10) {
    document.getElementsByClassName("faq_div")[0].innerHTML += `
      <label for="faq_${
        count + 1
      }" class="input_field_box input_field_box-90 faq">
      <input type="text" class="input_field_60" name="faq_${
        count + 1
      }_key" placeholder="Question" required>
      <input type="text" class="input_field_80" name="faq_${
        count + 1
      }_value" placeholder="Answer" required>
  </label>
                                  `;
  } else {
    alert("Max limit is 10 features");
  }
});

// faq add
document.getElementById("data_req_add").addEventListener("click", () => {
  console.log("Event triggered");
  let count = Array.from(document.getElementsByClassName("data_req")).length;
  //   console.log(count);
  if (count < 10) {
    document.getElementsByClassName("data_req_div")[0].innerHTML += `
    <label for="features" class="input_field_box input_field_box-90 data_req">
    <input type="text" class="input_field_80" name="data_req_${
      count + 1
    }" placeholder="Data required" required>
</label>`;
    // <input type="text" class="input_field_80" name="data_req_1_value" placeholder="Value" required></input>
  } else {
    alert("Max limit is 10 features");
  }
});
