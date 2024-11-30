function myFunction(imgs) {
    // Get the expanded image
    var expandImg = document.getElementById("expandedImg");
    // Get the image text
    var imgText = document.getElementById("imgtext");
    // Use the same src in the expanded image as the image being clicked on from the grid
    expandImg.src = imgs.src;
    // Use the value of the alt attribute of the clickable image as text inside the expanded image
    imgText.innerHTML = imgs.alt;
    // Show the container element (hidden with CSS)
    expandImg.parentElement.style.display = "block";
  }
  let currentIndex = 0;
    let images = [];

    function openModal(img) {
        const modal = document.getElementById("myModal");
        const modalImg = document.getElementById("img01");
        modal.style.display = "block";
        modalImg.src = img.src;

        // Store all images in an array
        images = Array.from(document.querySelectorAll('.row img')).map(image => image.src);
        currentIndex = images.indexOf(img.src);
    }

    function closeModal() {
        const modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

    function changeSlide(n) {
        currentIndex += n;
        if (currentIndex >= images.length) {
            currentIndex = 0; // Loop back to the first image
        } else if (currentIndex < 0) {
            currentIndex = images.length - 1; // Loop back to the last image
        }
        const modalImg = document.getElementById("img01");
    }