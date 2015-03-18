<?php

class Ajax extends CI_Controller {
    public function getBookings(){
        $data = $this->input->get('data');
        
        if(isset($data['range_from']) && isset($data['range_to'])){
            $this->load->model('booking');
            $rows = $this->booking->get_many_by('date_from <='.$data['range_to'], 'date_to >='.$data['range_from']);
        }
        
        if(!empty($rows)){
            foreach ($rows as $row) {
                $booking = new Booking();
                $bookings[] = $booking->populate($row);
            }
            $responseData[] = $bookings;
            $response = 'Success';
        } else {
            $response = 'Error';
        }
        $responseData[] = $response;
        echo json_encode($response);
    }
    
}

