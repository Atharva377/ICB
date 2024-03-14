// let allInputs = Array.from(document.getElementsByTagName("input"));
// allInputs.forEach((element) => {
//   if ((element.type = "text")) {
//     // console.log(element);
//   }
// });

// console.log(allInputs);

for (let key in localStorage) {
  const textInput = document.getElementsByName(key)[0];
  console.log(textInput.type);
  if (textInput.type == "text") {
    textInput.value = localStorage.getItem(key);
  }
}
