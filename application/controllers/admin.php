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
            $room = new Room();
            if ($id !== null) {
                $room->populate($this->room->get($id));
            }
            if ($this->input->post('submit')) {
                $this->_save_room($id);
            }
            $view_data['room'] = $room;
        } else {
            //Load booking class to prepopulate
            $this->load->model('booking');
            $booking = new Booking();
            //Obtain booking by id
            if ($id !== null) {
                $booking->populate($this->booking->get($id));
            }
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
            $rooms[] = 'Room';
            foreach ($rows as $row) {
                $room = new Room();
                $room->populate($row);
                $rooms[$room->id] = $room->name;
            }
        } else {
            $rooms[] = 'No rooms found';
        }
        return $rooms;
    }

    private function _save_room($id) {
        $data = [
            'name' => $this->input->post('name'),
            'last_modified' => now()
        ];

        $this->room->save($data, $id);
        $this->session->set_flashdata('result', 'Room saved successfully');
        redirect(base_url() . 'index.php/admin/dashboard');
    }

    private function _save_booking($id) {
        $data = [
            'room_id' => $this->input->post('room_id'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'planned_stay' => $this->input->post('planned_stay'),
            'last_updated' => now()
        ];
        $this->booking->save($data, $id);
        $this->session->set_flashdata('result', 'Booking saved successfully'); 
        redirect(base_url() . 'index.php/admin/dashboard');
    }

}
