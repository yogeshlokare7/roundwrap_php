<div class="container-fluid">
    <br/>
  
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"><i class="icon-th"></i></span> 
            <h5>User Role Table</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Active</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($index = 0; $index < 100; $index++) {
                        ?>

                        <tr class="gradeX">
                            <td>Trident</td>
                            <td>Internet
                                Explorer 4.0</td>
                            <td>Win 95+</td>
                            <td class="center">4</td>
                        </tr>

                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>