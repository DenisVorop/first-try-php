<style>
    .form__border {
        margin: 0px 0px 20px 0px;
        border-bottom: 1px solid #000;
    }
</style>

<div class="form__border">
    <form method="post" id='calcForm'>
        <input type="text" name="first" id='first' required>
        <select name="operation" id='operation' required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="text" name="second" id='second' required>
        <input type="submit" name="submit" id="calcSubmit">
        <span id='block'></span>
    </form>
</div>

<script>
    // $(document).ready(function() {
    //     $("#calcSubmit").click(function(e) {
    //         e.preventDefault();

    //         const first = $("#first").val();
    //         const operator = $("#operation").val();
    //         const second = $("#second").val();

    //         $.post('./server/serverCalc.php', {
    //             first: first,
    //             operator: operator,
    //             second: second,
    //             success: function() {
    //                 jQuery('#calcForm')[0].reset();
    //             }
    //         }, function(data) {
    //             $("#block").text(data);
    //         });
    //     });
    // });

    $(document).ready(function() {
        $("#calcSubmit").click(function(e) {
            e.preventDefault();

            const first = $("#first").val();
            const operator = $("#operation").val();
            const second = $("#second").val();

            $.ajax({
                url: '/calculator/server/serverCalc.php',
                type: 'POST',
                data: {
                    first: first,
                    operator: operator,
                    second: second,
                },
                success: function(data) {
                    jQuery('#calcForm')[0].reset();
                    $("#block").text(data);
                }
            }
            // , function(data) {
                // $("#block").text(data);
            // });
            ); // comment
        });
    });
</script>
