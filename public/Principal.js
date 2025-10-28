 const cards = document.querySelectorAll('.card');
    let activeIndex = 0;

    function updateCarousel() {
      cards.forEach((card, i) => {
        const offset = (i - activeIndex + cards.length) % cards.length;

        if (offset === 0) {
          card.style.transform = 'translateX(0) scale(1.2)';
          card.style.zIndex = 2;
          card.style.opacity = 1;
        } else if (offset === 1) {
          card.style.transform = 'translateX(250px) scale(0.9)';
          card.style.zIndex = 1;
          card.style.opacity = 0.7;
        } else {
          card.style.transform = 'translateX(-250px) scale(0.9)';
          card.style.zIndex = 1;
          card.style.opacity = 0.7;
        }
      });
    }

    document.querySelector('.prev-btn').addEventListener('click', () => {
      activeIndex = (activeIndex - 1 + cards.length) % cards.length;
      updateCarousel();
    });

    document.querySelector('.next-btn').addEventListener('click', () => {
      activeIndex = (activeIndex + 1) % cards.length;
      updateCarousel();
    });

    updateCarousel();

  document.getElementById('btn-saiba-mais').addEventListener('click', function() {
  const target = document.getElementById('historia');
  const navbarHeight = document.querySelector('nav') ? document.querySelector('nav').offsetHeight : 0;
  const targetPosition = target.getBoundingClientRect().top + window.scrollY - navbarHeight;
  window.scrollTo({
    top: targetPosition,
    behavior: 'smooth'
  });
});
