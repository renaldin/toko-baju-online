<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ChecKout_model extends MY_Model
{

    public $table = 'orders';

    public function getDefaultValues()
    {
        return [
            'name'      => '',
            'address'   => '',
            'phone'     => '',
            'metode_pembayaran'     => '',
            'ekspedisi' => '',
            'status'    => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'name',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'address',
                'label' => 'Alamat',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'phone',
                'label' => 'Telepon',
                'rules' => 'trim|required|max_length[15]'
            ],
            [
                'field' => 'ekspedisi',
                'label' => 'Ekspedisi',
                'rules' => 'trim|required|max_length[15]'
            ],
            [
                'field' => 'metode_pembayaran',
                'label' => 'Metode Pembayaran',
                'rules' => 'trim|required|max_length[15]'
            ],
        ];

        return $validationRules;
    }
}

/* End of file Checout_model.php */
