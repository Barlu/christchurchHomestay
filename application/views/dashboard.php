<section>
    
    <h1>Administration</h1>

    <?php
    if ($this->session->flashdata('result') != '') {
        echo $this->session->flashdata('result');
    }
    ?>

    <div role="tabpanel">

        <!-- Nav tabs -->
        <ul id="admin-nav" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#bookings" aria-controls="bookings" role="tab" data-toggle="tab">Bookings</a></li>
            <li role="presentation"><a href="#rooms" aria-controls="rooms" role="tab" data-toggle="tab">Rooms</a></li>
            <li role="presentation"><a href="#calander" aria-controls="calander" role="tab" data-toggle="tab">Calander</a></li>
            <li role="presentation"><a href="#history" aria-controls="history" role="tab" data-toggle="tab">History</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="admin tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="bookings">
                <?php
                if ($bookings) {
                    foreach ($bookings as $booking) {
                        echo '<h3>' . $booking->first_name . ' ' . $booking->last_name . '</h3>';
                        if ($booking->planned_stay) {
                            echo '<p>' . $booking->planned_stay . '</p>';
                        }
                        echo '<a href="'.base_url().'index.php/admin/add_edit/booking/'.$booking->id.'">Edit</a>';
                    }
                }
                ?>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="rooms">...</div>
            <div role="tabpanel" class="tab-pane fade" id="calander">...</div>
            <div role="tabpanel" class="tab-pane fade" id="history">...</div>
        </div>

    </div>
</section>

