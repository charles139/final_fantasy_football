<?php

class FantasyM extends CI_Model {
    function add_user($user)
    {
        $query = "INSERT INTO users (name, alias, email, password, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())";
        $values = array($user['name'], $user['alias'], $user['email'], $user['password'], 'NOW()', 'NOW()'); 
        $this->db->query($query, $values);

        $thanks = "Thank you for registering, Please login to start ballin'";
        $this->session->set_userdata('thanks', $thanks);

        redirect('/');
    }
    function get_user($user)
    {
        $existing_user = $this->db->query("SELECT * FROM users WHERE email='".$user['email']."' AND password='".$user['password']."'")->row_array();
        if($user['email'] !== $existing_user['email'] && $user['password'] !== $existing_user['password'])
        {
            $errors = [];
            $errors[] = "Please enter a valid email/password";
            $this->session->set_userdata('errors' , $errors);
            redirect('/');
        }
        else 
        {
            $this->session->set_userdata('user' , $existing_user);
        }

        redirect('/welcome/index');
    }
    // function get_quotes()
    // {
    // $quotes = $this->db->query("SELECT * FROM quotes ")->result_array();
    // return $this->session->set_userdata('quotes' , $quotes);
    // }
    // function add_favorite($favorite)
    // {
    //  $query = "INSERT INTO favorites (quote_id, user_id) VALUES (?,?)";
    //  $values = array($favorite['quote_id'], $favorite['user_id']); 
    //  return $this->db->query($query, $values);
    // }
    // function get_favorite()
    // {
    // $user = $this->session->userdata('user');
    // $favorite = $this->db->query("SELECT * FROM users LEFT JOIN favorites ON users.id=favorites.user_id LEFT JOIN quotes ON favorites.quote_id=quotes.id WHERE user_id =".$user['id'])->result_array();
    // return $this->session->set_userdata('favorite' , $favorite);
    // }
    // function remove_favorite($remove)
    // {
    // return $this->db->query("DELETE FROM favorites WHERE quote_id=".$remove['quote_id']);
    // }
    // function add_quote($quote)
    // {
    //  $query = "INSERT INTO quotes (poster_name, author, quote, created_at, updated_at) VALUES (?,?,?,NOW(),NOW() )";
    //  $values = array($quote['poster_name'], $quote['author'], $quote['quote'], 'NOW()', 'NOW()'); 
    //  return $this->db->query($query, $values);
    // }
}
?>