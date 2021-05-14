<?php namespace App\Controllers;


use App\Models\UserModel;

class API extends BaseController
{

    public function __construct()
    {

        $this->pageData = array();
        $this->UserModel = new UserModel();

    }

    public function register()
    {

        if ($_POST) {

            $input = $this->request->getPost();

            $error = false;

            $exists = $this->checkExists($input["username"]);

            if ($exists) {
                $error = true;
                $message = "Username already exists.";
            }

            if ($input["password"] != $input["password2"]) {
                $error = true;
                $message = "Passwords do not match";
            }

            if(!empty($input['referal_code'])){
                $where = array(
                    'referral_code' => $input['referal_code'],
                );

                $user = $this->UserModel->getWhere($where);
                if(!empty($user)){
                    $referral_id = $user[0]['user_id'];
                } else {
                    $error = true;
                    $message = "Invalid referral code";
                }
            }

            if (!$error) {

                $hash = $this->hash($input['password']);

                $data = array(
                    'role_id' => 2,
                    'username' => $input['username'],
                    'contact' => $input['contact'],
                    'password' => $hash['password'],
                    'salt' => $hash['salt'],
                    'id_no' => $input['id_no'],
                    'tax_no' => $input['tax_no'],
                    'referral_code' => $this->generateRandomString(),
                );

                if(!empty($referral_id)){
                    $data['referral_id'] = $referral_id;
                } else {
                    $data['referral_id'] = 0;
                }

                $this->UserModel->insertNew($data);
                $this->UserModel->updateRank($input['referral_id']);

                die(json_encode(array(
                    "status" => true,
                )));
            } else {
                die(json_encode(array(
                    "status" => false,
                    "message" => $message,
                )));
            }

        }
    }

   
}
