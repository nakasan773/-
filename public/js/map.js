var map;
var marker;
var infoWindow;

function initMap() {

    //マップ初期表示の位置設定
    var target = document.getElementById('target');
    var centerp = {lat: 35.6585769, lng: 139.7454506};

    map = new google.maps.Map(target, {
        center: centerp,
        zoom: 5,
    });

document.getElementById('search').addEventListener('click', function() {

    var place = document.getElementById('keyword').value;
    var geocoder = new google.maps.Geocoder();

    geocoder.geocode({
        address: place
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {

            var bounds = new google.maps.LatLngBounds();

            for (var i in results) {
                if (results[0].geometry) {
                // 緯度経度を取得
                var latlng = results[0].geometry.location;
                // 住所を取得
                var address = results[0].formatted_address;
                // 検索結果地が含まれるように範囲を拡大
                bounds.extend(latlng);
                // マーカーのセット
                setMarker(latlng);
                // マーカーへの吹き出しの追加
                setInfoW(place, latlng, address);
                // マーカーにクリックイベントを追加
                markerEvent();
            }
        }
        } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
            alert("見つかりません");
        } else {
            console.log(status);
            alert("エラー発生");
        }
    });

});

document.getElementById('clear').addEventListener('click', function() {
        deleteMakers();
    });

}

function setMarker(setplace) {

    deleteMakers();

    var iconUrl = 'http://maps.google.com/mapfiles/ms/icons/red-dot.png';
    marker = new google.maps.Marker({
        position: setplace,
        map: map,
        icon: iconUrl
    });
}

function deleteMakers() {
    if(marker != null){
        marker.setMap(null);
    }
    marker = null;
}

function setInfoW(place, latlng, address) {
        infoWindow = new google.maps.InfoWindow({
        content: "<a href='http://www.google.com/search?q=" + place + "' target='_blank'>" + place + "</a><br><br>" + latlng + "<br><br>" + address + "<br><br><a href='http://www.google.com/search?q=" + place + "&tbm=isch' target='_blank'>いろんな画像を見る</a>"
    });
}

function markerEvent() {
    marker.addListener('click', function() {
        infoWindow.open(map, marker);
    });
}