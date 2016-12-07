var isScrolling = false;
 
    window.addEventListener("scroll", throttleScroll, false);
 
    function throttleScroll(e) {
      if (isScrolling == false) {
        window.requestAnimationFrame(function() {
          scrolling(e);
          isScrolling = false;
        });
      }
      isScrolling = true;
    }
 
    document.addEventListener("DOMContentLoaded", scrolling, false);
    var topLine = document.querySelector(".hr");
    var brands = document.querySelector(".brands");
    var latestProducts = document.querySelector(".latestProducts");
 
    function scrolling(e) {
 
      if (isPartiallyVisible(brands)) {
        firstBox.classList.add("active");

        document.getElementById(header).style.background-color = #000;
      }
 
      if (isFullyVisible(latestProducts)) {
        secondBox.classList.add("active");
      }
    }
 
    function isPartiallyVisible(el) {
      var elementBoundary = el.getBoundingClientRect();
 
      var top = elementBoundary.top;
      var bottom = elementBoundary.bottom;
      var height = elementBoundary.height;
 
      return ((top + height >= 0) && (height + window.innerHeight >= bottom));
    }
 
    function isFullyVisible(el) {
      var elementBoundary = el.getBoundingClientRect();
 
      var top = elementBoundary.top;
      var bottom = elementBoundary.bottom;
 
      return ((top >= 0) && (bottom <= window.innerHeight));
    }