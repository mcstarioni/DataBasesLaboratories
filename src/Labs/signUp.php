<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcstarioni
 * Date: 09.05.2018
 * Time: 0:02
 */
require_once "TemplateManager.php";
//session_start();
$manager = new TemplateManager();
$manager->getNavigation(getContentFunction());

function getContentFunction()
{
    if(TemplateManager::isLogged())
    {
        return "getSuccessForm";
    }
    else
    {
        return "getRegistrationForm";
    }
}
function getSuccessForm()
{
    ?>
    <div class="alert alert-primary">
        <h1>
            Вы успешно зарегистрированы как <?= $_SESSION["Username"];?>
        </h1>
    </div>
    <?php
}
function getRegistrationForm()
{
    if(isset($_SESSION["LoginError"]))
    {
        ?>
        <div class="alert alert-danger alert-dismissable">
            <?=$_SESSION["LoginError"]?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php
    }
    ?>
    <div>
        <h1>
            Моя форма
        </h1>
    </div>

    <form class="needs-validation" novalidate method="post" action="regSignUp.php">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationCustom01">Имя</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="First name"
                       value="Иван" required name = "Name">
                <div class="valid-feedback">
                    Здесь Ок!
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Фамилия</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="Last name"
                       value="Иванов" required name = "Surname">
                <div class="valid-feedback">
                    Здесь Ок!
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustomUsername">Username</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                    </div>
                    <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username"
                           aria-describedby="inputGroupPrepend" required name = "Username">
                    <div class="invalid-feedback">
                        Выберите имя пользователя!
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationCustom04">Страна</label>
                <select class="custom-select d-block w-100" id="validationCustom04" required name="Country">
                    <option value="">Выберите страну</option>
                    <option>Россия</option>
                </select>
                <!--                        <input type="text" class="form-control" id="" placeholder="State" required>-->
                <div class="invalid-feedback">
                    Please provide a valid state.
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom03">Город</label>
                <select class="custom-select d-block w-100" id="validationCustom03" required name="City">
                    <option value="">Выберите город</option>
                    <option>Москва</option>
                </select>
                <!--                        <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>-->
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="email">Email</label>
                <input type="email" required class="form-control" id="email" placeholder="you@example.com" name = "Email">
                <div class="invalid-feedback">
                    Некорректная почта.
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <label for = "firstPassword" class="col-md-2">
                    Введите пароль
            </label>
            <div class = "col-sm-4">
                <input type="password" class = "form-control" required id="firstPassword" name = "Password">
            </div>
        </div>
        <div class = "form-group row">
                <label for = "secondPassword" class="col-md-2">
                    Подтвердите пароль
                </label>
            <div class="col-md-4">
                <input type="password" class = "form-control" required id="secondPassword" name = "PasswordConfirm">
            </div>
        </div>
        <hr>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <?php
}
?>