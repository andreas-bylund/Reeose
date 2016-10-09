<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class public_model extends CI_Model  {



    /**
    * Kontrollerar om affiliate länken finns
    * Används av: Public_controller/link_routing
    */
    public function check_affiliate_routing($id)
    {
        $this->db->select('
            stores.id,
            stores.affiliate_link,
            stores.url,
            link_routing.link_routing_id,
            link_routing.target_url,
            link_routing.epi,
            link_routing.type
        ');

        $this->db->where('link_routing.link_routing_id', $id);
        $this->db->from('link_routing');

        $this->db->join('stores', 'link_routing.store_id = stores.id');


        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            $row = $query->row();

            return $row;
        }
        else
        {
            return FALSE;
        }
    }

    /*
    * Uppdaterar antal klick rabattkoden har fått
    * Används av: Public_controller/link_routing
    */
    public function update_click_count($click_data)
    {
        $this->db->set('clicks', 'clicks+1', FALSE);
        $this->db->where('epi', $click_data['epi']);
        $this->db->where('type', $click_data['type']);
        $this->db->where('store_id', $click_data['store_id']);

        $this->db->update('link_routing');
    }

    public function check_if_any_subcat($category_id)
    {
        $this->db->select('*');
        $this->db->where('category_id', $category_id);
        $this->db->where('subcategory_id >=', 1);
        $this->db->join('sale_pages', 'sale_pages.sale_id = sale_categories.page_id');

        $query = $this->db->get('sale_categories');


        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }

    public function category_name_by_id($catid)
    {
        $this->db->select('cat_name');
        $this->db->where('all_categories_id', $catid);

        $query = $this->db->get('all_categories');

        return $query->row();
    }

    /*
    * Hämta featured rabattkoder
    * Används av Public_controller/index
    */
    public function fetch_featured_coupons($today, $num)
    {
        $this->db->select('
            stores.store_logo,
            stores.name,
            stores.id,
            coupons.title,
            coupons.coupon_id,
            coupons.text,
            coupons.code,
            coupons.end_date,
            coupons.featured_home,
            link_routing.link_routing_id,
            link_routing.clicks
        ');

        $this->db->from('coupons');
        $this->db->limit($num);
        $this->db->join('stores', 'stores.id = coupons.store_id');
        $this->db->join('link_routing', 'link_routing.link_routing_id = coupons.link_routing_id');

        $this->db->where('coupons.end_date >=', $today);
        $this->db->where('coupons.active', 1);
        $this->db->where('coupons.featured_home', 1);
        $this->db->order_by('link_routing.clicks', "desc");

        return $this->db->get();
    }


    /*
    * Hämta featured sale_campaigns
    * Används av Public_controller/index
    */
    public function fetch_sale_campaigns($today, $num)
    {
        $this->db->select('
            stores.store_logo,
            stores.name,
            stores.id,
            sale_campaigns.title,
            sale_campaigns.sale_campaign_id,
            sale_campaigns.text,
            sale_campaigns.featured,
            slugs.slug,
            link_routing.link_routing_id,
            link_routing.clicks
        ');

        $this->db->from('sale_campaigns');
        $this->db->limit($num);
        $this->db->join('stores', 'stores.id = sale_campaigns.store_id');
        $this->db->join('slugs', 'stores.id = slugs.store_id');
        $this->db->join('link_routing', 'link_routing.link_routing_id = sale_campaigns.link_routing_id');


        $this->db->order_by('link_routing.clicks', "desc");

        $this->db->where('sale_campaigns.featured', 1);


        return $this->db->get();
    }

    /*
    * Hämta featured butiker
    * Används av Public_controller/index
    */
    public function fetch_featured_stores($num)
    {
        $this->db->select('
            stores.store_logo,
            stores.name,
            slugs.slug
        ');

        $this->db->from('stores');
        $this->db->where('stores.featured', 1);
        $this->db->limit($num);
        $this->db->join('slugs', 'stores.id = slugs.store_id');

        return $this->db->get();
    }

    /*
    * Hämtar antalet aktiva REOR oavsett vilken butriken den tillhör
    * Används av Public_controller/index
    */
    public function num_active_rea_kampanjer($date)
    {
        $this->db->where('slutdatum >=', $date);
        $query = $this->db->get('rea_kampanjer');

        return $query->num_rows();
    }

    /*
    * Hämtar antalet aktiva rabattkoder oavsett vilken butriken den tillhör
    * Används av Public_controller/index
    */
    public function num_active_coupons($date)
    {
        $this->db->where('end_date >=', $date);
        $query = $this->db->get('coupons');

        return $query->num_rows();
    }

    /*
    * Hämtar antalet butiker som är ONLINE
    * Används av Public_controller/index
    */
    public function num_active_stores()
    {
        $query = $this->db->get('stores');

        return $query->num_rows();
    }

    /**
    * Lägger Affiliate link klicks!
    * Används av: Public_controller/link_routing
    */
    public function add_click($data)
    {
       $this->db->insert('clicks', $data);
    }

    /**
    *  Hämta affiliate link genom EPI
    * Används av: Public_controller/rabattkoder
    */
    public function fetch_affiliate_link_by_epi($epi, $type)
    {
        $this->db->select('*');
        $this->db->where('epi', $epi);
        $this->db->where('type', $type);

        $query = $this->db->get('link_routing');

        $row = $query->row();

        return $row;
    }

    /**
    * Hämtar Affiliate länken till butiken
    * Används av: Public_controller/rabattkod_detail
    */
    public function fetch_affiliate_link($store_id, $epi)
    {
        $this->db->select('link_routing_id');
        $this->db->limit('1');
        $this->db->where('epi', $epi);
        $this->db->where('store_id', $store_id);

        $query = $this->db->get('link_routing');

        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }

    /**
    * Hämtar produktinformation som visas offentligt
    * Används av: Public_controller/rabattkod_detail
    */
    public function fetch_product_info($id)
    {
        $this->db->limit('1');
        $this->db->where('id', $id);
        $this->db->join('header_data', 'stores.header_id = header_data.header_data_id');
        $this->db->join('content', 'content.content_id = stores.content_id');

        $query = $this->db->get('stores');

        if ($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return FALSE;
        }
    }

    public function fetch_all_categories()
    {
        $this->db->select('*');



        $query = $this->db->get('all_categories');

        $row = $query->result();

        return $row;
    }

    /**
    * Hämtar alla REA-sidor
    * Används av: Public_controller/sale
    */
    public function fetch_all_sale_pages()
    {
        $this->db->select('
            sale_pages.nisch,
            slugs.slug,
            sale_categories.category_id
        ');

        $this->db->where('sale_categories.subcategory_id =', 0);
        $this->db->where('slugs.slug_category =', 'rea');
        $this->db->join('slugs', 'sale_pages.sale_id = slugs.store_id');
        $this->db->join('sale_categories', 'sale_categories.page_id = sale_pages.sale_id');

        $this->db->order_by('nisch', "asc");
        $this->db->from('sale_pages');

        $query = $this->db->get();

        return $query->result();



        return $this->db->get();
    }

    /**
    * Hämtar alla butiker
    */
    public function fetch_all_stores()
    {
        $this->db->select('
            stores.name,
            slugs.slug,
        ');

        $this->db->join('slugs', 'stores.id = slugs.store_id');
        $this->db->where('slugs.slug_category =', 'rabattkod');
        $this->db->order_by('name', "asc");
        $this->db->from('stores');


        $query = $this->db->get();

        return $query->result();
    }


     /*


     public function fetch_all_stores_name_id_slug()
     {
         $this->db->select('butiker.namn');
         $this->db->from('butiker');

         $query = $this->db->get();

         return $query->result();
     }

     */

    /**
    * Hämtar de senaste 10 rabattkoderna.
    * Används på Reeo.se/rabattkoder/
    */
    public function fetch_5_last_active_coupons($today, $limit=5)
    {
        $this->db->select('
            stores.store_logo,
            stores.name,
            coupons.title,
            coupons.coupon_id,
            coupons.text,
            coupons.code,
            coupons.end_date,
            link_routing.clicks,
            slugs.slug,
            link_routing.link_routing_id
        ');

        $this->db->from('stores');
        $this->db->limit($limit);
        $this->db->join('coupons', 'stores.id = coupons.store_id');
        $this->db->where('slugs.slug_category =', 'rabattkod');
        $this->db->join('slugs', 'stores.id = slugs.store_id');
        $this->db->join('link_routing', 'coupons.link_routing_id = link_routing.link_routing_id');

        $this->db->order_by('coupons.coupon_id', "desc");


        return $this->db->get();
    }

    /**
    * Hämtar 4 random rabattkoder
    * Används på Reeo.se/rabattkoder/
    */
    public function fetch_random_stores($num)
    {
        $this->db->select('
            stores.store_logo,
            stores.name,
            slugs.slug,
            stores.featured
        ');

        $this->db->from('stores');
        $this->db->where('stores.coupons', 1);
        $this->db->where('slugs.slug_category =', 'rabattkod');
        $this->db->limit($num);
        $this->db->join('slugs', 'stores.id = slugs.store_id');
        $this->db->order_by('stores.id', 'RANDOM');

        return $this->db->get();
    }

    /**
    * Hämtar alla butiker som börjar på bokstav ($letter)
    * Används av: Public_controller/butiker_specifik
    */
    public function fetch_butiker_by_first_letter($letter)
    {
        $this->db->select('
            butiker.logo_src,
            butiker.namn,
            butiker.rabattkoder,
            slugs.slug
        ');

        $this->db->from('butiker');
        $this->db->where('online', 1);
        $this->db->join('slugs', 'butiker.id = slugs.butik_id');
        $this->db->order_by('namn', "desc");
        $this->db->like('namn', $letter, 'after');

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return FALSE;
        }
    }

    /**
    * Kontrollerar om varumärket finns i databasen
    * Används av: Public_controller/rabattkod_detail
    */
    public function check_if_slug_exists($slug1, $slug2)
    {
        $this->db->select('*');
        $this->db->limit('1');
        $this->db->where('slug_category', $slug1);
        $this->db->where('slug', $slug2);

        $query = $this->db->get('slugs');

        $row = $query->row();

        if ($query->num_rows() > 0)
        {
            return $row->store_id;
        }
        else
        {
            return FALSE;
        }
    }

    public function get_cat_id_by_name($category)
    {
        $this->db->select('*');
        $this->db->where('slug_cat_name', $category);

        $query = $this->db->get('all_categories');

        $row = $query->row();

        if ($query->num_rows() > 0)
        {
            return $row;
        }
        else
        {
            return FALSE;
        }
    }

    public function get_subcat_id_by_name($subcategory)
    {
        $this->db->select('*');
        $this->db->where('slug_subcat_name', $subcategory);

        $query = $this->db->get('all_subcategories');

        $row = $query->row();

        if ($query->num_rows() > 0)
        {
            return $row;
        }
        else
        {
            return FALSE;
        }
    }

    public function check_catid_and_subcatid_relationship($cat_id, $subcat_id)
    {
        $this->db->select('page_id');
        $this->db->where('category_id', $cat_id);
        $this->db->where('subcategory_id', $subcat_id);

        $query = $this->db->get('sale_categories');

        $row = $query->row();

        if ($query->num_rows() > 0)
        {
            return $row;
        }
        else
        {
            return FALSE;
        }
    }

    /*
    * Hämtar antalet aktiva rabattkoder som finns i databasen
    * Används av: Public_controller/rabattkod_detail
    */
    public function fetch_num_coupons($store_id, $date)
    {
        $this->db->group_start();
        $this->db->where('end_date >=', $date);
        $this->db->or_where('end_date >=', '0000-00-00');
        $this->db->group_end();
        $this->db->where('store_id', $store_id);

        $query = $this->db->get('coupons');

        return $query->num_rows();


    }

    /*
    * Hämtar antalet aktiva REA som finns i databasen
    * Används av: Public_controller/rabattkod_detail
    */
    public function fetch_num_sales($store_id, $date)
    {
        $this->db->where('store_id', $store_id);
        $this->db->where('show_coupon_detail', 1);
        $this->db->group_start();
        $this->db->where('end_date >=', $date);
        $this->db->or_where('end_date >=', '0000-00-00');
        $this->db->group_end();
        $query = $this->db->get('sale_campaigns');

        return $query->num_rows();
    }

    /*
    * Hämtar antalet aktiva ERBJUDANDEN som finns i databasen
    * Används av: Public_controller/rabattkod_detail
    */
    public function fetch_num_offers($store_id, $date)
    {
        $this->db->where('store_id', $store_id);
        $this->db->group_start();
        $this->db->where('end_date >=', $date);
        $this->db->or_where('end_date >=', '0000-00-00');
        $this->db->group_end();

        $query = $this->db->get('offers');

        return $query->num_rows();
    }

    /*
    * Hämtar antalet aktiva "REA" som finns i databasen baserat på page_id och date
    * Används av: Public_controller/rea_detail
    */
    public function num_active_sales($store_id, $date)
    {
      $this->db->where('sale_page_id', $store_id);
      $this->db->group_start();
      $this->db->where('end_date >=', $date);
      $this->db->or_where('end_date', '0000-00-00');
      $this->db->group_end();
      $this->db->where('count_on_sale_page', 1);

      $query = $this->db->get('sale_campaigns');

      return $query->num_rows();
    }

    /*
    * Hämtar totalet produkter som är på rea baserad på datum och rea_sida_id
    * Används av: Public_controller/rea_detail
    */
    public function total_products_on_sale($today, $sale_campaign_id)
    {

        $this->db->where('sale_page_id', $sale_campaign_id);
        $this->db->select_sum('num_products');
        $this->db->group_start();
        $this->db->where('end_date >=', $today);
        $this->db->or_where('end_date', '0000-00-00');
        $this->db->group_end();

        $this->db->from('sale_campaigns');

        $query = $this->db->get();

        return $query->row();
    }

    /**
    * Hämtar alla aktuella "REA" från databasen.
    * Används av: Public_controller/rea_detail
    */
    public function fetch_active_sales($page_id, $today)
    {

        $this->db->select('
          stores.store_logo,
          stores.name,
          sale_campaigns.sale_campaign_id,
          sale_campaigns.title,
          sale_campaigns.num_products,
          sale_campaigns.end_date,
          sale_campaigns.text,
          link_routing.clicks,
          link_routing.link_routing_id
        ');

        $this->db->where('sale_campaigns.sale_page_id', $page_id);
        $this->db->group_start();
        $this->db->where('sale_campaigns.end_date >=', $today);
        $this->db->or_where('sale_campaigns.end_date', '0000-00-00');
        $this->db->group_end();

        $this->db->join('stores', 'sale_campaigns.store_id = stores.id');
        $this->db->join('link_routing', 'sale_campaigns.link_routing_id = link_routing.link_routing_id');
        $this->db->order_by("sale_campaigns.num_products", "desc");

        $query = $this->db->get('sale_campaigns');

        return $query->result();
    }

    /*
    * Hämtar antalet aktiva rabattkoder som finns i databasen
    * Används av: Public_controller/rabattkod_detail
    */
    public function fetch_num_inactive($store_id, $date)
    {
        $this->db->where('end_date >=', '0000-00-01');
        $this->db->where('end_date <', $date);
        $this->db->where('store_id', $store_id);
        $query = $this->db->get('coupons');

        return $query->num_rows();
    }

    /*
    * Kontrollera om rabattkod är fortfarande aktiv
    * Används av: Public_controller/rabattkoder
    */
    public function controll_coupon($id, $today)
    {
        $this->db->where('coupon_id', $id);
        $this->db->where('end_date >=', $today);

        $query = $this->db->get('coupons');

        if ($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return FALSE;
        }
    }

    /**
    * Hämtar REA-sida information
    * Används av: Public_controller/rea_detail
    */
    public function fetch_sale_page($page_id)
    {
      $this->db->select('
        sale_pages.nisch,
        sale_pages.sale_id,
        sale_pages.header_img,
        sale_page_header.meta_description,
        sale_page_header.meta_tags,
        sale_page_header.title,
        sale_page_content.lead_text,
        sale_page_content.bottom_text,
        sale_categories.category_id,
        sale_categories.subcategory_id
      ');

      $this->db->where('sale_pages.sale_id', $page_id);
      $this->db->join('sale_page_content', 'sale_pages.content_id = sale_page_content.sale_content_id');
      $this->db->join('sale_page_header', 'sale_page_header.sale_page_header_id = sale_pages.header_id');
      $this->db->join('sale_categories', 'sale_categories.page_id = sale_pages.sale_id');

      $query = $this->db->get('sale_pages');

      if ($query->num_rows() > 0)
      {
        return $query->row();
      }
      else
      {
        return FALSE;
      }
    }

    /**
    * Hämtar AKTIVA rabattkoder som visas offentligt
    * Används av: Public_controller/rabattkod_detail
    */
    public function fetch_active_items($id, $today)
    {
        $this->db->select('
            coupons.coupon_id,
            coupons.title,
            coupons.text,
            coupons.store_id,
            coupons.code,
            coupons.type,
            coupons.end_date,
            link_routing.clicks,
            link_routing.link_routing_id
        ');

        $this->db->where('coupons.store_id', $id);
        $this->db->group_start();
        $this->db->where('coupons.end_date >=', $today);
        $this->db->or_where('coupons.end_date', '0000-00-00');
        $this->db->group_end();
        $this->db->join('link_routing', 'coupons.link_routing_id = link_routing.link_routing_id');

        $rabattkod_query = $this->db->get('coupons');

        //Erbjudanden
        $this->db->select('
            offers.offer_id,
            offers.title,
            offers.text,
            offers.store_id,
            offers.end_date,
            offers.featured,
            offers.type,
            link_routing.clicks,
            link_routing.link_routing_id
        ');

        $this->db->where('offers.store_id', $id);
        $this->db->where('offers.show_coupon_detail', 1);
        $this->db->group_start();
        $this->db->where('offers.end_date >=', $today);
        $this->db->or_where('offers.end_date', '0000-00-00');
        $this->db->group_end();
        $this->db->join('link_routing', 'offers.link_routing_id = link_routing.link_routing_id');

        $erbjudanden_query = $this->db->get('offers');

        //REA
        $this->db->select('
            sale_campaigns.sale_campaign_id,
            sale_campaigns.active,
            sale_campaigns.store_id,
            sale_campaigns.sale_page_id,
            sale_campaigns.link_routing_id,
            sale_campaigns.title,
            sale_campaigns.end_date,
            sale_campaigns.text,
            sale_campaigns.num_products,
            link_routing.clicks,
            link_routing.type
        ');

        $this->db->where('sale_campaigns.store_id', $id);
        $this->db->where('sale_campaigns.active', 1);
        $this->db->where('sale_campaigns.show_coupon_detail', 1);

        $this->db->group_start();
        $this->db->where('sale_campaigns.end_date >=', $today);
        $this->db->or_where('sale_campaigns.end_date', '0000-00-00');
        $this->db->group_end();
        $this->db->join('link_routing', 'link_routing.link_routing_id = sale_campaigns.link_routing_id');

        $rea_query = $this->db->get('sale_campaigns');


        $result = array_merge(
            $rabattkod_query->result(),
            $erbjudanden_query->result(),
            $rea_query->result()
        );

        return $result;
    }


    /**
    * Hämtar INAKTIVA rabattkoder som visas offentligt
    * Används av: Public_controller/rabattkod_detail
    */
    public function fetch_inactive_items($id, $today)
    {
        $this->db->select('*');
        $this->db->where('store_id', $id);
        $this->db->where('end_date >=', '0000-00-01');
        $this->db->where('end_date <', $today);

        $coupons_query = $this->db->get('coupons');

        //Erbjudanden
        $this->db->select('
            offers.offer_id,
            offers.title,
            offers.text,
            offers.store_id,
            offers.end_date,
            offers.featured,
            offers.type,
            link_routing.clicks,
            link_routing.link_routing_id
        ');

        $this->db->where('offers.store_id', $id);
        $this->db->group_start();
        $this->db->where('offers.end_date >=', '0000-00-01');
        $this->db->where('offers.end_date <', $today);
        $this->db->group_end();
        $this->db->join('link_routing', 'offers.link_routing_id = link_routing.link_routing_id');

        $offers_query = $this->db->get('offers');

        //REA
        $this->db->select('*');
        $this->db->where('sale_campaigns.store_id', $id);
        $this->db->group_start();
        $this->db->where('sale_campaigns.end_date >=', '0000-00-01');
        $this->db->where('sale_campaigns.end_date <', $today);
        $this->db->group_end();
        $this->db->join('link_routing', 'sale_campaigns.link_routing_id = link_routing.link_routing_id');

        $sale_query = $this->db->get('sale_campaigns');

        $result = array_merge(
            $coupons_query->result(),
            $offers_query->result(),
            $sale_query->result()
        );

        return $result;
    }

    /**
    * Hämtar INAKTIVA rabattkoder
    * Används av: Public_controller/rabattkod_detail
    */
    public function fetch_inactive_rabattkoder_by_butik_id($id, $today)
    {
        $this->db->select('*');
        $this->db->where('butik_id', $id);
        $this->db->where('slutdatum <', $today);
        $this->db->limit('5');
        $this->db->order_by('slutdatum', "asc");

        $query = $this->db->get('rabattkoder');

        return $query;
    }

    public function check_if_targeturl($link_routing_id)
    {
        $this->db->select('target_url');
        $this->db->where('link_routing_id', $link_routing_id);

        $query = $this->db->get('link_routing');

        if ($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return FALSE;
        }

    }
}
