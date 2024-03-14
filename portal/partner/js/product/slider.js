let splide = new Splide("#product_crousal", {
  perPage: 1,
  rewind: true,
  // autoWidth: true,
  gap: "1rem",
  classes: {
    pagination: "splide__pagination product_pagination",
  },
});

splide.mount();
localStorage.setItem("splider", splide);
