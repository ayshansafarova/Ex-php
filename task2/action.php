<html>
<body>

<?php

if(isset($_POST["submit"])) {

    $date1 = $_REQUEST["date1"]; //string
    $date2 = $_REQUEST["date2"];

    $count1 = 0;
    $count2 = 0;

    $dateTime1 = DateTime::createFromFormat("Y-m-d", $date1);
    $dateTime2 = DateTime::createFromFormat("Y-m-d", $date2);
    $period = new DatePeriod($dateTime1, new DateInterval('P1D'), $dateTime2);

    $holidays = array(
        "01-01" => "Yeni il",
        "01-02" => "Yeni il",
        "01-20" => "20 Yanvar",
        "03-08" => "Qadinlar gunu",
        "03-20" => "Novruz bayrami",
        "03-21" => "Novruz bayrami",
        "03-22" => "Novruz bayrami",
        "03-23" => "Novruz bayrami",
        "03-24" => "Novruz bayrami",
        "05-09" => "Qelebe gunu",
        "05-28" => "Respublika gunu",
        "06-15" => "Qurtulus gunu",
        "06-15" => "Ramazan bayrami",
        "06-16" => "Ramazan bayrami",
        "06-26" => "Silahli Quvveler gunu",
        "08-22" => "Qurban bayrami",
        "08-23" => "Qurban bayrami",
        "11-09" => "Bayraq gunu",
        "12-31" => "Hemreyliy gunu",
    );

    $length = count($holidays);

//    $timestamp1 = strtotime($date1); //int
//    $weekDay1 = idate("w", $timestamp1);
//    echo var_dump($date1);
}
?>
<div class="restDays">
    <h3>İstirahət günləri</h3>
    <ul>
        <?php
            foreach ($period as $key => $value){

                if($value -> format("w") == 0 || $value -> format("w") == 6){
                    echo "<li>" . $value -> format("Y-m-d") . "</li>";
                    $count1 ++;
                }

            }
        echo "<li class='same-day'>" . $count1 . "</li>";

        ?>
    </ul>
</div>
<div class="holidays">
    <h3>Qeyri-iş günləri</h3>
    <ul>
        <?php
//        $doc = new DOMDocument();
//        $ul = $doc->getElementsByTagName('ul')->item(1);
////        $node = $ul->childNodes->item(0);
//        $li = $doc->createElement('li');

            foreach ($period as $key => $value){
                foreach($holidays as $date_value => $date_key){
                    if ($value -> format("m-d") == $date_value ){
//                        if (array_count_values($holidays)[$date_value] > 1) {
//                            break;
//                        }
//                            $li->setAttribute('class', 'same-holiday');
//                            $ul->appendChild($li);
//                        }
                        echo "<li>" . $date_value . " - " . $date_key . "</li>";
                        $count2++;
                    }
                }
            }
        echo "<li class='same-day'>" . $count2 . "</li>";
        ?>
    </ul>
</div>
</body>
<style>
    .restDays{
        width: 50%;
        float: left;
    }
    .holidays{
        width: 50%;
        float: right;
    }

    h3{
        text-align: center;
    }

    .same-day{
        color: red;
    }
</style>
</html>