let inputs = Array.from(document.getElementsByTagName("input"));
// console.log(inputs);

// prompt("yES");
// alert("Do you want to enter previously sessions product data?")

inputs.forEach((element) => {
  if (element.required) {
    element.addEventListener("keydown", () => {
      if (element.value == "") {
        console.log(element.parentElement.classList);
        element.parentElement.classList.remove("invalid_input");
      }
    });
  }
  if (element.type == "text") {
    // try {
    //   if (localStorage.getItem(element.target.name)) {
    //     element.target.value = localStorage.getItem(element.target.name);
    //   }
    // } catch (e) {
    //   console.log(e);
    // }
    element.addEventListener("keydown", (e) => {
      localStorage.setItem(e.target.name, e.target.value);
      document.getElementById(`summary__${e.target.name}`);
      //   console.log(e.target.name);
      //   console.log(e.target.value);
    });
  } else if (element.type == "checkbox") {
    element.addEventListener("click", (e) => {
      localStorage.setItem(e.target.name, e.target.value);

      //   console.log(e.target.name);
      //   console.log(e.target.value);
    });
  }
  //   else if (element.type == "file") {
  //     element.addEventListener("change", (e) => {
  //       localStorage.setItem(e.target.name, e.target.value);

  //         console.log(e.target.name);
  //       console.log(e.target.value);
  //     });
  //   }
});

// On adding new dom elements
// document.addEventListener("DOMContentLoaded", () => {
//   inputs.forEach((element) => {
//     if (element.required) {
//       element.addEventListener("keydown", () => {
//         if (element.value == "") {
//           console.log(element.parentElement.classList);
//           element.parentElement.classList.remove("invalid_input");
//         }
//       });
//     }
//   });
// });
