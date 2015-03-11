<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Template Library
 * Handle masterview and views within masterview
 */
class Template {

    private $_ci;
    protected $brand_name = 'Christchurch Homestay';
    protected $title_separator = ' | ';
    protected $ga_id = FALSE; // UA-XXXXX-X
    protected $layout = 'default';
    protected $title = FALSE;
    protected $description = FALSE;
    protected $summary = FALSE;
    protected $metadata = array();
    protected $js = array();
    protected $css = array();

    function __construct() {
        $this->_ci = & get_instance();
    }

    /**
     * Set page layout view (1 column, 2 column...)
     *
     * @access  public
     * @param   string  $layout
     * @return  void
     */
    public function set_layout($layout) {
        $this->layout = $layout;
    }

    /**
     * Set page title
     *
     * @access  public
     * @param   string  $title
     * @return  void
     */
    public function set_title($title) {
        $this->title = $title;
    }

    /**
     * Set title summary
     * 
     * @access public
     * @param string $summary
     * @return void
     */
    public function set_summary($summary) {
        $this->summary = $summary;
    }

    /**
     * Set page description
     *
     * @access  public
     * @param   string  $description
     * @return  void
     */
    public function set_description($description) {
        $this->description = $description;
    }

    /**
     * Add metadata
     *
     * @access  public
     * @param   string  $name
     * @param   string  $content
     * @return  void
     */
    public function add_metadata($name, $content) {
        $name = htmlspecialchars(strip_tags($name));
        $content = htmlspecialchars(strip_tags($content));
        $this->metadata[$name] = $content;
    }

    /**
     * Add js file path
     *
     * @access  public
     * @param   string  $js
     * @return  void
     */
    public function add_js($js) {
        $this->js[$js] = $js;
    }

    /**
     * Add css file path
     *
     * @access  public
     * @param   string  $css
     * @return  void
     */
    public function add_css($css) {
        $this->css[$css] = $css;
    }

    /**
     * Load view
     *
     * @access  public
     * @param   string  $view
     * @param   mixed   $data
     * @param   boolean $return
     * @return  void
     */
    public function load_view($view, $data = array(), $return = FALSE) {
// Not include master view on ajax request
        if ($this->_ci->input->is_ajax_request()) {
            $this->_ci->load->view($view, $data);
            return;
        }
// Title
        if (empty($this->summary)) {
            if (empty($this->title)) {
                $data['title'] = $this->brand_name;
            } else {
                $data['title'] = $this->title . $this->title_separator . $this->brand_name;
            }
        } else {
            if (empty($this->title)) {
                $data['title'] = $this->brand_name . $this->title_separator . $this->summary;
            } else {
                $data['title'] = $this->title . $this->title_separator . $this->brand_name . $this->title_separator . $this->summary;
            }
        }
// Description
        $data['description'] = $this->description;
// Metadata
        $metadata = array();
        foreach ($this->metadata as $name => $content) {
            if (strpos($name, 'og:') === 0) {
                $metadata[] = '<meta property="' . $name . '" content="' . $content . '">';
            } else {
                $metadata[] = '<meta name="' . $name . '" content="' . $content . '">';
            }
        }
        $data['metadata'] = implode('', $metadata);
// Javascript
        $js = array();
        foreach ($this->js as $js_file) {
            $js[] = '<script src="' . assets_url('js/' . $js_file) . '"></script>';
        }
        $data['js'] = implode('', $js);

// CSS
        $css = array();
        foreach ($this->css as $css_file) {
            $css[] = '<link rel="stylesheet" href="' . assets_url('css/' . $css_file) . '">';
        }
        $data['css'] = implode('', $css);

//GA ID
        $data['ga_id'] = $this->ga_id;

//Add view to data
        $data['view'] = $view;

        if (strpos(uri_string(), 'admin') !== FALSE) {
            $this->layout = 'admin';
        }
//Add body
        $data['body'] = $this->_ci->load->view('layout/' . $this->layout, $data, true);

        return $this->_ci->load->view('base_view', $data, $return);
    }

}

/* End of file Template.php */
/* Location: ./application/libraries/Template.php */

