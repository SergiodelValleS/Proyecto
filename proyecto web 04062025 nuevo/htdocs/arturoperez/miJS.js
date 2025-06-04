let cooldown = false; //Genera un mínimo de cooldown de 1s para el efecto de palabras saltonas
    /*
    document.addEventListener("click", function(event) {
      const mancha = document.createElement("div");
      mancha.style.transform = "translate(-50%, -50%)"; // Ajusta el centro como referencia
      mancha.textContent="palabra";
      mancha.className = "letter";
      mancha.style.backgroundColor = "red";

      const randomAngle = getRandomAngle();
      mancha.style.transform = `translate(-50%, -50%) rotate(${randomAngle}deg)`;
      
      mancha.style.top = (event.pageY - (Math.floor(Math.random()*40)-20))+"px";
      mancha.style.left = (event.pageX - (Math.floor(Math.random()*40)-20))+"px";
      document.body.appendChild(mancha);
    })*/
    document.addEventListener("mousemove", function(event) {
      if(!cooldown){
      const letter = document.createElement("div");
      letter.textContent = getRandomLetter();
      letter.className = "letter";
      letter.style.transform = "translate(-50%, -50%)"; // Ajusta el centro como referencia
      //Palabra cerca del puntero
      letter.style.top = (event.pageY - (Math.floor(Math.random()*40)-20))+"px";
      letter.style.left = (event.pageX - (Math.floor(Math.random()*40)-20))+"px";
      
       /*
      //Palabra exactamente donde puntero
      letter.style.left=event.pageX+"px";
      letter.style.top=event.pageY+"px";
      */
      // Aplica una rotación aleatoria entre -30° y 30° desde el centro
      const randomAngle = getRandomAngle();
      letter.style.transform = `translate(-50%, -50%) rotate(${randomAngle}deg)`;

      document.body.appendChild(letter);

      //Colores aleatorios
      setRandomTextColor(letter);
      setTimeout(() => {
        letter.remove();
      }, 600);
      cooldown = true;
      setTimeout(() => {
        cooldown = false;
      }, 500);
    }
    });

    function getRandomLetter() {
      const letters = ["experiencias", "poesía","espejo","amor","sentimientos"];
      return letters[Math.floor(Math.random() * letters.length)];
    }

    function getRandomAngle() {
      return Math.floor(Math.random() * 61) - 30;
    }

    function setRandomTextColor(element) {
      const red = Math.floor(Math.random() * 201); // Valor rojo entre 0 y 200
const green = Math.floor(Math.random() * 201); // Valor verde entre 0 y 200
const blue = Math.floor(Math.random() * 201); // Valor azul entre 0 y 200

  const randomColor = `rgb(${red}, ${green}, ${blue})`; // Formato de color RGB
  element.style.color = randomColor; // Aplica el color al texto del elemento
}