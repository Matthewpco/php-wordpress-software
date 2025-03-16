document.addEventListener('DOMContentLoaded', function() {

    // Select all items
    const items = document.querySelectorAll('#poh-di-b-lpp-sixth-section-card-container > div');
    const sourcesLarge = ["/wp-content/plugins/poh-di-b-lpp/inc/media/process-image1-large.webp", "/wp-content/plugins/poh-di-b-lpp/inc/media/process-image2-large.webp", "/wp-content/plugins/poh-di-b-lpp/inc/media/process-image3-large.webp"];
    const sourcesSmall = ["/wp-content/plugins/poh-di-b-lpp/inc/media/process-image1-small.webp", "/wp-content/plugins/poh-di-b-lpp/inc/media/process-image2-small.webp", "/wp-content/plugins/poh-di-b-lpp/inc/media/process-image3-small.webp"];

    function modifySizes() {
      // Increase the size of the item and display the list after a mouse enter event
      this.style.flexGrow = 3;
      this.querySelector('p').style.display = "block";
  
      // Adjust the other items to shrink and to hide their list's
      items.forEach((item, index) => {
        if (item === this) {
            item.querySelector('img').src = sourcesLarge[index];
        } else {
            item.style.flexGrow = 1;
            item.querySelector('p').style.display = "none";
            item.querySelector('img').src = sourcesSmall[index];
        }
      });
    }
  
    function checkWindowSize() {
      return window.innerWidth >= 1023;
    }
      
    function addListeners() {
      items.forEach((item, index) => {
        item.querySelector('p').style.display = index == 0 ? "block" : "none";
        item.addEventListener('mouseenter', modifySizes);
      });
    }
  
    function removeListeners() {
      items.forEach((item, index) => {
        item.removeEventListener('mouseenter', modifySizes);
        item.querySelector('p').style.display = "block";
        item.querySelector('img').src = sourcesLarge[index];
      });
    }
  
    if (checkWindowSize()) {
      addListeners();
    } else {
      removeListeners();
    }
    
    window.addEventListener('resize', function() {
        if (checkWindowSize()) {
          addListeners();
        } else {
          removeListeners()
        }
    });
  
  });


