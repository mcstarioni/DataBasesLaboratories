<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcstarioni
 * Date: 09.05.2018
 * Time: 21:28
 */
require_once "TemplateManager.php";
//session_start();
$manager = new TemplateManager();
$manager->getNavigation("getFormContent");
function getFormContent()
{
    if (TemplateManager::isLogged()) {
        ?>
        <div class="alert alert-primary">
            <h1>
                Вы успешно вошли как <?= $_SESSION["Username"]; ?>
            </h1>
        </div>
        <?php
    } else {
        if(isset($_SESSION["LoginError"]))
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                Неверный логин или пароль
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            <?php
        }
        ?>
        <form action="./regSignIn.php" method="post"  class="needs-validation" novalidate>
            <div class="form-group">
                <label for="exampleInputEmail1">Электронная почта</label>
                <input type="text" name = "Username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                <div class="invalid-feedback">
                    Заполните это поле.
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" name = "Password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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
}