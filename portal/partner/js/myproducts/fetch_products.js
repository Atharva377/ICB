var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function () {
  if (this.readyState == 4 && this.status == 200) {
    console.log("loading");
  }
};
xmlhttp.open("GET", `../../database/myproducts.php`, true);
xmlhttp.send();
