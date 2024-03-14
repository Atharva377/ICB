// To select the images using the button
document.getElementById("product_images__btn").addEventListener("click", () => {
  document.getElementById("product_images").click();
});

// To set the images into preview

document.getElementById("product_images").addEventListener("change", () => {
  let data = Array.from(document.getElementById("product_images").files);
  const images = document.getElementsByClassName(
    "product_details__image_container__preview"
  )[0];
  data.forEach((element) => {
    const fileReader = new FileReader();
    fileReader.onloadend = () => {
      images.innerHTML += `
        <li class="splide__slide">
				<img src="${fileReader.result}" alt="" class="product_thumbnail">
        </li>
        `;
      // <img src="${fileReader.result}" class="product_thumbnail">
    };
    if (element) {
      fileReader.readAsDataURL(element);
    } else {
      images.innerHTML += `
      <img src="" class="product_thumbnail">
      `;
    }
    console.log(element);
  });
});
