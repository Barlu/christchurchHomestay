<?php

class Admin extends CI_Controller {

    public function log_in() {

        $this->template->load_view('log_in');
    }

    public function dashboard() {
        $this->load->model('booking');
        $this->load->model('room');
        
        $rows = $this->booking->get_all();
        foreach ($rows as $row) {
            $booking = new Booking();
            $booking->populate($row);
            $bookings[] = $booking;
        }
        
        $rows = $this->room->get_all();
        foreach ($rows as $row) {
            $room = new Room();
            $room->populate($row);
            $rooms[] = $room;
        }
        
        $view_data = [
            'bookings' => $bookings,
            'rooms' => $rooms
        ];
        $this->template->load_view('dashboard', $view_data);
    }

    public function add_edit($type = null, $id = null) {
        $this->load->helper('form');
        $this->load->model('room');
        $view_data = [];
        $view_data['rooms'] = $this->_get_rooms();
        
        if ($type === 'room') {
            $room = new $room;
            if ($id !== null) {
                $room->populate($this->room->get($id));
            }
            if ($this->input->post('submit')) {
                $this->_save_room($id);
            }
            $view_data['room'] = $room;
        } else {

            //if ($type === 'customer')
            //Load booking class to prepopulate
            $this->load->model('booking');
            $booking = new Booking();
//obtain booking by id
//            if ($id !== null) {
//                $booking->populate($this->booking->get($id));
//            } 
//Check if a record has been submitted
            if ($this->input->post('submit')) {
                $this->_save_booking($id);
            }
            $view_data['booking'] = $booking;
        }
        $this->template->load_view('add_edit', $view_data);
    }

    private function _get_rooms() {
        //Obtain all rooms
        $rows = $this->room->get_all();
        if ($rows) {
            foreach ($rows as $row) {
                $room = new Room();
                $room->populate($row);
                $rooms[] = $room;
            }
        } else {
            $rooms[] = 'No rooms found';
        }
        return $rooms;
    }

    private function _save_room($id) {
        $data = [
            'name' => $this->input->post('name'),
        ];

        $this->room->save($id, $data);
    }

    private function _save_booking($id) {
        $data = [
            'room_id' => $this->input->post('room_id'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'date_from' => $this->input->post('date_from'),
            'date_to' => $this->input->post('date_to'),
            'last_updated' => now()
        ];
        $this->booking->save($data, $id);
    }

}
