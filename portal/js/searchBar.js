const searchInput = document.getElementById('search_input');
<<<<<<< HEAD
searchInput.addEventListener('keyup', (e)=>{
    $search_item = document.getElementById('search_input').value.trim();
    if(!$search_item){
      let searchList = document.getElementsByClassName("searchList");
      searchList[0].innerHTML = "";
      return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // let elements = "";
      let result = this.responseText;
      if(result=="No product found"){
        document.getElementsByClassName("searchList")[0].innerHTML=`<p class="notFound">Not product found</p>`;
      }else{
      let products = JSON.parse(result);
      // console.log(this.responseText);
      let searchList = document.getElementsByClassName("searchList");
      searchList[0].innerHTML = "";
      for(let key in products){
        searchList[0].innerHTML+= `
        <a href="#" class="searchList__item">
        <div class="item_searched">
            <img src="${products[key]["image"]}" alt="product_image" class="item_searched__image">
            <div class="item_searched__details">
                <div class="item_searched__details__product_name">${products[key]["product_name"]} : ${products[key]["prod_id"]}</div>
                <div class="item_searched__details__company_name">${products[key]["company_name"]}</div>
                <div class="item_searched__details__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis esse nisi natus obcaecati libero ...</div>
            </div>
        </div>
    </a>
        `;
      }

    }
    }
  };
  xmlhttp.open("GET","database/searchProducts.php?query="+$search_item,true);
  xmlhttp.send();
});

searchInput.addEventListener("input", () => {
  if(!searchInput.value.trim){
    let searchList = document.getElementsByClassName("searchList");
    searchList[0].innerHTML = "";
  }
})


// Revelavance button Toggle
document.getElementById("ProductSearch__options__icon__relevance").addEventListener("click", () => {
  // console.log("Event triggered");
  document.getElementById("ProductSearch__options__relevance").classList.toggle("display__toggle");
  // document.getElementById("ProductSearch__options__relevance").classList.toggle('display__toggle');
=======
searchInput.addEventListener('keydown', (e)=>{
    $search_item = document.getElementById('search_input').value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      let elements = "";
      let products = JSON.parse(this.responseText);
      for(const key in products){
        elements+=`<option value='${key}'>${key}</option>`;
      }
      document.getElementById("product_id").innerHTML = elements;
    }
  };
  xmlhttp.open("GET","database/getProductList.php?id=10000003",true);
  xmlhttp.send();
>>>>>>> 5baa88f (final commit)
})