function adjustPosition(country, left, top) {
  country.style.left = `${left}%`;
  country.style.top = `${top}%`;
}

document.addEventListener('DOMContentLoaded', function() {
  const countries = [
    'Lithuania','Poland','Germany','Italy','Spain','France','England','Norway',
    'Sweden','Turkey','Ukraine','Latvia','Estonia','Denmark','Finland'
  ];

  countries.forEach(country => {
    const mapPin = document.querySelector(`.${country}`);
    if (mapPin) {
      if (country == "Lithuania") adjustPosition(mapPin, 63, 30);
      if (country == "Poland") adjustPosition(mapPin, 57, 45);
      if (country == "Germany") adjustPosition(mapPin, 42, 46);
      if (country == "Italy") adjustPosition(mapPin, 45, 80);
      if (country == "Spain") adjustPosition(mapPin, 22, 92);
      if (country == "France") adjustPosition(mapPin, 30, 65);
      if (country == "England") adjustPosition(mapPin, 24, 45);
      if (country == "Norway") adjustPosition(mapPin, 39, 7);
      if (country == "Sweden") adjustPosition(mapPin, 48, 15);
      if (country == "Turkey") adjustPosition(mapPin, 80, 95);
      if (country == "Ukraine") adjustPosition(mapPin, 75, 57);
      if (country == "Latvia") adjustPosition(mapPin, 65, 20);
      if (country == "Estonia") adjustPosition(mapPin, 66, 10);
      if (country == "Denmark") adjustPosition(mapPin, 42, 26);
      if (country == "Finland") adjustPosition(mapPin, 65, 1);
    }
  })
});