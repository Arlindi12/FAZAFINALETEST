// =========================
// SLIDER HOME
// =========================
const slides = document.querySelectorAll('.slide');
const prevBtn = document.getElementById('prev');
const nextBtn = document.getElementById('next');

let currentSlide = 0;

function showSlide(index) {
  slides.forEach((slide, i) => {
    slide.classList.toggle('active', i === index);
  });
}

if (prevBtn && nextBtn) {
  prevBtn.addEventListener('click', () => {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
  });

  nextBtn.addEventListener('click', () => {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
  });

  setInterval(() => {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
  }, 5000);
}

// =========================
// ABOUT US GALLERY SLIDER
// =========================
const slidesGallery = document.querySelectorAll('.slide-gallery');
const prevGalleryBtn = document.getElementById('prev-gallery');
const nextGalleryBtn = document.getElementById('next-gallery');

let currentGallerySlide = 0;

function showGallerySlide(index) {
  slidesGallery.forEach((slide, i) => {
    slide.classList.toggle('active', i === index);
  });
}

if (prevGalleryBtn && nextGalleryBtn) {
  prevGalleryBtn.addEventListener('click', () => {
    currentGallerySlide = (currentGallerySlide - 1 + slidesGallery.length) % slidesGallery.length;
    showGallerySlide(currentGallerySlide);
  });

  nextGalleryBtn.addEventListener('click', () => {
    currentGallerySlide = (currentGallerySlide + 1) % slidesGallery.length;
    showGallerySlide(currentGallerySlide);
  });

  setInterval(() => {
    currentGallerySlide = (currentGallerySlide + 1) % slidesGallery.length;
    showGallerySlide(currentGallerySlide);
  }, 5000);
}
