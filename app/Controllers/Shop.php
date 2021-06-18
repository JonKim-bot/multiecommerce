<?php


namespace App\Controllers;

use App\Core\BaseController;
use App\Models\ShopModel;
use App\Models\BankModel;
use App\Models\MerchantModel;
use App\Models\TagModel;
use App\Models\ShopTagModel;
use App\Models\ShopFunctionModel;
use App\Models\FunctionModel;


class Shop extends BaseController
{
    public function __construct()
    {
        $this->pageData = [];
        $this->ShopModel = new ShopModel();
        $this->MerchantModel = new MerchantModel();
        $this->BankModel = new BankModel();
        $this->ShopFunctionModel = new ShopFunctionModel();
        $this->FunctionModel = new FunctionModel();

        $this->TagModel = new TagModel();
        $this->ShopTagModel = new ShopTagModel();

        if (
            session()->get('admin_data') == null &&
            uri_string() != 'access/login'
        ) {
            //  redirect()->to(base_url('access/login/'));
            echo "<script>location.href='" .
                base_url() .
                "/access/login';</script>";
        }
        $this->isMerchant = false;
        $this->pageData['tag'] = $this->TagModel->getAll();
        if (session()->get('admin_data')['type'] == 'MERCHANT') {
            //  redirect()->to(base_url('access/login/'));
            $this->isMerchant == true;
        }
        $this->pageData['isMerchant'] = $this->isMerchant;
        $this->pageData['function'] = $this->FunctionModel->getAll();

        // $this->debug( $this->isMerchant);

    }

    

    public function index()
    {
        if ($this->isMerchant) {
            $shop = $this->ShopModel->getWhere([
                'shop_id' => $this->shop_id,
            ]);
            
        } else {
            $shop = $this->ShopModel->getAll();


        }
        $this->pageData['shop'] = $shop;

        echo view('admin/header', $this->pageData);
        echo view('admin/shop/all');
        echo view('admin/footer');
    }


    public function search()
    {
        $like = [
            'shop_name' => $_POST['shop_name'],
        ];

        $shop = $this->ShopModel->getLike($like);
        $this->pageData['shop'] = $shop;

        echo view('admin/header', $this->pageData);
        echo view('admin/shop/all');
        echo view('admin/footer');
    }

    public function add()
    {
        $bank = $this->BankModel->getAll();

        if ($this->isMerchant == true) {
            $this->show_404_if_empty([]);
        }

        if ($_POST) {
            $input = $this->request->getPost();

            $error = false;

            if (!$error) {
                if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                    $file = $this->request->getFile('banner');
                    $new_name = $file->getRandomName();
                    $banner = $file->move('./public/images/shop/', $new_name);
                    if ($banner) {
                        $banner = '/public/images/shop/' . $new_name;
                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }
                if ($_FILES['icon'] and !empty($_FILES['icon']['name'])) {
                    $file = $this->request->getFile('icon');
                    $new_name = $file->getRandomName();
                    $icon = $file->move('./public/images/shop/', $new_name);
                    if ($icon) {
                        $icon = '/public/images/shop/' . $new_name;
                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }

                $input['contact'] = str_replace("-","",$input['contact']);
                $input['contact'] = str_replace("+","",$input['contact']);
                if (!$this->startsWith($input['contact'], '6')) {
                    $input['contact'] = '6' . $input['contact'];
                }

                $data = [
                    'shop_name' => $input['shop'],
                    'slug' => $this->slugify($input['shop']),
                    'email' => $input['email'],
                    'operating_hour' => $input['operating_hour'],
                    'contact' => $input['contact'],
                    'delivery_fee' => $input['delivery_fee'],
                    'address' => $input['address'],
                    // 'bank_holder_name' => $input['bank_holder_name'],
                    // 'bank_account' => $input['bank_account'],
                ];
                if (!empty($icon)) {
                    $data['icon'] = $icon;
                }
                if (!empty($banner)) {
                    $data['image'] = $banner;
                }

                // $this->debug($data);
                // dd($data);

                $this->ShopModel->insertNew($data);

                return redirect()->to(base_url('shop', 'refresh'));
            }
        }

        $this->pageData['bank'] = $bank;
        echo view('admin/header', $this->pageData);
        echo view('admin/shop/add');
        echo view('admin/footer');
    }

    public function is_active_delivery()
    {
        $where = ['shop_id' => $this->shop_id];
        $shop_status = $this->ShopModel->getWhere($where)[0];
        if ($shop_status['is_delivery'] == 1) {
            $is_delivery = 0;
        } else {
            $is_delivery = 1;
        }
        $this->ShopModel->updateWhere($where, ['is_delivery' => $is_delivery]);
        return redirect()->to(base_url('shop', 'refresh'));
    }
    public function is_active_self_pick_up()
    {
        $where = ['shop_id' => $this->shop_id];
        $shop_status = $this->ShopModel->getWhere($where)[0];
        if ($shop_status['is_self_pickup'] == 1) {
            $is_self_pickup = 0;
        } else {
            $is_self_pickup = 1;
        }
        $this->ShopModel->updateWhere($where, [
            'is_self_pickup' => $is_self_pickup,
        ]);
        return redirect()->to(base_url('shop', 'refresh'));
    }
    public function detail($shop_id)
    {
        if ($this->isMerchant == true) {
            $where = [
                'shop.shop_id' => $this->shop_id,

            ];
        } else {
            $where = [
                'shop.shop_id' => $shop_id,
            ];
        }

        $shop = $this->ShopModel->getWhereNormal($where);
        if ($this->isMerchant == true) {
            $where = [
                'shop_id' => $this->shop_id,
            ];
        } else {
            $where = [
                'shop_id' => $shop_id,
            ];
        }
        $merchant = $this->MerchantModel->getWhere($where);

        // $this->show_404_if_empty($admin);

        $this->pageData['shop'] = $shop[0];
        if (!empty($merchant)) {
            $this->pageData['merchant'] = $merchant;
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/shop/detail');
        echo view('admin/footer');
    }
    function startsWith($string, $startString)
    {
        $len = strlen($startString);

        return substr($string, 0, $len) === $startString;
    }

    public function set_status($shop_id)
    {
        $where = [
            'shop.shop_id' => $shop_id,
        ];
        $shop = $this->ShopModel->getWhere($where);
        if ($shop[0]['is_active'] == 1) {
            $is_active = 0;
        } else {
            $is_active = 1;
        }
        $this->ShopModel->updateWhere($where, ['is_active' => $is_active]);
        return redirect()->to(base_url('shop/detail/' . $shop_id, 'refresh'));
    }
    public function edit($shop_id)
    {
        if ($this->isMerchant == true) {
            $shop_id = $this->shop_id;
            $where = [
                'shop.shop_id' => $shop_id,
            ];
        } else {
            $where = [
                'shop.shop_id' => $shop_id,
            ];
            $this->pageData['shop_function'] = array_column($this->ShopFunctionModel->getWhere([ 'shop_function.shop_id' => $shop_id]),'function_id');

        }
        $this->pageData['isMerchant'] = $this->isMerchant;

        $bank = $this->BankModel->getAll();
        $this->pageData['bank'] = $bank;

        $this->pageData['shop'] = $this->ShopModel->getWhereNormal($where)[0];

        if ($_POST) {
            $error = false;

            $input = $this->request->getPost();

            //    $this->debug($input);

            if (!$error) {
                $input['contact'] = str_replace('-', '', $input['contact']);
                if (!$this->startsWith($input['contact'], '6')) {
                    $input['contact'] = '6' . $input['contact'];
                }

                $data = [
                    'shop_name' => $input['shop'],
                    'slug' => $this->slugify($input['shop']),
                    'shop_chinese_name' => $input['shop_name'],
                    // 'url' => $input['url'],
                    // 'lat' => $input['lat'],
                    'insta' => $input['insta'],
                    'bank_id' => $input['bank_id'],
                    'bank_holder_name' => $input['bank_holder_name'],
                    'bank_account' => $input['bank_account'],
                    'facebook' => $input['facebook'],
                    'colour' => $input['colour'],
                    'state' => $input['state'],
                    'taman' => $input['taman'],
                    'address' => $input['address'],
                    'email' => $input['email'],
                    'operating_hour' => $input['operating_hour'],
                    'contact' => $input['contact'],
                    'delivery_fee' => $input['delivery_fee'],
                    'description' => $input['description'],

                    // 'bank_holder_name' => $input['bank_holder_name'],
                    // 'bank_account' => $input['bank_account'],

                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => session()->get('login_id'),
                ];

                // $this->debug($input['shop_function']);
                $this->ShopFunctionModel->hardDeleteWhere([ 'shop_function.shop_id' => $shop_id]);
                if(!empty($input['shop_function'])){
                    foreach($input['shop_function'] as $row_function){
                        
                        $data_ = [
                            'function_id' => $row_function,
                            'shop_id' => $shop_id,
                        ];
                        $this->ShopFunctionModel->insertNew($data_);
                    }
                }

                if ($_FILES['banner'] and !empty($_FILES['banner']['name'])) {
                    $file = $this->request->getFile('banner');
                    $new_name = $file->getRandomName();
                    $banner = $file->move('./public/images/shop/', $new_name);
                    if ($banner) {
                        $banner = '/public/images/shop/' . $new_name;
                        $data['image'] = $banner;
                    } else {
                        $error = true;
                        $error_message = 'Upload failed.';
                    }
                }

                if ($_FILES['icon'] and !empty($_FILES['icon']['name'])) {
                    $file = $this->request->getFile('icon');
                    $new_name = $file->getRandomName();
                    $icon = $file->move('./public/images/shop/', $new_name);
                    if ($icon) {
                        $icon = '/public/images/shop/' . $new_name;
                        $data['icon'] = $icon;
                    }
                }

                if ($_FILES['icon_footer'] and !empty($_FILES['icon_footer']['name'])) {
                    $file = $this->request->getFile('icon_footer');
                    $new_name = $file->getRandomName();
                    $icon = $file->move('./public/images/shop/', $new_name);
                    if ($icon) {
                        $icon = '/public/images/shop/' . $new_name;
                        $data['footer_logo'] = $icon;
                    }
                }

                
                if ($_FILES['header_icon'] and !empty($_FILES['header_icon']['name'])) {
                    $file = $this->request->getFile('header_icon');
                    $new_name = $file->getRandomName();
                    $icon = $file->move('./public/images/shop/', $new_name);
                    if ($icon) {
                        $icon = '/public/images/shop/' . $new_name;
                        $data['header_icon'] = $icon;
                    }
                }

                 
              
                $this->ShopModel->updateWhere($where, $data);
                $where = [
                    'shop_id' => $shop_id,
                ];
                // $this->ShopTagModel->hardDeleteWhere($where);
                // foreach ($_POST['tag_id'] as $tag) {
                //     $data = [
                //         'tag_id' => $tag,
                //         'shop_id' => $shop_id,
                //     ];
                //     $this->ShopTagModel->insertNew($data);
                // }
                $session = session();

                $shop = $this->ShopModel->getWhere($where);
                // $session->set('shop_data', $shop[0]);

                return redirect()->to(
                    base_url('shop/detail/' . $shop_id, 'refresh')
                );
            }
        }

        echo view('admin/header', $this->pageData);
        echo view('admin/shop/edit');
        echo view('admin/footer');
    }

    public function delete($shop_id)
    {
        $this->ShopModel->softDelete($shop_id);

        return redirect()->to(base_url('shop', 'refresh'));
    }
}
