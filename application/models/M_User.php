<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
    public function loginadmin($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }
    public function loginuser($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('nomor_p', $post['nomor_p']);
        $this->db->where('npp', ($post['npp']));
        $query = $this->db->get();
        return $query;
    }
    public function get($id = null)
    {

        $this->db->from('user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['name'] = $post['fullname']; //params sesuai dr field database, post sesuai dr name inputan
        $params['username'] = $post['username'];
        $params['nomor_p'] = $post['nomor_p'];
        $params['password'] = sha1($post['password']);
        $params['address'] = $post['address'] !== "" ? $post['address'] : null;
        $params['npp'] = $post['npp'];
        $params['level'] = $post['level'];
        $this->db->insert('user', $params);
    }
    public function edit($post)
    {
        $params['name'] = $post['fullname']; //params sesuai dr field database, post sesuai dr name inputan
        $params['username'] = $post['username'];
        $params['nomor_p'] = $post['nomor_p'];
        $params['password'] = sha1($post['password']);
        if (!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $params['address'] = $post['address'] !== "" ? $post['address'] : null;
        $params['npp'] = $post['npp'];
        $params['level'] = $post['level'];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }
    public function delete($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }
}
