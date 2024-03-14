var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200){
        let product_data = this.responseText;
        try{
            product_data = JSON.parse(product_data)[0];
            console.log(product_data);

            // Inserting the data to dom
            // console.log(product_data['product_name']);
            // console.log(document.getElementById("product_name"));
            document.getElementById("product_name").innerText = `${product_data['product_name']}` + " : " + `${product_data['product_id']}`;
            document.getElementById("product_rating").innerText = product_data['rating'];
            document.getElementById("product_description").innerText = product_data['product_description'];
            const product_features_data = product_data['product_features'];
            product_features_html = "<ul>";
            for(let i = 0;i<Object.keys(product_features_data).length;i++){
                product_features_html+=`<li>${product_features_data[i]}</li>`;
            }
            product_features_html+="</ul>";
            document.getElementById("product_features").innerHTML = product_features_html;

            const faq = product_data['faq'];
            const faq_element = document.getElementById("faq");
            faq_element.innerHTML="";
            for(let i = 1;i<=Object.keys(faq).length/2;i++){
                faq_element.innerHTML+=`<div class="faq_qna"><div class="qustion">Q: ${faq[`question${i}`]}</div><div class="answer">${faq[`answer${i}`]}</div></div>`;
            }
            // product_features_html+="</ul>";
            document.getElementById("product_features").innerHTML = product_features_html;
            
            const additional_info = product_data['faq'];
            const additional_info__element = document.getElementById("faq");
            additional_info.innerHTML="";
            for(let i = 1;i<=Object.keys(faq).length/2;i++){
                additional_info.innerHTML+=``;
            }

            document.getElementById("additional_info").innerText = product_data['product_name'];
            document.getElementById("product_title_popup").innerText = product_data['product_name'];

            const product_list =  document.getElementById("product_list");
            console.log(product_list);
            product_list.innerHTML = "";
            for(let i=0;i<Object.keys(product_data['phots_paths']).length; i++){
                product_list.innerHTML+=`
                <li class="splide__slide">
                <img src="${product_data['phots_paths'][i]}" alt="product_image_1" class="product_details__images__product_slider__img">
                </li>
                `;
            }
        
            // Company Name
            document.getElementById("company_name").innerText = product_data['company_name'];
            document.getElementById("company_name").href = "./company?="+product_data['company_id'];
            document.getElementById("product_name").innerText = product_data['product_name'];

        }catch(e){
            console.log(e);
        }

    }
};

// Getting the product details
const product_id = localStorage.getItem("prod_id");
localStorage.removeItem("prod_id");

xmlhttp.open("GET", `database/getProductDetails.php?product_id=${product_id}`);
xmlhttp.send();
