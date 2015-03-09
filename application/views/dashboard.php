<section>
    <h1>Bookings</h1>
    <?php if($bookings){
        foreach ($bookings as $booking) {
        echo '<h3>'.$booking->first_name. ' '. $booking->last_name.'</h3>';
        if($booking->date_from){
            echo '<p>'.standard_date(DATE_RFC2822, $booking->date_from).' - '.standard_date(DATE_RFC2822, $booking->date_to).'</p>';
        }
    }
    }?>
</section>

