// On esc key press
document.onkeyup = (e) => {
  if (e.keyCode == 27) {
    document.getElementById("edit_popup").style.display = "none";
  }
};

// on outside touch
document
  .getElementById("popup_edit__background")
  .addEventListener("click", (e) => {
    document.getElementById("edit_popup").style.display = "none";
  });

// Close button
document.getElementById("popup_close").addEventListener("click", () => {
  document.getElementById("edit_popup").style.display = "none";
});
