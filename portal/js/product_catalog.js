
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status==200){
        let result = this.responseText;
        console.log(result);
        // console.log
        if(result=="No product found"){
            document.getElementsByClassName("scroll-container")[0].innerHTML=`<h2 class="notFound">Not product found</h2>`;
        }else{
            result = JSON.parse(result);
            const products_data = document.getElementsByClassName("scroll-container")[0];
            products_data.innerHTML = "";
            // console.log(result);
            // return;
            for(let i = 0;i<Object.keys(result).length;i++){
                console.log(result[i]);
                // console.log(resu[i]);
                products_data.innerHTML+= `
                <div class="product-component swiper-slide">
                <div class="card-image">
                  <img src="${result[i]["image"]}" alt="${result[i]["product_name"]}" class="card-img">
                </div>
              
                <div class="card-content">
                  <h2 class="name">${result[i]["product_name"]}</h2>
                  <div class="product_details">
                    <div class="product_details__bought">200+</div>
                    <a href="${"./product-deatils.php?p"+result[i]["prod_id"]}">
                      <button class="product_details__button">
                        Pitch Product
                      </button>
                    </a>
                    <div class="product_details__watchlater"><img src="./images/watch_later.png" alt="watch_later" class="product_details__watchlater__img"></div>
                  </div>
            
                </div>
              </div>
                `;
            }
            // products_data.forEach(element => {
            //     console.log(element);
            // });
            // (let i=0;i<result.length();i++){
            // products_data.innerHTML = `
            //     <?php
            //     $counsumerBought = ${} 
            //      include "./components/productcard_products.php"; 
            //     ?> 
            // `
            // }
        }
    }
};

console.log("In product_catablo");
xmlhttp.open("GET", "database/productscatalog_GetProducts.php");
xmlhttp.send();
