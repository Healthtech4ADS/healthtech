document.querySelector(".sidebar").addEventListener("click", function () {
  this.classList.toggle("active");
  document.querySelector(".total").classList.toggle("sidebar-active");
});

