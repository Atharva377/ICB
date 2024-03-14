// Company Name preview Update

document.getElementById("company_name").addEventListener("keyup", (e) => {
  const previewCompanyName = document.getElementById("previewCompanyName");
  if (e.target.value == "") {
    previewCompanyName.innerText = "Company Name";
  } else {
    previewCompanyName.innerText = e.target.value;
  }
});

// Company tagline preview Update

document.getElementById("tagline").addEventListener("keyup", (e) => {
  const previewCompanyTagLine = document.getElementById(
    "previewCompanyTagLine"
  );
  if (e.target.value == "") {
    previewCompanyTagLine.innerText = "Tagline";
  } else {
    previewCompanyTagLine.innerText = e.target.value;
  }
});
