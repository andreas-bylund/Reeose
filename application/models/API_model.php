<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class api_model extends CI_Model  {


    /*
    * [Adrecord] Lägger till butiker
    */
    public function add_adrecord_raw_store($data)
    {
        $this->db->insert('api_adrecord_stores_dump', $data);
    }

    /*
    * Lägg till status meddelande i databasen
    */
    public function add_status($data)
    {
        $this->db->insert('api_logs', $data);
    }

    /*
    * Hämta butikerna från databasen

    */
    public function fetch_store_id()
    {
        $this->db->select('a_id');
        $this->db->from('adrecord_butiker');

        $query = $this->db->get();

        return $query->result();
    }

    /**
    * Kontrollerar om butiken från adrecord redan har lagts in i databasen
    */
    public function controll_if_site_exits($a_id, $natverk)
    {
        $this->db->where('affiliate_id', $a_id);
        $this->db->where('affiliate_natverk', $natverk);

        $query = $this->db->get('butiker');

        if ($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }


    public function controll_rabattkod_enabled($a_id, $natverk)
    {
        $this->db->where('affiliate_id', $a_id);
        $this->db->where('affiliate_natverk', $natverk);
        $this->db->where('rabattkoder', 1);

        $query = $this->db->get('butiker');

        if ($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function fetch_some_data($a_id)
    {
        $this->db->select('
            logo_src,
            id,
            url
        ');
        $this->db->where('a_id', $a_id);

        $query = $this->db->get('adrecord_butiker');

        return $query->row();

    }

    /**
    * Lägger till slugs
    */
    public function add_slug($data)
    {
        $this->db->insert('slugs', $data);
    }


    public function add_store($data)
    {
        $this->db->insert('butiker', $data);

        $store_id = $this->db->insert_id();

        //Return, varumärke ID
        return $store_id;
    }

    public function empty_table($table)
    {
        $this->db->empty_table($table);
    }

    //[Adrecord] Rabattkoder
    public function check_rabattkod($id, $rabattkod)
    {
        $this->db->where('butiker.affiliate_id =', $id);
        $this->db->where('butiker.online =', 1);
        $this->db->where('butiker.affiliate_natverk =', 'adrecord');
        $this->db->where('rabattkoder.rabattkod =', $rabattkod);
        $this->db->join('rabattkoder', 'butiker.id = rabattkoder.butik_id');

        $query = $this->db->get('butiker');

        if ($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function add_affiliate_routing($data)
    {
        $this->db->insert('link_routing', $data);
    }

    public function rabattkod_exists($id)
    {
        $this->db->where('rabattkoder.affiliate_id =', $id);
        $this->db->join('butiker', 'butiker.affiliate_id = rabattkoder.butik_id');

        $query = $this->db->get('rabattkoder');

        if ($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

    }

    public function rabattkod_exists_api($id)
    {
        $this->db->where('rabattkoder_api.affiliate_id =', $id);
        $this->db->join('butiker', 'butiker.affiliate_id = rabattkoder_api.affiliate_butik_id');

        $query = $this->db->get('rabattkoder_api');

        if ($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

    }

    public function store_exists($programID)
    {
        $this->db->where('affiliate_natverk =', 'adrecord');
        $this->db->where('online =', 1);
        $this->db->where('affiliate_id', $programID);

        $query = $this->db->get('butiker');

        if ($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function add_rabattkod($data)
    {
        $this->db->insert('rabattkoder_api', $data);
    }
}
