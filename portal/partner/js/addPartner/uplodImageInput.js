// Clicking on upload image button
document.getElementById("partner_logo").addEventListener("click", (e) => {
  e.preventDefault();
  document.getElementById("partnerLogoInput").click();
});

// On adding input of file type
document.getElementById("partnerLogoInput").addEventListener("change", (e) => {
  //   e.target.value
  //   console.log(e.target.files);
  const companyLogo = e.target.files[0];
  const fileReader = new FileReader();
  fileReader.onloadend = () => {
    document.getElementById("partnerLogoPreview").src = fileReader.result;
  };
  if (companyLogo) {
    fileReader.readAsDataURL(companyLogo);
  } else {
    console.log("ERROR IN UPDATING LOGO");
  }
});
