<?php 
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Users_model extends CI_Model {

    // variables corresponding to the column names in the database
    public $firstname;
    public $lastname;
    public $username;
    public $password;
    public $email;
    private $role;

    public function __construct() {
      // Call the CI_Model constructor
      parent::__construct();
    }

    // gets the user from the database.
    public function get_user($email, $password) {
      $this->db->select('*');
      $this->db->where('email', $email );
      $this->db->where('password', $password );
      $this->db->where('role', 'admin');
      $query = $this->db->get('users');

      return $query->result();
    }

    public function user_info($email) {
      $this->db->select('*');
      $this->db->where('email', $email );
      $this->db->where('role', 'admin');
      $query = $this->db->get('users');

      return $query->row();
    }

    // inserts a new user into the database
    public function set_user($firstname, $lastname, $username, $password, $email) {

      $this->firstname = $firstname; 
      $this->lastname  = $lastname;
      $this->username  = $username;
      $this->password  = $password;
      $this->email     = $email;

      $this->db->insert('users', $this);
    }

  }