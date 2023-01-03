<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu($start, $end)
    {
        // $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
        //           FROM `user_sub_menu` JOIN `user_menu`
        //           ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        //           LIMIT $start
        //         ";

        $query = $this->db->select('user_sub_menu.*, user_menu.menu')
            ->join('user_menu', 'user_sub_menu.menu_id = user_menu.id')
            ->get('user_sub_menu', $start, $end)->result_array();
        return $query;
    }

    // public function insert()
    // {
    //     $data = [
    //         'title' => $this->input->post('title'),
    //         'menu_id' => $this->input->post('menu_id'),
    //         'url' => $this->input->post('url'),
    //         'icon' => $this->input->post('icon'),
    //         'is_active' => $this->input->post('is_active')
    //     ];

    //     $this->db->insert('user_sub_menu', $data);
    // }

    public function getSubMenuById($id)
    {
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    }

    public function update($id)
    {
        $data = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
        ];

        $this->db->update('user_sub_menu', $data, ['id' => $id]);
    }

    public function delete($id)
    {
        $this->db->delete('user_sub_menu', ['id' => $id]);
    }
}
