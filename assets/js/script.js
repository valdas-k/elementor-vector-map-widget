function adjustPosition(country, offsetX, offsetY) {
  country.style.left = `${offsetX}%`;
  country.style.top = `${offsetY}%`;
}

document.addEventListener('DOMContentLoaded', function() {
  const countries = [
    'Lithuania','Poland','Germany','Italy','Spain','France','England','Norway',
    'Sweden','Turkey','Ukraine','Latvia','Estonia','Denmark','Finland'
  ];

  countries.forEach(country => {
    //If country exists, adjust card position
    const countryPath = document.getElementById(country);
    const card = document.querySelector(`.${country}`);
    if (countryPath && card) {
      if (country == "Lithuania") adjustPosition(card, 63, 30);
      if (country == "Poland") adjustPosition(card, 57, 45);
      if (country == "Germany") adjustPosition(card, 42, 46);
      if (country == "Italy") adjustPosition(card, 45, 80);
      if (country == "Spain") adjustPosition(card, 22, 92);
      if (country == "France") adjustPosition(card, 30, 65);
      if (country == "England") adjustPosition(card, 25, 45);
      if (country == "Norway") adjustPosition(card, 39, 7);
      if (country == "Sweden") adjustPosition(card, 48, 15);
      if (country == "Turkey") adjustPosition(card, 80, 95);
      if (country == "Ukraine") adjustPosition(card, 75, 57);
      if (country == "Latvia") adjustPosition(card, 65, 20);
      if (country == "Estonia") adjustPosition(card, 66, 10);
      if (country == "Denmark") adjustPosition(card, 42, 26);
      if (country == "Finland") adjustPosition(card, 65, 1);
    }
  })
});