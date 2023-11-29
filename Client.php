<?php
error_reporting(1);

$url = 'http://asrulmaliy369.pythonanywhere.com/api/';
class Client
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
        unset($url);
    }

    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
        unset($data);
    }
    
    // ============================ TAMPIL SEMUA DATA =============================================

    public function tampil_semua_data_categories()
    {
        $client = curl_init($this->url . "categories");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($data, $client, $response);
    }

    public function tampil_semua_data_detail_barang()
    {
        $client = curl_init($this->url . "detail-barangs/");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($data, $client, $response);
    }

    public function tampil_semua_data_produk()
    {
        $client = curl_init($this->url . "products");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($data, $client, $response);
    }
    public function tampil_semua_data_supplier()
    {
        $client = curl_init($this->url . "suppliers");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($data, $client, $response);
    }
    public function tampil_semua_data_cart()
    {
        $client = curl_init($this->url . "cartitems");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($data, $client, $response);
    }
    // ===========================================================================================
    // ============================ TAMPIL DATA ==================================================

    public function tampil_data_categories($id)
    {
        $id = $this->filter($id);
        $client = curl_init($this->url . "categories/" . $id . "/?format=json");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($id, $client, $response, $data);
    }

    public function tampil_data_detail_produk($id)
    {
        $id = $this->filter($id);
        $client = curl_init($this->url . "detail-barangs/" . $id . "/?format=json");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($id, $client, $response, $data);
    }

    public function tampil_data_produk($id)
    {
        $id = $this->filter($id);
        $client = curl_init($this->url . "products/" . $id . "/?format=json");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($id, $client, $response, $data);
    }
    public function tampil_data_supplier($id)
    {
        $id = $this->filter($id);
        $client = curl_init($this->url . "suppliers/" . $id . "/?format=json");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        return $data;

        unset($id, $client, $response, $data);
    }
    // ===========================================================================================

    // ============================ TAMBAH DATA ==================================================
    public function tambah_data_kategori($data)
    {
        $date = date('Y-m-d H:i:s');
        $data = [
            "id " => $data['id'],
            "title" => $data['title'],
            "imageUrl" => $data['imageUrl'],
            "description" => $data['description'],
            "date_updated" => $date,
            "date_created" => $date,
        ];
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url . "categories");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function tambah_data_detail_produk($data)
    {
        $date = date('Y-m-d H:i:s');
        $data = [
            "name" => $data['name'],
            "imageUrl" => $data['imageUrl'],
            "detail" => $data['detail'],
            "status" => $data['status'],
            "date_updated" => $date,
            "date_created" => $date,
        ];
        print_r($data);
        // $c = curl_init();
        // curl_setopt($c, CURLOPT_URL, $this->url . "products");
        // curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($c, CURLOPT_POST, true);
        // curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        // $response = curl_exec($c);
        // curl_close($c);
        // unset($data, $c, $response);
    }

    public function tambah_data_produk($data)
    {
        $data = [
            "id" => $data['id'],
            "category_id" => $data['category_id'],
            "detail_barang_id" => $data['detail_barang_id'],
            "product_tag" => $data['product_tag'],
            "title" => $data['title'],
            "price" => $data['price'],
            "description" => $data['description'],
        ];

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }
    // ===========================================================================================

    // ============================ UBAH DATA ====================================================

    public function ubah_data_kategori($data)
    {
        // Build the JSON data
        $date = date('Y-m-d H:i:s');
        $data = [
            'id' => $data['id'],
            'title' => $data['title'],
            'imageUrl' => $data['imageUrl'],
            'description' => $data['description'],
            "date_updated" => $date,
        ];
        $c = curl_init($this->url . "categories/" . $data['id'] . "/");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($c, CURLOPT_POSTFIELDS, http_build_query($data));
        $response = curl_exec($c);
        curl_close($c);
        unset($data1, $c, $response);
    }

    public function ubah_data_detail_produk($data)
    {
        $date = date('Y-m-d H:i:s');
        $data = [
            "id" => $data['id'],
            "name" => $data['name'],
            "imageUrl" => $data['imageUrl'],
            "detail" => $data['detail'],
            "status" => $data['status'],
            "date_updated" => $date,
        ];
        // print_r($data);
        $c = curl_init($this->url . "detail-barangs/" . $data['id']. "/");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($c, CURLOPT_POSTFIELDS, http_build_query($data));
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function ubah_data_produk($data)
    {
        $data = [
            "id" => $data['id'],
            "category" => $data['category'],
            "detail_barang" => $data['detail_barang'],
            "product_tag" => $data['product_tag'],
            "title" => $data['title'],
            "price" => $data['price'],
            "description" => $data['description'],
            "supplier" => $data['supplier'],
        ];
        print_r($data);
        $c = curl_init($this->url . "products/" . $data['id'] . "/");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($c, CURLOPT_POSTFIELDS, http_build_query($data));
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
        // You can unset variables here or later as needed.
    }
    // ===========================================================================================

    // ============================ HAPUS DATA ===================================================

    public function hapus_data_kategori($data)
    {
        $id = $this->filter($data['id']);
        $data = ['id' => $id];
        $c = curl_init($this->url . "categories/" . $data['id'] . "/");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id, $data, $c, $response);
        // You can unset variables here or later as needed.
    }

    public function hapus_data_detail_produk($data)
    {
        $id = $this->filter($data['id']);
        $data = ['id' => $id];
        $c = curl_init($this->url . "detail-barangs/" . $data['id'] . "/");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id, $data, $c, $response);
    }

    public function hapus_data_produk($data)
    {
        $id = $this->filter($data['id']);
        $data = ['id' => $id];
        $c = curl_init($this->url . "products/" . $data['id'] . "/");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id, $data, $c, $response);
    }

    public function __destruct()
    {
        unset($this->url);
    }
}

$abc = new Client($url);
// echo "babi";
// print_r($abc->tampil_semua_data_supplier());
// print_r($abc->tampil_data_categories(1));
// $p=$abc->tampil_data_categories(1);
// print_r($p);