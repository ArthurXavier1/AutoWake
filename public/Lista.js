    function atualizarRelogio() {
      const agora = new Date();
      document.getElementById('relogio').textContent = agora.toLocaleTimeString();
    }
    setInterval(atualizarRelogio, 1000);
    atualizarRelogio();
