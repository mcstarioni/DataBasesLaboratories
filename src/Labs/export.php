<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcstarioni
 * Date: 17.05.2018
 * Time: 3:38
 */
require_once "TemplateManager.php";
$manager = new TemplateManager();
$manager->getNavigation("getBody");
function getBody()
{
    ?>
    <div>
    <h1>
        Экспорт данных
    </h1>
    <p>
        На данной страницы вы можете получить данные в нужном формате, или изменить их онлайн
    </p>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Получить ссылку на отчет о пользователях</span>
            </div>
            <a href = "https://docs.google.com/document/d/17AZlcwBcQYBGH1jfTajgPXsLPlhuYL8-bY4kaYQfUpE/edit?usp=sharing" class = " btn btn-primary">
                Word <i class="fas fa-arrow-alt-circle-down"></i>

            </a>
        </div>
        <hr>
    <a href = "https://docs.google.com/spreadsheets/d/1pZHbt7a7bhYrWuExvhPtwBIvgP5BayLPHMAE3G8nv_Y/edit?usp=sharing" class = "btn btn-success ">
        Excel
    </a>
        <a href = "exportExcel.php" class = "btn btn-warning">
            Download
        </a>
    </div>
<?php
}