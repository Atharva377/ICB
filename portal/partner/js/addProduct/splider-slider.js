const splide = new Splide("#image_carousel", {
  perPage: 1,
  rewind: true,
  gap: "1rem",
}).mount();

document.getElementById("product_images").addEventListener("change", () => {
  let data = Array.from(document.getElementById("product_images").files);
  const images = document.getElementsByClassName(
    "product_details__image_container__preview"
  )[0];

  console.log(data);

  let paths = [];
  data.forEach((element) => {
    console.log(element.webkitRelativePath());
    const fileReader = new FileReader();
    fileReader.onloadend = () => {
      //   images.innerHTML += `
      //       <li class="splide__slide">
      //               <img src="${fileReader.result}" alt="" class="product_thumbnail">
      //       </li>
      //       `;
      //   // <img src="${fileReader.result}" class="product_thumbnail">
      // class="product_thumbnail"
      //       splide.add(`<li class="splide__slide">
      // <img src="../images/arduino 2.jpg" alt="">
      // </li>`);
      paths.push(fileReader.result);
      //       splide.add(`<li class="splide__slide">
      // <img src="${fileReader.result}" alt="" class="product_thumbnail">
      // </li>`);
    };
    // console.log("Slider triggered here");
    if (element) {
      fileReader.readAsDataURL(element);
    }
    // else {
    //   splide.add(`<li class="splide__slide">
    //     <img src="" alt="" class="product_thumbnail">
    //     </li>`);
    // }
    // console.log(element);
  });
  console.log(paths);
  paths.forEach((element) => {
    splide.add(`<li class="splide__slide">
      // <img src="${element}" alt="" class="product_thumbnail">
      // </li>`);
  });

  //   splide.mount();
});

// console.log(splide);

splide.add(`<li class="splide__slide">
<img src="../images/arduino 2.jpg" alt="" class="product_thumbnail">
</li>`);
