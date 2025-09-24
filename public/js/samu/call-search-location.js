const URL_GEOCODE = 'https://geocode.search.hereapi.com/v1/geocode';
const ZOOM_SEARCH = 15;
let btnSearch = document.getElementById('btn-search');

function showError(msg) {
    hiddenSuccess();
    document.getElementById("danger-msg").innerHTML = msg;
    document.getElementById("danger-msg").style.display = 'block';
}

function showSuccess(msg) {
    hiddenError();
    document.getElementById("success-msg").innerHTML = msg;
    document.getElementById("success-msg").style.display = 'block';
}

function hiddenError() {
    document.getElementById("danger-msg").style.display = 'none';
}

function hiddenSuccess() {
    document.getElementById("success-msg").style.display = 'none';
}

btnSearch.addEventListener('click', (event) => {
    let address = document.getElementById('for-address');
    let commune = document.getElementById('for-commune');
    let country = 'chile';
    commune = (commune.value != '') ? commune.options[commune.selectedIndex].text : '';

    if (address.value != '') {
        getLocation(address.value, commune, country);
    } else {
        showError('El campo dirección es obligatorio para autoposicionar el pin en el mapa.');
    }
});

async function getLocation(address, commune, country) {
    try {
        const params = {
            q: `${address} ${commune} ${country}`,
            apiKey: API_KEY
        };
        const response = await axios.get(`${URL_GEOCODE}`, { params });
        let locations = response.data.items;

        if (locations.length != 0) {
            let location = locations[0].position;
            marker.setLatLng([location.lat, location.lng]);
            map.setView([location.lat, location.lng], ZOOM_SEARCH);
            inputLatitude.setAttribute('value', location.lat);
            inputLongitude.setAttribute('value', location.lng);
            showSuccess('El pin fue autoposicionado.');
        } else {
            showError('La dirección indicada no fue encontrada.');
        }
    } catch (error) {
        console.log(error);
        showError('Disculpe, en este momento no podemos buscar la dirección indicada.');
    }
}
