let buttonTwo = document.getElementById('two');
let divTwo = document.getElementsByTagName('div')[0];

buttonTwo.addEventListener('click', () => {
    fetch('https://restcountries.com/v3.1/all', {
        headers: { "Accept": "application/json" }
    })
        .then((response) => {
            return response.json();
        })
        .then((countries) => {
            let countryDetails = "";
            countries.forEach((country) => {
                countryDetails += `
                    <div>
                        <h3>${country.name.common}</h3>
                        <p>Capital: ${country.capital}</p>
                        <p>Population: ${country.population}</p>
                        <img src="${country.flags.png}" alt="${country.name.common} flag" style="height: 50px;">
                    </div>
                `;
            });
            divTwo.innerHTML = countryDetails;
        })
        .catch((e) => {
            console.log('oh no man, there is an error', e);
        });
});
