<style>
    .form__border {
        margin: 0px 0px 20px 0px;
        border-bottom: 1px solid #000;
    }
</style>

<div class="form__border">
    <form method="post" id="formForm">
        <div class="form__body">
            <div class="form__item item-form">
                <div class="item-form__email">Почта</div>
                <input type="text" name="email" id="email">
            </div>
            <div class="form__item item-form">
                <div class="item-form__theme">Тема</div>
                <input type="text" name="theme" id="theme">
            </div>
            <div class="form__item item-form">
                <div class="item-form__text">Текст</div>
                <input type="text" name="text" id="text">
            </div>
            <input type="submit" id="formSubmit">
            <div class="message"></div>
        </div>
    </form>
    <div class="response"></div>
</div>

<script>
    $(document).ready(function() {
        $('#formSubmit').click(function(e) {
            e.preventDefault();

            const email = $("#email").val();
            const theme = $("#theme").val();
            const text = $('#text').val();
            const message = $('.message');
            const response = $('.response');

            $.ajax({
                url: '/form/server/serverForm.php',
                type: 'POST',
                data: {
                    email: email,
                    theme: theme,
                    text: text,
                },
                success: function(data) {
                    if (data == 1) {
                        message.html('<div>Email введен не верно!</div>');
                        return false;
                    } else {
                        message.html('<div>Сообщение успешно отправлено!</div>');
                        response.html(data);
                        setTimeout(function() {
                            jQuery('#formForm')[0].reset();
                        }, 1000);
                    }
                },
                error: function() {
                    message.html('<div>Ошибка сервера!</div>');
                }
            });
        });
    });
</script>
