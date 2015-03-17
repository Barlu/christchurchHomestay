

<section>


    <h1 id="dashboard-heading">Dashboard</h1>

    <?php
    if ($this->session->flashdata('success')) {
        echo '<div class="alert alert-success"><p>' . $this->session->flashdata('success') . '</p></div>';
    }
    ?>


    <div role="tabpanel">

        <!-- Nav tabs -->
        <ul id="admin-nav" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#bookings" aria-controls="bookings" role="tab" data-toggle="tab">Bookings<i class="fa fa-book middle"></i></a></li>
            <li role="presentation"><a href="#calander" aria-controls="calander" role="tab" data-toggle="tab">Calander<i class="fa fa-calendar middle"></i></a></li>
            <li role="presentation"><a href="#history" aria-controls="history" role="tab" data-toggle="tab">History<i class="fa fa-folder-open middle"></i></a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings<i class="fa fa-cogs middle"></i></a></li>
            <li><a class='add-link' href="<?php echo base_url(); ?>index.php/admin/add_edit/booking">New<i class="fa fa-plus middle"></i></a></li>
        </ul>

        <!-- Tab panes -->
        <div class="admin tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="bookings">
                <?php
                if (!empty($bookings)) {
                    echo $this->table->generate($table_array);
                } else {
                    echo '<p>Currently no bookings</p>';
                }
                ?>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="calander-wrap"></div>
            <div role="tabpanel" class="tab-pane fade" id="history">...</div>
            <div role="tabpanel" class="tab-pane fade" id="settings">...</div>
        </div>

    </div>
</section>

<a class='add-link' href="<?php echo base_url(); ?>index.php/admin/add_edit/booking">Add Room<i class="fa fa-plus middle"></i></a>

<script>
    $(document).ready(function() {
        $("#calander-wrap").calendar({
            tipsy_gravity: 's', // How do you want to anchor the tipsy notification? (n / s / e / w)
            click_callback: calendar_callback, // Callback to return the clicked date
            year: "2012", // Optional, defaults to current year - pass in a year - Integer or String
            scroll_to_date: true // Scroll to the current date?
        });
    });

    //
    // Example of callback - do something with the returned date
    var calendar_callback = function(date) {

        //
        // Returned date is a date object containing the day, month, and year.
        // date.day = day; date.month = month; date.year = year;
        alert("Open your Javascript console to see the returned result object.");
        console.log(date);
    };
</script>

