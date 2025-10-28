document.addEventListener('DOMContentLoaded', () => {
  const toggleBtn = document.getElementById('toggleBtn');
  const barraLateral = document.getElementById('barra-lateral'); 

  toggleBtn.addEventListener('click', () => {
    barraLateral.classList.toggle('expandido');
  });

  const cards = document.querySelectorAll('.card-hover');
  cards.forEach((card, index) => {
    card.addEventListener('mousemove', (e) => {
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const centerX = rect.width / 2;
      const centerY = rect.height / 2;
      const rotateX = ((y - centerY) / centerY) * 10;
      const rotateY = ((x - centerX) / centerX) * 10;
      card.style.transform = `rotateX(${-rotateX}deg) rotateY(${rotateY}deg) scale(1.05)`;
    });

    card.addEventListener('mouseleave', () => {
      card.style.transform = 'rotateX(0deg) rotateY(0deg) scale(1)';
    });

    card.addEventListener('click', () => {
      switch (index) {
        case 0: window.location.href = 'Cards_AutoWake.html'; break;
        case 1: window.location.href = 'pagina2.html'; break;
        case 2: window.location.href = 'pagina3.html'; break;
        case 3: window.location.href = 'pagina4.html'; break;
      }
    });
  });

  const texts = ["Inovação", "Qualidade", "Compromisso"];
  let textIndex = 0;
  const animatedText = document.getElementById('animated-text');

  if (animatedText) {
    const changeText = () => {
      animatedText.style.opacity = 0;

      setTimeout(() => {
        textIndex = (textIndex + 1) % texts.length;
        animatedText.textContent = texts[textIndex];
        animatedText.style.opacity = 1;

        setTimeout(changeText, 2000);
      }, 500);
    }

    changeText();
  }
});
