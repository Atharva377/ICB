const url = window.location.search;
const urlParms = new URLSearchParams(url);
const pid = urlParms.get("pid");

if (pid) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const data = this.responseText;

      try {
        let json_data = JSON.parse(data);
        json_data = json_data[0];
        console.log(json_data);
        localStorage.setItem("product_details", JSON.stringify(json_data));

        // Fedding the data
        document.getElementById("product_name").innerText = json_data["name"];
        document.getElementById("description").innerText =
          json_data["description"];

        // console.log(document.getElementById("features_list").innerHTML);
        // document.getElementById("features_list").innerHtml = "";
        // console.log(document.getElementById("features_list"));
        const features_element = document.getElementById("features_list");
        for (let $i in json_data["features"]) {
          //   console.log(`<li>${json_data["features"][$i]}</li>`);
          features_element.innerHTML += `<li>${json_data["features"][$i]}</li>`;
        }
        // console.log(features_element);

        const addtional_info = document.getElementById("additioanl_info");

        for (let $i in json_data["additional_info"]) {
          //   console.log(`<li>${json_data["features"][$i]}</li>`);
          addtional_info.innerHTML += `<div class="product_details__container__details_additional">
          <div class="product_details__container__details_additional_key">${$i}</div>
          <div class="product_details__container__details_additional_value">${json_data["additional_info"][$i]}</div>
        </div>`;
        }

        const faq = document.getElementById("faq");
        console.log(Object.keys(json_data["faq"]));
        console.log(faq);
        for (let i = 1; i <= Object.keys(json_data["faq"]).length / 2; i++) {
          console.log(i);
          faq.innerHTML += `<div class="product_details__container__details__faq">
          <div class="product_details__container__details__faq__header">
            <div class="product_details__container__details__faq__question" id="faq_question_${i}">Q: ${
            json_data["faq"]["question" + i]
          }</div>
            <button class="product_details__container__details__faq__btn" id="faq_btn_${i}">+</button>
          </div>
          <div class="product_details__container__details__faq__answer" id="faq_answer_${i}">${
            json_data["faq"]["answer" + i]
          }</div>
        </div>`;
        }

        for (let i = 1; i <= Object.keys(json_data["faq"]).length / 2; i++) {
          document
            .getElementById(`faq_btn_${i}`)
            .addEventListener("click", () => {
              document
                .getElementById(`faq_answer_${i}`)
                .classList.toggle("display_faq");
            });
        }

        const photos_path = json_data["photos_paths"];
        // console.log(photos_path);

        const splider_track = document.getElementById("splide__track");
        // splide = localStorage.getItem("splider");
        // let slide_list = [];
        for (let i in photos_path) {
          splide.add(`<li class="splide__slide">
          <img src="../../${photos_path[i]}" id="slider_img_${i}" alt="slider_img_${i}">
      </li>`);
          //     splider_track.innerHTML += `<li class="splide__slide">
          //     <img src="../../${photos_path[i]}" alt="${
          //       photos_path[i].split("/")[-1]
          //     }">
          // </li>`;
          // splide.add(
          //   '<li class="splide__slide"><img src="../../${photos_path[i]}" alt="${photos_path[i].split("/")[-1]}"></li>'
          // );
        }

        // splide.add(slide_list);
        // splide.mount();
        // document.getElementById("product_name").innerText = json_data["name"];
        // document.getElementById("product_name").innerText = json_data["name"];
        // document.getElementById("product_name").innerText = json_data["name"];
        // document.getElementById("product_name").innerText = json_data["name"];
      } catch (e) {
        console.log(e);
      }
    }
  };
  xmlhttp.open("GET", `./database/fetchProductDetails.php?pid=${pid}`, true);
  xmlhttp.send();
}
