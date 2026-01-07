function adjustPosition(country, offsetX, offsetY) {
  country.style.left = `${offsetX}%`;
  country.style.top = `${offsetY}%`;
}

document.addEventListener('DOMContentLoaded', function() {
  const countries = [
    'Lithuania','Poland','Germany','Italy','Spain','France','England','Norway','Sweden',
    'Turkey','Ukraine','Netherlands','Belgium','Latvia','Estonia','Denmark','Finland'
  ];

  countries.forEach(country => {
    //Get country from id and class
    const countryPath = document.getElementById(country);
    const card = document.querySelector(`.${country}`);

    //If country exists, adjust card position
    if (countryPath && card) {
      if (country == "Lithuania") adjustPosition(card, 63, 30);
      if (country == "Poland") adjustPosition(card, 57, 45);
      if (country == "Germany") adjustPosition(card, 42, 46);
      if (country == "Italy") adjustPosition(card, 45, 80);
      if (country == "Spain") adjustPosition(card, 20, 92);
      if (country == "France") adjustPosition(card, 28, 65);
      if (country == "England") adjustPosition(card, 24, 45);
      if (country == "Norway") adjustPosition(card, 39, 7);
      if (country == "Sweden") adjustPosition(card, 48, 15);
      if (country == "Turkey") adjustPosition(card, 80, 95);
      if (country == "Ukraine") adjustPosition(card, 75, 57);
      if (country == "Netherlands") adjustPosition(card, 35, 52);
      if (country == "Belgium") adjustPosition(card, 35, 42);
      if (country == "Latvia") adjustPosition(card, 65, 20);
      if (country == "Estonia") adjustPosition(card, 66, 10);
      if (country == "Denmark") adjustPosition(card, 42, 26);
      if (country == "Finland") adjustPosition(card, 65, 1);
    }
  })
});