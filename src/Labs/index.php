<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcstarioni
 * Date: 10.05.2018
 * Time: 2:10
 */
//session_start();
require_once "TemplateManager.php";
//session_start();
$manager = new TemplateManager();
$manager->getNavigation("indexContentFunction");
function indexContentFunction()
{
    ?>
    <div>
        <h1> Добро пожаловать</h1>
        <p>На данном ресурсе вы можете посмотреть демонстрацию
            лабораторных работ по предмету "Распределенные базы данных",
            выполненные студентом группы
            <strong>ИКБО-01-15</strong>
        Тарасовым М.А.
        </p>
        <div id="carouselExampleControls" class="carousel slide bg-alert" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="resources/Screenshot_130.png" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="resources/Screenshot_131.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="resources/Screenshot_132.png" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
<?php
}
