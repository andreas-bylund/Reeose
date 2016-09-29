<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sale_update_model extends CI_Model  {

    public function update_sale_data($data)
    {
        $this->db->set('num_products', $data['num']);
        $this->db->where('sale_campaign_id',  $data['sale_campaign_id']);
        $this->db->update('sale_campaigns');
    }

    public function set_sale_campain_inactive($data)
    {
        $this->db->set('active', 0);
        $this->db->where('sale_campaign_id',  $data['sale_campaign_id']);
        $this->db->update('sale_campaigns');
    }

    public function log_api($data)
    {
        $this->db->insert('api_logs_autosale', $data);
    }

    public function fetch_cronjob($today)
    {
        $this->db->select('*');
        $this->db->where('last_update <', $today);
        $this->db->limit(1);
        $this->db->from('cronjobs');

        $query = $this->db->get();

        return $query->row();
    }

    public function update_last_update($cronjob_id)
    {
        $this->db->set('last_update', date('Y-m-d'));
        $this->db->where('cronjob_id', $cronjob_id);
        $this->db->update('cronjobs');
    }

}
