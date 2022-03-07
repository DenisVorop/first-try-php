<?php
// $param_default = '?';
// $param_filtered = '?filter_age=true';
// $param_filter = $_GET['filter_age'];

// if ($param_filter) {
//     $users_db = mysqli_query($db, 'SELECT * FROM `users_db` ORDER BY age');
// } else {
//     $users_db = mysqli_query($db, 'SELECT * FROM `users_db` ');
// }
?>

<div class="form__border" id="user-add-form">
    <div style="display: flex; padding: 0 0 20px 0;">
        <div>
            <h3>Добавить пользователя</h3>
            <div class="message-error-user"></div>
            <div>
                <div>
                    <span>Фильтрация</span>
                    <a href='<?php echo $param_filter=='' ? $param_filtered : $param_default ?>'>ssilka</a>
                </div>
                <form method="POST" id="user-form" #user-add-form>
                    <div class="form__body">
                        <div class="form__item item-form">
                            <div class="item-form__email">Имя</div>
                            <input type="text" name="first_name" id="first_name" value="<?php echo $_POST['first_name'] ?>">
                        </div>
                        <div class="form__item item-form">
                            <div class="item-form__theme">Фамилия</div>
                            <input type="text" name="last_name" id="last_name" value="<?php echo $_POST['last_name'] ?>">
                        </div>
                        <div class="form__item item-form">
                            <div class="item-form__text">Почта</div>
                            <input type="text" name="mail" id="mail" value="<?php echo $_POST['mail'] ?>">
                        </div>
                        <div class="form__item item-form">
                            <div class="item-form__text">Возраст</div>
                            <input type="text" name="age" id="age" value="<?php echo $_POST['age'] ?>">
                        </div>
                        <input type="submit" id="addUser" name='addUser'>
                    </div>
                </form>
            </div>
        </div>
        <div class="table__wrapper">
            <div class="table__row" style="margin: 20px 0px 0px 0px;">
                <div class="table__columns">
                    <div class="table__columns-titles">
                        <div class="table__columns-title">ID</div>
                        <div class="table__columns-title">FIRST NAME</div>
                        <div class="table__columns-title">LAST NAME</div>
                        <div class="table__columns-title">EMAIL</div>
                        <div class="table__columns-title">AGE</div>
                    </div>
                    <?php

                    while ($users = mysqli_fetch_assoc($users_db)) {
                        echo '
                <div class="table__user"><div class="table__column column-table">
                        <div class="column-table__map">' . $users['id'] . '</div>
                    </div>
                    <div class="table__column column-table">
                        <div class="column-table__map">' . $users['first_name'] . '</div>
                    </div>
                    <div class="table__column column-table">
                        <div class="column-table__map">' . $users['last_name'] . '</div>
                    </div>
                    <div class="table__column column-table">
                        <div class="column-table__map">' . $users['mail'] . '</div>
                    </div>
                    <div class="table__column column-table">
                        <div class="column-table__map">' . $users['age'] . '</div>
                    </div></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .table__columns-titles {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin: 0px 0px 20px 0px;
    }

    .table__columns-title {
        width: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: underline;
        font-weight: bold;
    }

    .table__user {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin: 0px 0px 20px 0px;
    }

    .table__user:last-child {
        margin: 0px 0px 0px 0px;
    }

    .column-table__map {
        width: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<script>
    $(document).ready(function() {
        $('#addUser').click(function(e) {
            e.preventDefault();

            const first_name = $("#first_name").val();
            const last_name = $("#last_name").val();
            const mail = $('#mail').val();
            const age = $('#age').val();
            const message = $('.message-error-user');

            const addUser = $('#addUser').val();

            $.ajax({
                url: '/usersTable/server/serverUsers.php',
                type: 'POST',
                data: {
                    first_name: first_name,
                    last_name: last_name,
                    mail: mail,
                    age: age,
                    addUser: addUser,
                },
                success: function(data) {
                    if (data == 1) {
                        message.html('<span style="color: green; font-weight: bold;">Пользователь добавлен!</span>');
                        setTimeout(function() {
                            jQuery('#user-form')[0].reset();
                            location.reload();
                        }, 1000);
                    } else {
                        message.html(data);
                        return false;
                    }
                },
                error: function() {
                    message.html('<span style="color: red; font-weight: bold;"> Ошибка сервера! </span>');
                }
            });
        });
    });
</script>
