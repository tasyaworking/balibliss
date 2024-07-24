<?php
class Mpengguna extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_pengguna() {
        $query = $this->db->get('tb_pengguna');
        return $query->result();
    }

    public function get_pengguna_by_id($id) {
        $query = $this->db->get_where('tb_pengguna', array('id' => $id));
        return $query->row();
    }

    public function insert_pengguna($data) {
        return $this->db->insert('tb_pengguna', $data);
    }

    public function update_pengguna($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tb_pengguna', $data);
    }

    public function delete_pengguna($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tb_pengguna');
    }
}
?>
