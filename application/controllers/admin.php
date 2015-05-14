<?php

class Admin extends CI_Controller {

    public function log_in() {

        $this->template->load_view('log_in');
    }

    public function dashboard() {
        $this->load->model('booking');
        $this->load->library('table');

        $bookings = [];
        $rooms = [];

        $rows = $this->booking->get_all();
        foreach ($rows as $row) {
            $booking = new Booking();
            $bookings[] = $booking->populate($row);
        }



        $this->table->set_template([
            'table_open' => '<table id="booking-display" class="table table-hover">']);
        $table_array = [
            [
                'First Name', 'Last Name', 'Age', 'Nationality', 'Gender', 'Provider', 'Room', 'From', 'To', 'Status', 'Edit'
            ]
        ];
        if (isset($bookings)) {
            foreach ($bookings as $booking) {
                $dates = explode(' - ', $booking->dates);
                $table_array[] = [
                    $booking->first_name,
                    $booking->last_name,
                    $booking->age,
                    $booking->nationality,
                    $booking->gender,
                    $booking->education_provider,
                    $booking->room_number,
                    $dates[0],
                    $dates[1],
                    $booking->status,
                    '<a href="' . base_url() . 'admin/add_edit/booking/' . $booking->id . '"><i class="fa fa-pencil-square-o"></i></a>'
                ];
            }
        }

        $view_data = [
            'bookings' => $bookings,
            'table_array' => $table_array
        ];
        $this->template->load_view('dashboard', $view_data);
    }

    public function add_edit($type = null, $id = null) {
        //Load needed models/helpers/libraries
        $this->load->helper('form');
        //Set vars
        $view_data = [];
        $view_data['status'] = ['Not Selected' => 'Status', 'Pending' => 'Pending', 'Confirmed' => 'Confirmed', 'Indefinate' => 'Indefinate'];

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

        $this->template->load_view('add_edit', $view_data);
    }

//    private function _get_rooms() {
//        //Obtain all rooms
//        $rows = $this->booking->get_all();
//        if ($rows) {
//            $rooms[] = 'Room';
//            foreach ($rows as $row) {
//                $room = new Room();
//                $room->populate($row);
//                $rooms[$room->id] = $room->name;
//            }
//        } else {
//            $rooms[] = 'No rooms found';
//        }
//        return $rooms;
//    }

//    private function _save_room($id) {
//        $data = [
//            'name' => $this->input->post('name'),
//            'last_modified' => now()
//        ];
//
//        $this->room->save($data, $id);
//        $this->session->set_flashdata('success', 'Room saved successfully');
//        redirect(base_url() . 'index.php/admin/dashboard');
//    }

    private function _save_booking($id) {
        $dates = explode(' - ', $this->input->post('dates'));
        $date_from = DateTime::createFromFormat('d/m/Y', $dates[0]);
        $date_to = DateTime::createFromFormat('d/m/Y', $dates[1]);
        $data = [
            'room_number' => $this->input->post('room_number'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'nationality' => $this->input->post('nationality'),
            'gender' => $this->input->post('gender'),
            'age' => $this->input->post('age'),
            'education_provider' => $this->input->post('education_provider'),
            'date_from' => $date_from->getTimestamp(),
            'date_to' => $date_to->getTimestamp(),
            'status' => $this->input->post('status'),
            'last_updated' => now()
        ];
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }
        $this->booking->save($data, $id);
        $this->session->set_flashdata('success', 'Booking saved successfully');
        redirect(base_url() . 'admin/dashboard');
    }

}
