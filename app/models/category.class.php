<?php 

namespace app\models;

Class Category {

    public function create($data) {

        $DB = \app\models\Database::newInstance();

        $arr["category"]    = ucwords($data->category);
        $arr["parent"]      = ucwords($data->parent);

        if (!isset($_SESSION["error"]) || $_SESSION["error"] == "") {

            $query = "insert into categories (category,parent) values (:category,:parent)";
            $check = $DB->write($query,$arr);

            if ($check) {

                return true;
            }
            
        }

        return false;

    }

    public function edit($data) {

        $DB = \app\models\Database::newInstance();
        $arr['id'] = $data->id;
        $arr['category'] = $data->category;
        $arr['parent'] = $data->parent;
        $query = "update categories set category = :category, parent = :parent where id = :id limit 1";
        $DB->write($query,$arr);

    }

    public function delete($id) {

        $DB = \app\models\Database::newInstance();
        $id = (int)$id;
        $query = "delete from categories where id = '$id' limit 1";
        $DB->write($query);

    }

    public function get_all() {

        $DB = \app\models\Database::newInstance();
        return $DB->read("select * from categories order by id desc");
        
    }

    public function get_all_disabled() {
        
        $DB = \app\models\Database::newInstance();
        $query = "select category from categories where disabled = 0";
        $result = $DB->read($query);

        $_SESSION['category_data'] = $result;

    }

    public function get_one_by_category($category) {

        $DB = \app\models\Database::newInstance();
        $data = $DB->read("select id from categories where category = '$category' limit 1");
        return $data[0]->id;        
    }

    public function get_one($id) {

        $id = (int)$id;

        $DB = \app\models\Database::newInstance();
        $data = $DB->read("select * from categories where id = '$id' limit 1");
        return $data[0];
        
    }

    public function make_table($categories) {

        $result = "";
        if (is_array($categories)) {
            foreach ($categories as $cat_row) {

                $color = $cat_row->disabled ? "#ffb84d" : "#00aeef";
                $cat_row->disabled = $cat_row->disabled ? "Disabled" : "Enabled";
                
                $args = $cat_row->id.",'".$cat_row->disabled."'";
                $edit_args = $cat_row->id.",'".$cat_row->category."',".$cat_row->parent;
                $parent = "";

                foreach ($categories as $cat_row2) {

                    if($cat_row->parent == $cat_row2->id) {
                        
                        $parent = $cat_row2->category;
                    }

                }

                $result .= "<tr>";

                    $result .= '
                    <td><a href="basic_table.html#">' . $cat_row->category . '</a></td>
                    <td><a href="basic_table.html#">' . $parent . '</a></td>
                    <td><span onclick="disableRow('.$args.')" class="status" style="background-color:'.$color.';">' . $cat_row->disabled . '</span></td>
                    <td>
                        <button onclick="showEditCategory('.$edit_args.',event)" class="rounded btn-blue"><i class="fa fa-pencil"></i></button>
                        <button onclick="deleteRow('.$cat_row->id.')" class="rounded btn-delete"><i class="fa fa-trash-o "></i></button>
                    </td>
                    ';
                
                $result .= "</tr>";

            }

        }

        return $result;

    }
}