<?php

class Api extends CI_Controller
{
    private $version = 1;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Api_model', 'model');
    }

    public function index()
    {
        echo response(
            true,
            'Hi there',
            ['version' => $this->version]
        );
    }

    public function login()
    {
        $data = $this->input->post();
        echo $this->model->login($data);
    }

    public function register()
    {
        $data = $this->input->post();
        echo $this->model->register($data);
    }

    public function kategori($id = null)
    {
        echo $this->model->getKategori($id);
    }

    public function kecamatan($id = null)
    {
        echo $this->model->getKecamatan($id);
    }

    public function kelurahan($id = null)
    {
        echo $this->model->getKelurahan($id);
    }

    public function kelurahanByKecamatan($id_kec = null)
    {
        echo $this->model->getKelurahanByKecamatan($id_kec);
    }

    public function pelayanan($id = null)
    {
        echo $this->model->getPelayanan($id);
    }

    public function bengkel($id = null)
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $this->_getBengkel($id);
                break;
            case 'POST':
                $this->_addBengkel($this->input->post());
                break;
            case 'DELETE':
                $this->_deleteBengkel($id);
                break;
            default:
                return http_response_code(404);
        }
    }

    private function _getBengkel($id)
    {
        $filters = $this->input->get();
        echo $this->model->getBengkel($id, $filters);
    }

    private function _addBengkel($data)
    {
        echo $this->model->addBengkel($data);
    }

    private function _deleteBengkel($data)
    {
        echo $this->model->deleteBengkel($data);
    }

    public function test()
    {
        $operasional = $_POST['operasional'];
        $test = '';
        $decoded = json_decode($operasional);
        foreach ($decoded as $e) {
            $test .=  "{$e->jam_start}, ";
        }
        echo response(true, '', [
            "POST" => $_POST,
            "FILES" => $_FILES,
        ]);
    }
}
