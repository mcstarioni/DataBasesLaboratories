<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcstarioni
 * Date: 09.05.2018
 * Time: 22:34
 */
//require "template.php";
require_once "TemplateManager.php";
function getMainBar()
{
    if(TemplateManager::isLogged())
    {
        ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                Лабораторные
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="table.php">Таблица</a>
                <a class="dropdown-item" href="pie.php">Графики</a>
                <a class="dropdown-item" href="pie.php">Еще элемент</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="export.php">Экспорт документов</a>
            </div>
        </li>
        <?php
    }
}
function getNotAuthBar()
{
    ?>
    <div class="navbar nav-item ml-auto">
        <form action="signUp.php"><button type="submit" class="btn btn-dark nav-item" >Регистрация</button></form>
        <form action="signIn.php"><button type="submit" class="btn btn-dark nav-item">Войти <i class="fas fa-sign-in-alt"></i></button></form>
    </div>
    <?php
}
function getAuthBar()
{
    ?>
    <div class="navbar nav-item ml-auto">
        <div class="nav-item navbar-text">Здравствуйте, <strong><?= $_SESSION["Username"]?></strong></div>
<!--        <form action="regSignOut.php">-->
            <a href="regSignOut.php" class="btn btn-dark nav-item">Выйти <i class="fas fa-sign-in-alt"></i></a>
<!--        </form>-->
    </div>
    <?php
}