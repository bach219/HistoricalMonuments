<?php require_once("includes/connection.php"); ?>
<?php include "includes/header.php" ?>

<div class="container">
    <br />
    <h2 align="center">Go see your favorite monuments</h2><br />
    <div class="form-group">
        <div class="input-group">
            <input type="text" name="search_text" id="search_text" placeholder="Search Monuments" class="form-control" />
        </div>
    </div>
    <br />
    <div id="result"></div>
</div>

<script>
    $(document).ready(function() {

        load_data();

        function load_data(query) {
            $.ajax({
                url: "fetch_ad.php",
                method: "POST",
                data: {
                    query: query
                },
                success: function(data) {
                    $('#result').html(data);
                }
            });
        }
        $('#search_text').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });
</script>
<?php include "includes/footer.php" ?>