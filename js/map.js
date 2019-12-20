ymaps.ready(function () {
    var location = ymaps.geolocation;
    var myMap = new ymaps.Map('map', {
        center: [55.76, 37.64],
        zoom: 10
    }, {
        searchControlProvider: 'yandex#search'
    });

// Получение местоположения и автоматическое отображение его на карте.
    location.get({
        mapStateAutoApply: true
    })
        .then(
            function(result) {
                // Получение местоположения пользователя.
                var userAddress = result.geoObjects.get(0).properties.get('text');
                var userCoodinates = result.geoObjects.get(0).geometry.getCoordinates();
                // Пропишем полученный адрес в балуне.
                result.geoObjects.get(0).properties.set({
                    balloonContentBody: 'Адрес: ' + userAddress +
                        '<br/>Координаты:' + userCoodinates
                });
                myMap.geoObjects.add(result.geoObjects)
            },
            function(err) {
                console.log('Ошибка: ' + err)
            }
        );
});