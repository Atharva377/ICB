var xhr = new XMLHttpRequest();
xmlhttp.onreadystatechange = function () {
  if (this.readyState == 4 && this.status == 200) {
    let product_data = this.responseText;
  }
};

setInterval(() => {
  xhr.open("GET", "./database/getDashboardDetails.php");
  xmlhttp.send();
}, 10 * 1000);
// xmlhttp.send();
