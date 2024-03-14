// onload
document.getElementById("status_list__item__1").classList.add("ongoing");

// Next button 1
document.getElementById("next_1").addEventListener("click", (e) => {
  e.preventDefault();

  // Test env
  let all_inputs = Array.from(
    document.getElementById("part1").getElementsByTagName("input")
  );
  console.log(all_inputs);
  let status = true;
  all_inputs.forEach((element) => {
    if (element.required && element.value == "") {
      // element.dispatchEvent(new Event("input"));
      // console.log(element.validity.valueMissing);

      element.parentElement.classList.add("invalid_input");
      console.log(element.parentElement.classList);
      // element.parentElement.classList.add("");
      status = false;
      return;
    }
    // if (element.required) {
    //   console.log(element.validity.valueMissing);
    // }
  });
  //
  // Switch to next section
  if (status) {
    document.getElementById("part1").style.display = "none";
    document.getElementById("part2").style.display = "block";
    // Status bar update
    // console.log(document.getElementById("status_list__item__1"));
    document.getElementById("status_list__item__1").classList.remove("ongoing");
    document.getElementById("status_list__item__1").classList.add("compeleted");
    document.getElementById("status_list__item__2").classList.add("ongoing");
  }
});

// Next button 2
document.getElementById("next_2").addEventListener("click", (e) => {
  e.preventDefault();
  let all_inputs = Array.from(
    document.getElementById("part2").getElementsByTagName("input")
  );
  console.log(all_inputs);
  let status = true;
  all_inputs.forEach((element) => {
    if (element.required && element.value == "") {
      // element.dispatchEvent(new Event("input"));
      // console.log(element.validity.valueMissing);

      element.parentElement.classList.add("invalid_input");
      console.log(element.parentElement.classList);
      // element.parentElement.classList.add("");
      status = false;
      return;
    }
    // if (element.required) {
    //   console.log(element.validity.valueMissing);
    // }
  });
  //
  // Switch to next section
  if (status) {
    document.getElementById("part2").style.display = "none";
    document.getElementById("part3").style.display = "block";
    document.getElementById("status_list__item__2").classList.remove("ongoing");
    document.getElementById("status_list__item__2").classList.add("compeleted");
    document.getElementById("status_list__item__3").classList.add("ongoing");
  }
});

// Back button 2
document.getElementById("back_2").addEventListener("click", (e) => {
  e.preventDefault();
  document.getElementById("part2").style.display = "none";
  document.getElementById("part1").style.display = "block";
  document
    .getElementById("status_list__item__1")
    .classList.remove("compeleted");
  document.getElementById("status_list__item__1").classList.add("ongoing");
  document.getElementById("status_list__item__2").classList.remove("ongoing");
});

// Back button 3
document.getElementById("back_3").addEventListener("click", (e) => {
  e.preventDefault();
  document.getElementById("part3").style.display = "none";
  document.getElementById("part2").style.display = "block";
  document
    .getElementById("status_list__item__2")
    .classList.remove("compeleted");
  document.getElementById("status_list__item__2").classList.add("ongoing");
  document.getElementById("status_list__item__3").classList.remove("ongoing");
});
