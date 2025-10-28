//const ul = document.querySelector("#particles-container");
//
//const random = (min, max) => Math.random() * (max - min) + min;
//const randomColor = ["#2b4c7e", "#567ebb", "#606d80"];
//
//for (let i = 0; i < 50; i++) {
//    const li = document.createElement("li");
//
//    const size = Math.floor(random(50, 120));
//    const positionX = random(1, 95); 
//    const animationDelay = random(0, 3); 
//    const animationDuration = random(2, 6); 
//
//    li.style.width = `${size}px`;
//    li.style.height = `${size}px`;
//    li.style.backgroundColor = randomColor[Math.floor(random(0, 3))];
//    li.style.left = `${positionX}%`;
//    li.style.animationDelay = `${animationDelay}s`;
//    li.style.animationDuration = `${animationDuration}s`;
//    li.style.animationTimingFunction = 'cubic-bezier(' + random(0, 1) + ',' + random(0, 1) + ',' + random(0, 1) + ',' + random(0, 1) + ')';
//
//    ul.appendChild(li);   
//}
//
//
//function getCookie(nome) {
//        const cookies = document.cookie.split(';');
//        for (let i = 0; i < cookies.length; i++) {
//        const c = cookies[i].trim();
//        if (c.indexOf(nome + "=") === 0) {
//            return c.substring((nome + "=").length, c.length);
//        }
//    } 
//}