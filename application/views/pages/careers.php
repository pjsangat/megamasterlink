

<div class="content">
    <div class="header-image">
        <div class="header">JOIN OUR TEAM</div>
        <div class="sub-header">With you, we'll make things possible.</div>
    </div>

    <table id="careers" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th width="200" data-priority="1">Position</th>
                <th width="100" >Department</th>
                <th width="100">Employment Type</th>
                <th>Qualifications</th>
                <th width="100"></th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(!empty($careers)){
                    foreach($careers as $career){
                        echo '<tr>';
                            echo '<td>'.$career->position.'</td>';
                            echo '<td>'.$career->department.'</td>';
                            echo '<td>'.$career->emp_type.'</td>';
                            echo '<td>'.$career->qualifications.'</td>';
                            echo '<td style="text-align: center;vertical-align: middle;"><a class="btn btn-primary" href="mailto:info@megamasterlink.com.ph?subject=Mega Masterlink Application::'.$career->position.'">Quick Apply</a></td>';
                        echo '</tr>';
                    }
                }
            ?>
        <tbody>
    </table>
</div>