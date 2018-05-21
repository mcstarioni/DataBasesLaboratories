<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcstarioni
 * Date: 09.05.2018
 * Time: 22:34
 */
function isLogged()
{
    return $_SESSION["auth"] == true;
}
function getLoginBar()
{
    if(isLogged())
    {
        return 'getAuthBar';
    }
    else
    {
        return 'getNotAuthBar';
    }
}
function getNotAuthBar()
{
    ?>
    <div class="navbar nav-item ml-auto">
        <button type="button" class="btn btn-dark nav-item">Регистрация</button>
        <button type="button" class="btn btn-dark nav-item">Войти <i class="fas fa-sign-in-alt"></i></button>
    </div>
    <?php
}
function getAuthBar()
{
    ?>
    <div class="navbar nav-item ml-auto">
        <div class="nav-item navbar-text">Здравствуйте, <?= $_SESSION["username"]?></div>
        <button type="button" class="btn btn-dark nav-item">Выйти <i class="fas fa-sign-in-alt"></i></button>
    </div>
    <?php
}