<?php 
$link = mysqli_connect('tajima.naviiiva.work','naviiiva_user','!Samurai1234','tajima');

$address = $_POST['address'];
var_dump($address);

$sql = "select * from corporate where sequenceNumber = '$address'";

try{
    $result = mysqli_query($link,$sql);
    if(is_bool($result)){
        if($result){
            echo '成功';
            echo '$result';
        }
        else{
        echo '失敗';
        }
    }
}
catch (Exception $e){
    echo "失敗しました"."<br>";
    echo $e->getMessage();
}

$data = array();
foreach($result as $row){
    $data[] = $row;
}
echo $data[0]['gaiyou'];

$today = date('Y-m-d');
$nextyear = date('Y-m-d',strtotime('1 year'));

?>

<!DOCTYPE html>
<html lang = 'ja'>
<head>
    <meta charset = 'UTF-8'>
    <link rel = 'stylesheet' href = 'corporate.css'>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgGX8OAMI2_1M1h8Mf-bKrf1fRJfLP4Es&v=beta"></script>
    <meta name = 'viewport' content = 'width=device-width,initial-scale = 1.0'>
    <title>求人紹介</title>
</head>

<body>

<div id = 'background'>
    <div>
        <form action="" method = 'POST'>
            <p>この求人に申し込む</p>
            <p>就労期間</p>
            <label for="startday">開始日</label>
            <input type="date" name = 'startday' value = '<?php echo $today ?>' min = '<?php echo $today ?>' max = '<?php echo $nextyear ?>'><br>
            <label for="endday">終了日</label>
            <input type="date" name = 'endday' value = '<?php echo $today ?>' min = '<?php echo $today ?>' max = '<?php echo $nextyear ?>'><br>
            <input type = 'submit' value = '申し込む'>
        </form>
    </div>
    <div>
        <gmp-map id = 'map' center="<?php echo $data[0]['lat'] ?>,<?php echo $data[0]['lng'] ?>
        " zoom="10" map-id="DEMO_MAP_ID" style="height: 400px"></gmp-map> 
            
        <div id = "map" style = "height: 400px"></div>
    </div>

</div>

<script src="//cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    var search = JSON.parse('<?php echo json_encode($data) ?>');
    console.log(search);

    function initMap() {
    const map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: search[0]['lat'], lng: search[0]['lng']},
    zoom: 4,
    center:myLatLng,
    //mapId: '919145284d041fa6',
  });

  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "Hello World!",
  });
  window.initMap = initMap;
}

//     const marker = new google.maps.marker({
//     position:{lat: search[0]['lat'], lng: search[0]['lng']},
//         map: map
//   });

//   marker.addListener('click', function(){
//     console.log('Marker wa clicked');
//   });
// }

initMap();

//     function initMap(){
//     const myLatLng = { lat: search[0]['lat'], lng: search[0]['lng'] };
//     const map = new google.maps.Map(document.getElementById("map"), {
//     zoom: 4,
//     center: myLatLng,
//   });

//   new google.maps.Marker({
//     position: myLatLng,
//     map,
//     title: "Hello World!",
//   });

// }
//window.initMap = initMap;


// const pin = new PinElement({
//     scale: 1.5,
// });
// const marker = new AdvancedMarkerElement({
//     map,
//     position: { lat: search[0]['lat'], lng: search[0]['lng'] },
//     content: pin.element,
// });    
// const advancedMarkers = [...document.querySelectorAll('gmp-advanced-marker')];
// for (let i = 0; i < advancedMarkers.length; i++) {
//   const pin = new PinElement({
//       scale: 2.0,
//   });

//   marker.appendChild(pin.element);
// }

// var myLatlng = new google.maps.LatLng(lat: search[0]['lat'], lng: search[0]['lng']);
// var mapOptions = {
//   zoom: 4,
//   center: myLatlng
// }
// var map = new google.maps.Map(document.getElementById("map"), mapOptions);

// var marker = new google.maps.Marker({
//     position: myLatlng,
//     title:"Hello World!"
// });

// // To add the marker to the map, call setMap();
// marker.setMap(map);

// Initialize and add the map
/*
let map;

async function initMap() {
  // The location of Uluru
  const position = {lat: search[0]['lat'], lng: search[0]['lng']};
  // Request needed libraries.
  //@ts-ignore
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

  // The map, centered at Uluru
   map = new Map(document.getElementById("map"), {
     zoom: 4,
     center: position,
     mapId: "DEMO_MAP_ID",
   });

  // The marker, positioned at Uluru
   const marker = new AdvancedMarkerElement({
     map: map,
     position: position,
     title: "Uluru",
   });
}

initMap();
*/

</script>


<script>
    var address = JSON.parse('<?php echo json_encode($data) ?>');
    console.log(address);
    var num = <?php echo $address ?>;

    // const background = document.getElementById('background');
    // const tablebox = document.createElement('div');
    // tablebox.id = 'tablebox';
    // const table = document.createElement('table');
    // const tr = document.createElement('tr');
    // const td = document.createElement('td');
    // const br = document.createElement('br');
    // const gaiyou = document.createTextNode('概要　' + address[num]['gaiyou']);
    // const name= document.createTextNode('企業名　' + address[num]['name']);
    // td.appendChild(gaiyou);
    // td.appendChild(br);
    // td.appendChild(name);
    // tr.appendChild(td);
    // table.appendChild(tr);
    // tablebox.appendChild(table);
    // background.appendChild(tablebox);

    const background = document.getElementById('background');
    const tablebox = document.createElement('div');
    tablebox.id = 'tablebox';
    const table = document.createElement('table');
    const tr = document.createElement('tr');
    const td = document.createElement('td');
    const br = document.createElement('br');
    const gaiyou = document.createTextNode('概要　' + address[0]['gaiyou']);
    const name= document.createTextNode('企業名　' + address[0]['name']);
    const img = document.createElement('img');
    // const button = document.createElement('button');
    // button.type = 'submit';
    // button.onclick = "location.href = 'https://tajima.naviiiva.work/original/corporate/corporate.php'";
    // button.name = 'address';
    // button.value = search[i]['address'];
    // const link = document.createTextNode('詳細');
    // img.alt = 'img' + [i+1];
    td.appendChild(gaiyou);
    td.appendChild(br);
    td.appendChild(name);
    td.appendChild(img);
    // button.appendChild(link);
    // td.appendChild(button);
    tr.appendChild(td);
    table.appendChild(tr);
    tablebox.appendChild(table);
    background.prepend(tablebox);
</script>
</body>

</html>