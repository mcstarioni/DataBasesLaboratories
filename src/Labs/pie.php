<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcstarioni
 * Date: 17.05.2018
 * Time: 2:18
 */
require_once "TemplateManager.php";
require_once "Manager.php";
$manager = new TemplateManager();
$manager->getNavigationHeader("getBody","getHeader");
function getHeader()
{
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php
                $con = \server\Manager::getConnection();
                $res = $con->query("SELECT type, SUM(msg_count) as total FROM dialogs 
                INNER JOIN (SELECT dialog_id, 
                COUNT(msg_id) as msg_count FROM messages GROUP BY dialog_id) 
                as t2 on dialogs.dialog_id = t2.dialog_id GROUP BY type ORDER BY total DESC ;");
                $names = array(0 => "Личные сообщения", 1 => "Конференции", 2 => "Каналы");
                $i = $res->num_rows;
                while($row = $res->fetch_assoc())
                {
                    $i--;
                    echo "['".$names[$row["type"]]."',".$row["total"]."]".($i>0?",":"");
                }
                ?>
            ]);

            var options = {
                title: 'Распределение сообщений по типам чатов'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
<?php
}
function getBody()
{
    ?>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
<?php
}