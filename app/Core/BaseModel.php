<?php


namespace App\Core;

use CodeIgniter\Model;

class BaseModel extends Model
{

    protected $tableName;

    protected $primaryKey = 0;

    protected $helpers = ['url', 'form', 'infector', 'session'];

    public function __construct()
    {
        

        parent::__construct();

        $this->fetchTable();
        $this->fetchTablePrimaryKey();

        // $session = \Config\Services::session();
        
        $session = session();
        $uri = service('uri');
        $this->builder = $this->db->table($this->tableName);
        $this->sql = "";

        // $this->AdminModel = new AdminModel();
        // $this->UserModel = new UserModel();

    }


    /**
     * Guess the table name by the model name
     */
    

     
    protected function fetchTable()
    {

        if ($this->tableName == null) {
            $this->tableName = preg_replace('/(M|Model)?$/', '', get_class($this));
            $this->tableName = substr($this->tableName, 11);
            $this->tableName = preg_split('/(?=[A-Z])/',$this->tableName);
            unset($this->tableName[0]);
            $tableName = "";
            foreach($this->tableName as $row){
                $tableName .= $row . "_";
            }
            $this->tableName = substr($tableName, 0, -1);
            $this->tableName = strtolower($this->tableName);
        }
    }

    /**
     * Guess the table name by the model name + '_id'
     */

    protected function fetchTablePrimaryKey()
    {
        if ($this->primaryKey == null) {
            $this->primaryKey = preg_replace('/(M|Model)?$/', '', get_class($this));
            $this->primaryKey = substr($this->primaryKey, 11);
            $this->primaryKey = preg_split('/(?=[A-Z])/',$this->primaryKey);
            unset($this->primaryKey[0]);
            $primaryKey = "";
            foreach($this->primaryKey as $row){
                $primaryKey .= $row . "_";
            }
            $this->primaryKey = substr($primaryKey, 0, -1);
            $this->primaryKey .= "_id";
            $this->primaryKey = strtolower($this->primaryKey);
        }

    }

    public function getAll($limit = '', $page = 1, $filter = array())
    {
        // $this->builder = $this->db->table($this->tableName);
        // $this->builder->select('*');

        // $query = $this->builder->get();
        // return $query->getResultArray();

        $fields = $this->db->getFieldNames($this->tableName);

        $deleted = false;
        foreach ($fields as $row) {
            if ($row == "deleted") {
                $deleted = true;
            }
        }

        $this->setRunningNo();

        $this->builder->select('*');

        if ($deleted) {
            $this->builder->where($this->tableName . ".deleted", 0);
        }
        
        // die($this->builder->getCompiledSelect(false));

        if ($limit != '') {
            $count = $this->getCount($filter);
            $offset = ($page - 1) * $limit;
            $pages = $count / $limit;
            $pages = ceil($pages);
            $pagination = $this->getPaging($limit, $offset, $page, $pages, $filter);

            return $pagination;

            // intval($limit);
            // $this->db->limit($limit, $offset);
        }

        $query = $this->builder->get();
        return $query->getResultArray();

    }

   
    public function unset_array($orgininal)
    {
        $filter = ['deleted','created_date','created_at','modified_date','modified_by','created_by'];

        foreach ($filter as $key => $row) {
            unset($orgininal[$row]);
        }
        
        return $orgininal;
    }
    public function generate_input()
    {
        $fields = $this->db->getFieldData($this->tableName);

        $input_fields = array();
        foreach ($fields as $row) {
            $label = ucwords(str_replace("_", " ", $row->name));

            $html = '<div class="form-group">';
            if (($row->type == "int" or $row->type == "decimal") and substr($row->name, -3) != "_id") {
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label><span style="color:red">*</span>';
                $html .= '<input type="number" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required step="any">';
            } else if ($row->type == "longtext" or $row->type == "text" or $row->type == "longblob") {
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<textarea class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required rows="5"></textarea>';
            } else if ($row->name == "thumbnail" or $row->name == "image" or $row->name == "banner" or $row->name == "banner_xs") {
                $html .= '<div id="preview_' . $row->name . '" class="upload_preview"></div>';
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<input type="file" class="form-control image_input" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required>';
            } else if ($row->name == "password") {
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<input type="password" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required>';
            } else if ($row->name == "email") {
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<input type="email" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required>';
            } else if ($row->type == "date") {
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<input type="text" class="form-control datepicker" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required>';
            } else if (substr($row->name, -3) == "_id" and substr($row->name, 0, -3) != $this->tableName) {
                if (($this->db->tableExists(substr($row->name, 0, -3))) or ((substr($row->name, 0, -3) == "parent"))) {

                    if (substr($row->name, 0, -3) == "parent") {
                        $fields = $this->db->getFieldNames($this->tableName);
                    } else {
                        $fields = $this->db->getFieldNames(substr($row->name, 0, -3));
                    }

                    $field_exists = false;
                    $use_name = false;
                    $use_label = false;
                    $use_role = false;
                    $duplicate_of = false;

                    foreach ($fields as $field_row) {
                        if ($field_row == "duplicate_of") {
                            $duplicate_of = true;
                        }

                        if (substr($row->name, 0, -3) == "parent") {
                            $field_exists = true;
                        }

                        if ($field_row == substr($row->name, 0, -3)) {
                            $field_exists = true;
                        } else if ($field_row == "name") {
                            $field_exists = true;
                            $use_name = true;
                        } else if ($field_row == "label") {
                            $field_exists = true;
                            $use_label = true;
                        } else if ($field_row == "role") {

                            $field_exists = true;
                            $use_role = true;
                        }
                    }

                    if ($field_exists) {
                        $this->builder->select('*');
                        if (substr($row->name, 0, -3) == "parent") {
                            $this->builder->from($this->tableName);
                            $this->builder->where($this->tableName . '.deleted', 0);
                            if ($duplicate_of) {
                                $this->builder->where($this->tableName . ".duplicate_of", 0);
                            }
                        } else {
                            $this->builder->from(substr($row->name, 0, -3));
                            $this->builder->where(substr($row->name, 0, -3) . '.deleted', 0);
                            if ($duplicate_of) {
                                $this->builder->where(substr($row->name, 0, -3) . ".duplicate_of", 0);
                            }
                        }

                        if (substr($row->name, 0, -3) == "role") {
                            $this->builder->where('type', strtoupper($this->tableName));
                            //if the table contain role_id column
                        }

                        $query = $this->builder->get();

                        $result = $query->getResultArray();

                        $temp_label_name = ucwords(str_replace("_", " ", $row->name));
                        // $this->debug(ucwords(substr($row->name, 0, -3)));

                        if (substr($row->name, 0, -3) == "parent") {
                            $html .= '<label for="form_' . $row->name . '">Parent</label>';
                        } else {
                            $html .= '<label for="form_' . $row->name . '">' . ucwords(substr($temp_label_name, 0, -3)) . '</label>';
                        }
                        $html .= '<select class="form-control select2" id="form_' . $row->name . '" name="' . $row->name . '">';
                        foreach ($result as $result_row) {
                            if ($use_name) {
                                $html .= '<option value="' . $result_row[substr($row->name, 0, -3) . '_id'] . '">' . $result_row['name'] . '</option>';
                            } else if ($use_label) {

                                $html .= '<option value="' . $result_row[substr($row->name, 0, -3) . '_id'] . '">' . $result_row['label'] . '</option>';
                            } else if ($use_role) {

                                $html .= '<option value="' . $result_row[substr($row->name, 0, -3) . '_id'] . '">' . $result_row['role'] . '</option>';
                            } else {

                                if (substr($row->name, 0, -3) == "parent") {
                                    $html .= '<option value="' . $result_row[substr($row->name, 0, -3) . '_id'] . '">' . $result_row[$this->tableName] . '</option>';
                                } else {
                                    //generate input field with role id

                                    $html .= '<option value="' . $result_row[substr($row->name, 0, -3) . '_id'] . '">' . $result_row[substr($row->name, 0, -3)] . '</option>';
                                }

                            }
                        }
                        $html .= '</select>';
                    } else {
                        $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                        $html .= '<input type="text" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required>';
                    }
                } else if (substr($row->name, 0, -3) == "parent") {
                    $fields = $this->db->getFieldNames($this->tableName);

                    $field_exists = false;
                    $use_name = false;
                    $use_label = false;
                    $use_role = false;
                    $duplicate_of = false;
                    foreach ($fields as $field_row) {
                        if ($field_row == "duplicate_of") {
                            $duplicate_of = true;
                        }

                        if ($field_row == substr($row->name, 0, -3)) {
                            $field_exists = true;
                        } else if ($field_row == "name") {
                            $field_exists = true;
                            $use_name = true;
                        } else if ($field_row == "label") {
                            $field_exists = true;
                            $use_role = true;
                        } else if ($field_row == "role") {
                            $field_exists = true;
                            $use_role = true;
                        }
                    }

                    $html .= '<label for="form_' . $row->name . '">Parent</label>';
                    $html .= '<select class="form-control select2" id="form_' . $row->name . '" name="' . $row->name . '">';
                    $html .= '<option value="0">None</option>';
                    foreach ($self_data as $self_data_row) {
                        $html .= '<option value="' . $self_data_row[$this->tableName . '_id'] . '">' . $self_data_row[($this->tableName)] . '</option>';
                    }
                    $html .= '</select>';
                }
            } else {
                if ($row->name == "contact") {
                    $html .= '<label for="form_' . $row->name . '">Contact Number</label>';
                } else {
                    $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                }
                $html .= '<input type="text" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required>';
            }
            $html .= '<div class="help-block with-errors"></div>';
            $html .= '</div>';

            $input_fields[$row->name] = $html;
            if ($row->name == "password") {
                $html = '<div class="form-group">';
                $html .= '<label for="form_password2">Confirm Password</label>';
                $html .= '<input type="password" class="form-control" id="form_password2" placeholder="Confirm Password" name="password2" required>';
                $html .= '<div class="help-block with-errors"></div>';
                $html .= '</div>';
                $input_fields['password2'] = $html;
            }
        }

       
        return $this->unset_array($input_fields);
    }
    

    public function generate_edit_input($primary_key)
    {
        $data = $this->getWhere(array(
            $this->tableName . "." . $this->primaryKey => $primary_key,
        ))[0];

        $fields = $this->db->getFieldData($this->tableName);

        $input_fields = array();
        foreach ($fields as $row) {
            $label = ucwords(str_replace("_", " ", $row->name));

            $html = '<div class="form-group">';
            if (($row->type == "int" or $row->type == "decimal") and substr($row->name, -3) != "_id") {
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<input type="number" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required value="' . $data[$row->name] . '" step="any">';
            } else if ($row->type == "longtext" or $row->type == "text" or $row->type == "longblob") {
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<textarea class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required rows="5">' . $data[$row->name] . '</textarea>';
            } else if ($row->name == "thumbnail" or $row->name == "image" or $row->name == "banner" or $row->name == "banner_xs") {
                $html .= '<div id="preview_' . $row->name . '" class="upload_preview"></div>';
                $html .= '<label for="form_' . $row->name . '">' . $label . ' <small>*leave blank to keep previous image</small></label>';
                $html .= '<input type="file" class="form-control image_input" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '">';
            } else if ($row->name == "password") {
                $html .= '<label for="form_' . $row->name . '">Password <small>*leave blank to keep old password</small></label>';
                $html .= '<input type="password" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" >';
            } else if ($row->name == "email") {
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<input type="email" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required value="' . $data[$row->name] . '">';
            } else if ($row->type == "date") {
                $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                $html .= '<input type="text" class="form-control datepicker" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required value="' . date("d-m-Y", strtotime($data[$row->name])) . '">';
            } else if (substr($row->name, -3) == "_id" and substr($row->name, 0, -3) != $this->tableName) {
                if (($this->db->tableExists(substr($row->name, 0, -3))) or ((substr($row->name, 0, -3) == "parent"))) {

                    if (substr($row->name, 0, -3) == "parent") {
                        $fields = $this->db->getFieldNames($this->tableName);
                    } else {
                        $fields = $this->db->getFieldNames(substr($row->name, 0, -3));
                    }

                    $field_exists = false;
                    $use_name = false;
                    $use_label = false;
                    $use_role = false;
                    $duplicate_of = false;
                    foreach ($fields as $field_row) {
                        if ($field_row == "duplicate_of") {
                            $duplicate_of = true;
                        }

                        if (substr($row->name, 0, -3) == "parent") {
                            $field_exists = true;
                        }

                        if ($field_row == substr($row->name, 0, -3)) {
                            $field_exists = true;
                        } else if ($field_row == "name") {
                            $field_exists = true;
                            $use_name = true;
                        } else if ($field_row == "label") {
                            $field_exists = true;
                            $use_label = true;
                        } else if ($field_row == "role") {
                            $field_exists = true;
                            $use_role = true;
                        }
                    }

                    // $this->debug($use_role);

                    if ($field_exists) {
                        $this->builder->select('*');
                        if (substr($row->name, 0, -3) == "parent") {
                            $this->builder->from($this->tableName);
                            $this->builder->where($this->tableName . '.deleted', 0);
                            if ($duplicate_of) {
                                $this->builder->where($this->tableName . ".duplicate_of", 0);
                            }
                        } else {
                            $this->builder->from(substr($row->name, 0, -3));
                            $this->builder->where(substr($row->name, 0, -3) . '.deleted', 0);
                            if ($duplicate_of) {
                                $this->builder->where(substr($row->name, 0, -3) . ".duplicate_of", 0);
                            }
                        }
                        if (substr($row->name, 0, -3) == "role") {
                            $this->builder->where('type', strtoupper($this->tableName));
                        }

                        $query = $this->builder->get();

                        $result = $query->getResultArray();

                        $temp_label_name = ucwords(str_replace("_", " ", $row->name));
                        // $this->debug(ucwords(substr($row->name, 0, -3)));

                        $html .= '<label for="form_' . $row->name . '">' . ucwords(substr($temp_label_name, 0, -3)) . '</label>';
                        $html .= '<select class="form-control" id="form_' . $row->name . '" name="' . $row->name . '">';
                        if (substr($row->name, 0, -3) == "parent") {
                            $html .= '<option value="0">None</option>';
                        }
                        foreach ($result as $result_row) {
                            if ($use_name) {
                                if ($result_row[$row->name] == $data[$row->name]) {
                                    $html .= '<option value="' . $result_row[$row->name] . '" selected>' . $result_row['name'] . '</option>';
                                } else {
                                    $html .= '<option value="' . $result_row[$row->name] . '">' . $result_row['name'] . '</option>';
                                }
                                // $html .= '<option value="' . $result_row[substr($row->name, 0, -3) . '_id'] . '">' . $result_row['name'] . '</option>';
                            } else if ($use_label) {
                                if ($result_row[$row->name] == $data[$row->name]) {
                                    $html .= '<option value="' . $result_row[$row->name] . '" selected>' . $result_row['label'] . '</option>';
                                } else {
                                    $html .= '<option value="' . $result_row[$row->name] . '">' . $result_row['label'] . '</option>';
                                }
                                // $html .= '<option value="' . $result_row[substr($row->name, 0, -3) . '_id'] . '">' . $result_row['name'] . '</option>';
                            } else if ($use_role) {
                                if ($result_row[$row->name] == $data[$row->name]) {
                                    $html .= '<option value="' . $result_row[$row->name] . '" selected>' . $result_row['role'] . '</option>';
                                } else {
                                    $html .= '<option value="' . $result_row[$row->name] . '">' . $result_row['role'] . '</option>';
                                }
                                // $html .= '<option value="' . $result_row[substr($row->name, 0, -3) . '_id'] . '">' . $result_row['name'] . '</option>';
                            } else {
                                if ($result_row[$row->name] == $data[$row->name]) {
                                    if (substr($row->name, 0, -3) == "parent") {
                                        $html .= '<option value="' . $result_row[$row->name] . '" selected>' . $result_row[$this->tableName] . '</option>';
                                    } else {
                                        $html .= '<option value="' . $result_row[$row->name] . '" selected>' . $result_row[substr($row->name, 0, -3)] . '</option>';
                                    }
                                } else {
                                    if (substr($row->name, 0, -3) == "parent") {
                                        $html .= '<option value="' . $result_row[$row->name] . '">' . $result_row[$this->tableName] . '</option>';
                                    } else {
                                        $html .= '<option value="' . $result_row[$row->name] . '">' . $result_row[substr($row->name, 0, -3)] . '</option>';
                                    }

                                }
                            }
                        }
                        $html .= '</select>';
                    } else {
                        $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                        $html .= '<input type="text" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required value="' . $data[$row->name] . '">';
                    }

                } else if (substr($row->name, 0, -3) == "parent") {
                    $self_data = $this->getWhere($where = array(
                        $this->tableName . "_id != " => $primary_key,
                    ));

                    $html .= '<label for="form_' . $row->name . '">Parent</label>';
                    $html .= '<select class="form-control" id="form_' . $row->name . '" name="' . $row->name . '">';
                    $html .= '<option value="0">None</option>';
                    foreach ($self_data as $self_data_row) {
                        if ($self_data_row[$this->tableName . '_id'] == $data[$row->name]) {
                            $html .= '<option value="' . $self_data_row[$this->tableName . '_id'] . '" selected>' . $self_data_row[($this->tableName)] . '</option>';
                        } else {
                            $html .= '<option value="' . $self_data_row[$this->tableName . '_id'] . '">' . $self_data_row[($this->tableName)] . '</option>';
                        }
                    }
                    $html .= '</select>';
                }
            } else {
                if ($row->name == "contact") {
                    $html .= '<label for="form_' . $row->name . '">Contact Number</label>';
                } else {
                    $html .= '<label for="form_' . $row->name . '">' . $label . '</label>';
                }
                $html .= '<input type="text" class="form-control" id="form_' . $row->name . '" placeholder="' . $label . '" name="' . $row->name . '" required value="' . $data[$row->name] . '">';
            }
            $html .= '<div class="help-block with-errors"></div>';
            $html .= '</div>';

            $input_fields[$row->name] = $html;
            if ($row->name == "password") {
                $html = '<div class="form-group">';
                $html .= '<label for="form_password2">Confirm Password <small>*leave blank to keep old password</small></label>';
                $html .= '<input type="password" class="form-control" id="form_password2" placeholder="Confirm Password" name="password2">';
                $html .= '<div class="help-block with-errors"></div>';
                $html .= '</div>';
                $input_fields['password2'] = $html;
            }
        }

        return $this->unset_array($input_fields);
    }


    public function getLike($like, $limit = '', $page = 1, $filter = array())
    {
        $this->builder->select('*');

        $this->builder->like($like);

        if ($limit != '') {
            $count = $this->getCount($filter);
            $offset = ($page - 1) * $limit;
            $pages = $count / $limit;
            $pages = ceil($pages);
            $pagination = $this->getPaging($limit, $offset, $page, $pages, $filter);

            return $pagination;

            // intval($limit);
            // $this->db->limit($limit, $offset);
        }

        $query = $this->builder->get();
        return $query->getResultArray();

    }
    

    public function getWhere($where, $limit = '', $page = 1, $filter = array())
    {
        $this->builder->select('*');
        $this->builder->where($this->tableName . ".deleted", 0);
        $this->builder->where($where);

                // die($this->builder->getCompiledSelect(false));

        if ($limit != '') {
            $count = $this->getCount($filter);
            $offset = ($page - 1) * $limit;
            $pages = $count / $limit;
            $pages = ceil($pages);
            $pagination = $this->getPaging($limit, $offset, $page, $pages, $filter);

            return $pagination;

            // intval($limit);
            // $this->db->limit($limit, $offset);
        }



        $query = $this->builder->get();
        return $query->getResultArray();

    }

    public function getAllWithRole($limit = '', $page = 1, $filter = array())
    {
        $this->builder->select("*, role.role AS role");
        $this->builder->from($this->tableName);
        $this->builder->join("role", $this->tableName . ".role_id = role.role_id", "left");
        $this->builder->where($this->tableName . ".deleted", 0);

        if ($limit != '') {
            $count = $this->getCount($filter);
            $offset = ($page - 1) * $limit;
            $pages = $count / $limit;
            $pages = ceil($pages);
            $pagination = $this->getPaging($limit, $offset, $page, $pages, $filter);

            return $pagination;

            // intval($limit);
            // $this->db->limit($limit, $offset);
        }

        $query = $this->builder->get();
        return $query->getResultArray();

    }

    public function getWhereWithRole($where, $limit = '', $page = 1, $filter = array())
    {
        $this->builder->select("*, role.role AS role");
        $this->builder->from($this->tableName);
        $this->builder->join("role", $this->tableName . ".role_id = role.role_id", "left");
        $this->builder->where($this->tableName . ".deleted", 0);
        $this->builder->where($where);
        $query = $this->builder->get();

        if ($limit != '') {
            $count = $this->getCount($filter);
            $offset = ($page - 1) * $limit;
            $pages = $count / $limit;
            $pages = ceil($pages);
            $pagination = $this->getPaging($limit, $offset, $page, $pages, $filter);

            return $pagination;

            // intval($limit);
            // $this->db->limit($limit, $offset);
        }

        $query = $this->builder->get();
        return $query->getResultArray();
    }

    
    public function insertNew($data)
    {

        $db = db_connect('default'); 
        $this->builder = $this->db->table($this->tableName);
        $this->builder->insert($data);

        return $db->insertID();

    }

    public function updateWhere($where, $data)
    {

        $this->builder = $this->db->table($this->tableName);
        $this->builder->where($where);
        $this->builder->update($data);
    }

    public function softDelete($primaryKey)
    {
        $this->builder = $this->db->table($this->tableName);

        $data = array(
            "deleted" => 1,
        );

        $this->builder->where($this->primaryKey, $primaryKey);
        $this->builder->update($data);

    }

    public function hardDelete($primaryKey)
    {
        $this->builder = $this->db->table($this->tableName);

        $this->builder->where($this->primaryKey, $primaryKey);
        $this->builder->delete();
        

    }
    public function login($username, $password)
    {
        $this->builder = $this->db->table($this->tableName);
        $this->builder->select('*');
        $this->builder->join("role", $this->tableName . '.role_id = role.role_id', 'left');
        $this->builder->where("username = ", $username);
        $this->builder->where("password = SHA2(CONCAT(salt,'" . $password . "'),512)");

        $query = $this->builder->get();
        return $query->getResultArray();
    }
    public function hardDeleteWhere($where)
    {
        $this->builder = $this->db->table($this->tableName);

        $this->builder->where($where);
        $this->builder->delete();
        

    }

    public function getWhereAndPrimaryIsNot($where, $primaryKey)
    {
        $this->builder = $this->db->table($this->tableName);
        $this->builder->select("*");
    $this->builder->where($this->primaryKey . "!=", $primaryKey);
        $this->builder->where($where);

        $query = $this->builder->get();

        return $query->getResultArray();
    }

    public function debug($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        die();
    }

    public function getCount($filter)
    {
        
        $temp_builder = $this->builder;
        if(!empty($filter)){
            foreach($filter as $key => $row){
                if (strpos($key, 'sort') !== false) {
                    $order_by = explode("__", $row);
                    $temp_builder->orderBy($order_by[0] . " " . $order_by[1]);
                } else {
                    $temp_builder->like($key, $row);
                }    
            }
        }

        // die($this->builder->getCompiledSelect(false));

        $this->sql = $this->builder->getCompiledSelect(false);

        $result = $temp_builder->get()->getResultArray(false);

        return count($result);
    }

    public function getPaging($limit, $offset, $page, $pages, $filter)
    {

        $showing_from = $page - 2;
        $showing_to = $page + 2;
        
        $this->setRunningNo($offset);
        $this->builder->limit($limit, $offset);
        $result = $this->builder->get()->getResultArray();
        if($pages == 0 OR $pages == 1){
            $pagination = "";
        } else{
            $pagination = '<nav aria-label="..." >';
            $pagination .= '<ul class="pagination">';
            if ($page > 1) {
                $pagination .= '<li class="page-item">';
                $pagination .= '<a class="page-link previo" data-page="' . ($page - 1) . '">Previous</a>';
                $pagination .= '</li>';    
            }
            if ($page == 1) {
                $pagination .= '<li class="page-item active"><a class="page-link" data-page="#">1</a></li>';
            } else {
                $pagination .= '<li class="page-item"><a class="page-link" data-page="1">1</a></li>';
            }
            if ($showing_from > 1) {
                $pagination .= '<li class="page-item" disabled><span class="page-link">...</span></li>';
            }
            for ($i = 2; $i <= ($pages - 1); $i++) {
                if ($i == $page) {
                    $pagination .= '<li class="page-item active"><a class="page-link" data-page="#">' . $i . '</a></li>';
                } else if($i < $showing_to AND $i > $showing_from) {
                    $pagination .= '<li class="page-item"><a class="page-link" data-page="' . $i . '">' . $i . '</a></li>';
                }
            }
            if ($showing_to < $pages) {
                $pagination .= '<li class="page-item" disabled><span class="page-link">...</span></li>';
            }
            if ($page == $pages) {
                $pagination .= '<li class="page-item active"><a class="page-link" data-page="#">' . $pages . '</a></li>';
            } else {
                $pagination .= '<li class="page-item"><a class="page-link" data-page="' . $pages . '">' . $pages . '</a></li>';
            }
            if ($page < $pages) {
            $pagination .= '<li class="page-item">';
            $pagination .= '<a class="page-link" data-page="' . ($page + 1) . '">Next</a>';
            $pagination .= '</li>';
            }
            $pagination .= '</ul>';
            $pagination .= '</nav>';
        }
        $data = array(
            "result" => $result,
            "pagination" => $pagination,
            "start_no" => 1 + $offset,
        );
        return $data;
        // $this->debug($sql);
    }
   
    function checkSlug($where){
        $this->builder->select("*");
        $this->builder->from($this->tableName);
        $this->builder->where($where);
        $query = $this->builder->get();
        $existed = $query->getResultArray();
        if(!empty($existed)){
            return true;
        }else{
            return  false;
        }
    }
    function setRunningNo($index = 0){
        $sql = "SET @no = " . $index;
        $this->db->query($sql);
    }

}
