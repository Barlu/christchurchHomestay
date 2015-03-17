<?php

class Booking extends MY_Model {
    /**
     * Primary Key
     * @var int
     */
    public $id;
    
    /**
     * Foreign Key
     * @var string
     */
    public $room_id;
    
    /**
     *
     * @var string
     */
    public $first_name;
    
    /**
     *
     * @var string
     */
    public $last_name;
    
    /**
     *
     * @var string
     */
    public $nationality;
    
    /**
     *
     * @var string
     */
    public $gender;
    
    /**
     *
     * @var int
     */
    public $age;
    
    /**
     *
     * @var string
     */
    public $education_provider;
    
    /**
     *
     * @var string
     */
    public $dates;
    
    /**
     *
     * @var string ('pending', 'confirmed', 'indefinate')
     */
    public $status;
    
    /**
     *
     * @var boolean
     */
    public $archive;
    
    /**
     * 
     * @var text
     */
    public $testimonial;
    
    /**
     *
     * @var int timestamp
     */
    public $last_updated;
    
    /**
     *
     * @var int timestamp
     */
    public $date_created;
}
