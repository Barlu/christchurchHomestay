<?php

class Ajax extends CI_Controller {

    public function getBookings() {
        $data['range_from'] = $this->input->get('range_from');
        $data['range_to'] = $this->input->get('range_to');

        if (!empty($data['range_from']) && !empty($data['range_to'])) {
            $this->load->model('booking');
            $rows = $this->booking->get_many_by([
                'date_from <=' => $data['range_to'],
                'date_to >=' => $data['range_from']]);
        }

        $bookings = [];
        if (!empty($rows)) {
            $responseData['bookings'] = $rows;
            $responseData['response'] = 'success';
        } else {
            $responseData['response'] = 'error';
        }

        echo json_encode($responseData);
    }

    public function getRooms() {
        $this->load->model('room');
$this->room->order_by('number', 'ASC');
        $rows = $this->room->get_all();

        $responseData['rooms'] = $rows;
        $responseData['response'] = 'success';
        echo json_encode($responseData);
    }

}
