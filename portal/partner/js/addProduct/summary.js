window.addEventListener("storage", () => {
  console.log(localStorage.getItem("product_name"));
  if (localStorage.getItem("product_name")) {
    document
      .getElementById("summary_p_name_value")
      .innerText(localStorage.getItem("product_name"));
  }
});

// keywords	as
// category	as
// mrp	as
// icb_price	as
// description	asfasf
// feature_1_key	as
// feature_1_value	asf
// feature_2_key	asfa
// feature_2_value	asfas
// faq_1_key	afsa
// faq_1_value	afa
// faq_2_key	asfas
// faq_2_value
