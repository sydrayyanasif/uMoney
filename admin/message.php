<?php
    include 'header.php';

?>


        <!-- ======= Message ======= -->

        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>Messages</h2>
                    <div class="search">
                        <input type="search" placeholder="Search" id="live_search" autocomplete="off">
                    </div>
                    <i class="fa-solid fa-print" id="print-img" onclick="printFun('print')"></i>
                </div>
                <div id="print">

                    <table id="searchresult">
                        
                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Name</th>
                                <th>Gmail Id</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody id="searchresult1">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ======= End Message ======= -->

    </div>

    <script type="text/javascript">

        $(document).ready(function(){
            

            loaddata();
            function loaddata(){
                $.ajax({
                    url:"get-msg.php",
                    method:"POST",
                    success:function(data){
                        $("#searchresult1").html(data);
                    }
                });
            }


            $("#live_search").keyup(function(){
                search_table($(this).val());    
            });

            function search_table(value){
                $('#searchresult tbody tr').each(function(){
                    var found = 'false';
                    $(this).each(function(){
                        if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0){
                            found = 'true';
                        }
                    });
                    if(found == 'true'){
                        $(this).show();
                    }
                    else{
                        $(this).hide();
                    }
                });
            } 
                           
        });

    </script>

<?php
    include 'footer.php';
?>