<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcstarioni
 * Date: 09.05.2018
 * Time: 17:22
 *
 */
require_once "Manager.php";
require_once "TemplateManager.php";
$manager = new TemplateManager();
$manager->getNavigationHeader("getChart","getScript");
function getChart()
{?>
    <div id="table_div"></div>
<?php
}
function getScript()
{?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['table']});
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Username');
            data.addColumn('string', 'Имя');
            data.addColumn('string', 'Фамилия');
            data.addRows([
                <?php
                    $con = \server\Manager::getConnection();
                    $res = $con->query("SELECT login,name,surname FROM users;");
                    $i = $res->num_rows;
                    $hc = "'";
                    $coma = ", ";
                    $sep = $hc.$coma.$hc;
                    while ($row = $res->fetch_assoc())
                    {
                        $i--;
                        echo "[".$hc.$row["login"].$sep.$row["name"].$sep.$row["surname"].$hc."]".($i>0?$coma:"");
                    }
                ?>
            ]);

            var table = new google.visualization.Table(document.getElementById('table_div'));

            table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
        }
    </script>
<?php
}
//getTemplate('getChart','getScript');