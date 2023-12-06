var currentSlide = 0;
var slides = document.querySelectorAll('.slide');
var totalSlides = slides.length;

function showSlide(index) {
    if (index < 0) {
    currentSlide = totalSlides - 1;
    } else if (index >= totalSlides) {
    currentSlide = 0;
    } else {
    currentSlide = index;
    }

    var newTransformValue = -currentSlide * 100 + '%';
    document.getElementById('slider').style.transform = 'translateX(' + newTransformValue + ')';
}

function nextSlide() {
    showSlide(currentSlide + 1);
}

function prevSlide() {
    showSlide(currentSlide - 1);
}


setInterval(nextSlide, 10000);