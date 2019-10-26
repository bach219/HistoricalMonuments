<?php
if (isset($_SESSION['username']) && $_SESSION['username']) {
    ?>
    </tbody>
    </table>   
    </div>
    </body>
    </html>
    <script>
        var table = {};
        $(document).ready(function () {
            table = $('#tbl').DataTable();
        });

        $(".remove").click(function () {
            var id = $(this).parents("tr").attr("id");
            if (confirm('Are you sure to delete <?php echo $_SESSION['title']; ?>_id = ' + id + ' ?'))
            {
                $.ajax({
                    url: '<?php echo $_SESSION['title']; ?>.php',
                    type: 'GET',
                    data: {id: id},
                    error: function () {
                        alert('Something is wrong');
                    },
                    success: function (data) {
                        $("#" + id).remove();
                        swal({
                            title: "Delete successfully!",
                            text: "<?php echo $_SESSION['title']; ?>_id = " + id + " is deleted!",
                            icon: "success",
                            button: "OK",
                        });
                        //toastr.options.timeOut = 10000;//10s
                        //toastr["success"](data);
                        //alert("Record removed successfully");  
                    }
                });
            }
        });


        $(".delall").click(function () {
            var table = "<?php echo $_SESSION['title']; ?>";
            if (confirm('Are you sure to delete all record ?'))
            {
                $.ajax({
                    url: '<?php echo $_SESSION['title']; ?>.php',
                    type: 'GET',
                    data: {table: table},
                    error: function () {
                        alert('Something is wrong');
                    },
                    success: function (data) {
                        $("#myTable").remove();
                        swal({
                            title: "DELETE ALL RECORDS SUCCESSFULLY!",
                            text: "Mission completed!",
                            icon: "success",
                            button: "OK",
                        });
                        //toastr.options.timeOut = 100000;//10s
                        //toastr["success"](data);
                        //alert("Record removed successfully");  
                    }
                });
            }
        });

        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

    </script>
    <?php
} else {
    echo 'You did not <a href="login.php">login</a>';
}

