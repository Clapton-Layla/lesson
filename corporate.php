<?php 

session_start();

$link = mysqli_connect();

$address = $_REQUEST['address'];
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
var_dump($data).'<br>';

$today = date('Y-m-d');
$nextyear = date('Y-m-d',strtotime('1 year'));

$favorite = array();
if(isset($_REQUEST['favorite'])){
    $favorite = $_REQUEST['favorite'];
    $_SESSION['favorite'] = $favorite;
    var_dump($favorite);
}
?>

<!DOCTYPE html>
<html lang = 'ja'>
<head>
    <meta charset = 'UTF-8'>
    <link rel = 'stylesheet' href = 'corporate.css'>
    <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1bWLAbrI0l0gPiJxonc4at-7cvdoBF0I&v=beta"></script>-->
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&loading=async&v=beta" async></script>
    <meta name = 'viewport' content = 'width=device-width,initial-scale = 1.0'>
    <title>求人紹介</title>
</head>

<body>

<div id = 'background'>
    <div>
        <?php echo  $data[0]['name'] ?>
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
        <form action="" method = 'POST'>
            <button type = 'submit' name = 'favorite' value = <?php echo $address ?>>お気に入り</button>
        </form>
    </div>

    <a href="../top/top.php">TOPに戻る</a>

    <div>
        <!-- <gmp-map id = 'map' center="<?php echo $data[0]['lat'] ?>,<?php echo $data[0]['lng'] ?>
        " zoom="10" map-id="DEMO_MAP_ID" style="height: 400px"></gmp-map>  -->
            
        <div id = "map" style = "height: 400px"></div>
    </div>

</div>

<script src="//cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    function initMap() {
        var search = JSON.parse('<?php echo json_encode($data) ?>');
        console.log(search[0]['lat']);

        const map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(search[0]['lat'], search[0]['lng']),
            //center: {lat: parseFloat(search[0]['lat']), lng: parseFloat(search[0]['lng'])},
            zoom: 15,
            //center:myLatLng,
        });

        new google.maps.Marker({
            //position: myLatLng,
            //position: {lat: search[0]['lat'], lng: search[0]['lng']},
            position: new google.maps.LatLng(search[0]['lat'], search[0]['lng']),
            map,
            title: "Hello World!",
        });
//   window.initMap = initMap;
}


</script>


<script>
    var address = JSON.parse('<?php echo json_encode($data) ?>');
    console.log(address);
    var num = <?php echo $address ?>;


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
   
    td.appendChild(gaiyou);
    td.appendChild(br);
    td.appendChild(name);
    td.appendChild(img);
   
    tr.appendChild(td);
    table.appendChild(tr);
    tablebox.appendChild(table);
    background.prepend(tablebox);
</script>
</body>

</html>