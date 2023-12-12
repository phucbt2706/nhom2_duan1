<?php
 $sta = new Statistic();
 $data = $sta->thong_ke_hang_hoa();
?>
<div>
    <div id="myChart" style="width:100%; max-width:1000px; height:500px;">
    </div>

    <script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        // Set Data
        const data = google.visualization.arrayToDataTable([
            ['Contry', 'Mhl'],
            <?php
            foreach ($data as $value) {
                echo "['".$value['cate_name']. " - " . $sta->get_name_parent($value['parent_id'])."', ".$value['num_cate']."],";
            }
            ?>
        ]);

        // Set Options
        const options = {
            title: 'Statistic for the number of product'
        };

        // Draw
        const chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);

    }
    </script>
</div>