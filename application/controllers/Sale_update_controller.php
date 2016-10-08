§<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_update_controller extends CI_Controller {


    public function update_shoes_ellos_1()
    {
        $key = $_GET['key'];

        $secret_key = '70C75240DAE7ASAS32452SA45227CDEFEEE70A0B2A12';

        if($key !== $secret_key)
        {
            echo 'you are not allowed here';
            exit();
        }

        $this->load->library('Simple_html_dom');
        $html = file_get_html('http://www.ellos.se/rea/skor');

        $data['num_total_shoes'] = array(
            'product'   =>  'Totalt antal skor',
            'num'   =>  $this->remove_parentheses($html->find('//*[@id="resultListBaseProduction"]/div[1]/div/div[1]', 0)->plaintext),
            'sale_campaign_id' =>   1,
            'title' =>  'Just nu finns det totalt ' . $this->remove_parentheses($html->find('//*[@id="resultListBaseProduction"]/div[1]/div/div[1]', 0)->plaintext) . ' olika skor på REA!'
        );

        $data['num_women_shoes'] = array(
            'product'   =>  'Antal damskor',
            'num'   =>  $this->remove_parentheses($html->find('//*[@id="GenderDepartment"]/li/ul/li[1]/span', 0)->plaintext),
            'sale_campaign_id' =>   2,
            'title' =>  'Just nu finns det ' . $this->remove_parentheses($html->find('//*[@id="GenderDepartment"]/li/ul/li[1]/span', 0)->plaintext) . ' damskor på REA hos Ellos!'
        );

        $data['num_children_shoes'] = array(
            'product'   =>  'Antal barnskor',
            'num'   =>  $this->remove_parentheses($html->find('//*[@id="GenderDepartment"]/li/ul/li[2]/span', 0)->plaintext),
            'sale_campaign_id' =>   4,
            'title' =>  'Just nu finns det ' . $this->remove_parentheses($html->find('//*[@id="GenderDepartment"]/li/ul/li[2]/span', 0)->plaintext) . ' barnskor på REA hos Ellos!'
        );

        $data['num_men_shoes'] = array(
            'product'   =>  'Antal herrskor',
            'num'   =>  $this->remove_parentheses($html->find('//*[@id="GenderDepartment"]/li/ul/li[3]/span', 0)->plaintext),
            'sale_campaign_id' =>   3,
            'title' =>  'Just nu finns det ' . $this->remove_parentheses($html->find('//*[@id="GenderDepartment"]/li/ul/li[3]/span', 0)->plaintext) . ' herrskor på REA hos Ellos!'
        );

        $data['num_sneakers'] = array(
            'product'   =>  'Sneakers',
            'num'   =>  $this->remove_parentheses($html->find('//*[@id="ProductDepartment"]/li/ul/li[1]/span', 0)->plaintext),
            'sale_campaign_id' =>   24,
            'title' =>  'Just nu finns det ' . $this->remove_parentheses($html->find('//*[@id="ProductDepartment"]/li/ul/li[1]/span', 0)->plaintext) . ' Sneakers på REA hos Ellos!'
        );

        $data['num_traningsskor'] = array(
            'product'   =>  'Träningsskor',
            'num'   =>  $this->remove_parentheses($html->find('//*[@id="ProductDepartment"]/li/ul/li[2]/span', 0)->plaintext),
            'sale_campaign_id' =>   25,
            'title' =>  'Just nu finns det ' . $this->remove_parentheses($html->find('//*[@id="ProductDepartment"]/li/ul/li[2]/span', 0)->plaintext) . ' träningsskor på REA hos Ellos!'
        );

        $data['num_boots'] = array(
            'product'   =>  'Boots',
            'num'   =>  $this->remove_parentheses($html->find('//*[@id="ProductDepartment"]/li/ul/li[3]/span', 0)->plaintext),
            'sale_campaign_id' =>   26,
            'title' =>  'Just nu finns det ' . $this->remove_parentheses($html->find('//*[@id="ProductDepartment"]/li/ul/li[3]/span', 0)->plaintext) . ' boots på REA hos Ellos!'
        );

        $data['num_stovlar'] = array(
            'product'   =>  'Stövlar',
            'num'   =>  $this->remove_parentheses($html->find('//*[@id="ProductDepartment"]/li/ul/li[4]/span', 0)->plaintext),
            'sale_campaign_id' =>   27,
            'title' =>  'Just nu pågår det REA på  ' . $this->remove_parentheses($html->find('//*[@id="ProductDepartment"]/li/ul/li[4]/span', 0)->plaintext) . ' stövlar hos Ellos!'
        );

        $data['num_gummistovlar'] = array(
            'product'   =>  'Gummistövlar',
            'num'   =>  $this->remove_parentheses($html->find('//*[@id="ProductDepartment"]/li/ul/li[5]/span', 0)->plaintext),
            'sale_campaign_id' =>   28,
            'title' =>  'Det finns totalt  ' . $this->remove_parentheses($html->find('//*[@id="ProductDepartment"]/li/ul/li[5]/span', 0)->plaintext) . ' Gummistövlar på REA hos Ellos!'
        );

        $data['num_pumps'] = array(
            'product'   =>  'Pumps',
            'num'   =>  $this->remove_parentheses($html->find('//*[@id="ProductDepartment"]/li/ul/li[6]/span', 0)->plaintext),
            'sale_campaign_id' =>   29,
            'title' =>  'RIKTIGT SNYGGA PUMPS PÅ REA HOS ELLOS!'
        );

        $data['num_ballerina'] = array(
            'product'   =>  'Ballerina',
            'num'   =>  $this->remove_parentheses($html->find('//*[@id="ProductDepartment"]/li/ul/li[7]/span', 0)->plaintext),
            'sale_campaign_id' =>   30,
            'title' =>  'SNYGGA, BILLIGA BALLERINA SKOR PÅ REA!'
        );

        $data['num_sandaletter'] = array(
            'product'   =>  'Sandaletter',
            'num'   =>  $this->remove_parentheses($html->find('//*[@id="ProductDepartment"]/li/ul/li[8]/span', 0)->plaintext),
            'sale_campaign_id' =>   31,
            'title' =>  'Riktigt snygga sandaletter på REA!'
        );

        $data['num_sandaler'] = array(
            'product'   =>  'Sandaler',
            'num'   =>  $this->remove_parentheses($html->find('//*[@id="ProductDepartment"]/li/ul/li[9]/span', 0)->plaintext),
            'sale_campaign_id' =>   32,
            'title' =>  'Just nu har Ellos REA på Sandaler!'
        );

        $data['num_tofflor'] = array(
            'product'   =>  'Tofflor',
            'num'   =>  $this->remove_parentheses($html->find('//*[@id="ProductDepartment"]/li/ul/li[10]/span', 0)->plaintext),
            'sale_campaign_id' =>   33,
            'title' =>  'BILLIGA TOFFLOR PÅ REA HOS ELLOS JUST NU!'
        );

        $data['num_lagskor'] = array(
            'product'   =>  'Lågskor',
            'num'   =>  $this->remove_parentheses($html->find('//*[@id="ProductDepartment"]/li/ul/li[12]/span', 0)->plaintext),
            'sale_campaign_id' =>   34,
            'title' =>  'Snygga lågskor (promenadskor) på REA just nu!'
        );

        $data['num_traskor'] = array(
            'product'   =>  'Träskor',
            'num'   =>  $this->remove_parentheses($html->find('//*[@id="ProductDepartment"]/li/ul/li[15]/span', 0)->plaintext),
            'sale_campaign_id' =>   35,
            'title' =>  'Träskor på REA just nu!'
        );

        $this->load->model('sale_update_model');

        foreach ($data as $row)
        {
            if($row['num'] == 0)
            {
                //Finns inga produkter på REA - Sätter kampanjen till inaktiv
                $this->sale_update_model->set_sale_campain_inactive($row);

                $data_api_log = array(
                    'product'       =>  $row['product'],
                    'num_products'  =>  0,
                    'status'        =>  0,
                    'store'         =>  'Ellos',
                    'date'          =>  date('Y-m-d')
                );

                $this->sale_update_model->log_api($data_api_log);
            }
            else
            {
                $data_api_log = array(
                    'product'       =>  $row['product'],
                    'num_products'  =>  $row['num'],
                    'status'        =>  1,
                    'store'         =>  'Ellos',
                    'date'          =>  date('Y-m-d')
                );

                $this->sale_update_model->log_api($data_api_log);

                $this->sale_update_model->update_sale_data($row);
            }
        }
    }

    public function cronjob_from_database()
    {
        $key = $_GET['key'];

        $secret_key = '70ASD12@S2452SA45227CDEFEEE70A0B2A12';

        if($key !== $secret_key)
        {
            echo 'you are not allowed here';
            exit();
        }

        $today = date("Y-m-d");
        $this->load->model('sale_update_model');
        $this->load->library('Simple_html_dom');

        $result = $this->sale_update_model->fetch_cronjob($today);

        if(!$result)
        {
          exit();
        }

        $html = file_get_html($result->url);

        $data = array(
          'product'   =>  $result->product,
          'store'     =>  $result->store,
          'num'       =>  $this->remove_parentheses($html->find($result->xpath, 0)->plaintext),
          'sale_campaign_id' =>   $result->sale_campaign_id
        );

        if($data['num'] == 0)
        {
          //Finns inga produkter på REA - Sätter kampanjen till inaktiv
          $this->sale_update_model->set_sale_campain_inactive($data);

          $data_api_log = array(
            'product'       =>  $data['product'],
            'num_products'  =>  0,
            'status'        =>  0,
            'store'         =>  $data['store'],
            'date'          =>  date('Y-m-d')
          );

          $this->sale_update_model->log_api($data_api_log);
        }
        else
        {
          $data_api_log = array(
            'product'       =>  $data['product'],
            'num_products'  =>  $data['num'],
            'status'        =>  1,
            'store'         =>  $data['store'],
            'date'          =>  date('Y-m-d')
          );

          $this->sale_update_model->log_api($data_api_log);

          $this->sale_update_model->update_sale_data($data);
        }

        $this->sale_update_model->update_last_update($result->cronjob_id);
    }

    private function remove_parentheses($string)
    {
        return preg_replace("/[^0-9]/","", $string);;
    }
}
