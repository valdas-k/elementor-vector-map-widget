//Calculate the path center of a country
function getPathCenter(path) {
  const pathLength = path.getTotalLength();
  const point = path.getPointAtLength(pathLength / 2);
  return point;
}

//Additional position settings
function adjustPosition(country, offsetX, offsetY) {
  const currentLeft = parseFloat(country.style.left);
  const currentTop = parseFloat(country.style.top);
  country.style.left = `${currentLeft + offsetX}px`;
  country.style.top = `${currentTop + offsetY}px`;
}

document.addEventListener('DOMContentLoaded', function() {
  //All countries
  const countries = [
    'Ireland', 'Italy', 'Norway', 'Sweden', 'Netherlands', 'Germany', 'Ukraine', 'Lithuania', 'Latvia', 'Estonia',
    'Finland', 'Spain', 'Portugal', 'England', 'Denmark', 'France', 'Belgium', 'Turkey', 'Poland', 'Iceland'
  ];

  //Get map width and height
  const map = document.getElementById("europe-map");
  const svgWidth = map.clientWidth;
  const svgHeight = map.clientHeight;

  countries.forEach(country => {
    //Get country from id
    const countryPath = document.getElementById(country);
    //Get country form class
    const card = document.querySelector(`.${country}`);

    if (countryPath && card) {
      //If country exists, get path center
      const center = getPathCenter(countryPath);

      //Country position scales based on map dimensions
      const scaledX = (center.x / svgWidth) * map.width.baseVal.value;
      const scaledY = (center.y / svgHeight) * map.height.baseVal.value;

      //Photo gets added to the map
      card.style.left = `${scaledX - card.offsetWidth / 4}px`;
      card.style.top = `${scaledY - card.offsetHeight / 2}px`;

      //Extra changes
      if (country == "Portugal") {
        adjustPosition(card, 100, 100);
      }
    }
  })
});