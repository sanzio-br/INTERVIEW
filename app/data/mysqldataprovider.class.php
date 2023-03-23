<?php


class mysqlDataProvider extends DataProvider
{
    function __construct($source)
    {
        $this->source = $source;
    }

    public function get_users()
    {
        return $this->query('SELECT * FROM users');
    }

    public function get_user($email)
    {
        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $sql = 'SELECT * FROM users WHERE email = :id';
        $smt = $db->prepare($sql);

        $smt->execute([
            ':id' => $email,
        ]);
        $data = $smt->fetchAll(PDO::FETCH_CLASS, 'user');

        if (empty($data)) {
            return;
        }
        $smt = null;
        $db = null;

        return $data[0];
    }
    public function get_user_by_id($key)
    {
        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $sql = 'SELECT * FROM users WHERE id = :id';
        $smt = $db->prepare($sql);

        $smt->execute([
            ':id' => $key,
        ]);
        $data = $smt->fetchAll(PDO::FETCH_CLASS, 'user');

        if (empty($data)) {
            return;
        }
        $smt = null;
        $db = null;

        return $data[0];
    }

    public function update_user($id, $id_number, $name, $phone, $email)
    {
        $this->execute('UPDATE users SET id_number = :id_number, name = :name, phone = :phone,email = :email  WHERE id = :id', [
            ':id_number' => $id_number,
            ':name' => $name,
            ':phone' => $phone,
            ':email' => $email,
            ':id' => $id
        ]);

    }
    public function deactivate_user($key)
    {
        $this->execute(
            'UPDATE users SET active = :active WHERE id = :id',
            [
                ':id' => $key,
                ':active' => 0
            ]
        );
    }
    public function activate_user($key)
    {
        $this->execute(
            'UPDATE users SET active = :active WHERE id = :id',
            [
                ':id' => $key,
                ':active' => 1
            ]
        );
    }
    public function delete_user($key)
    {
        $this->execute('DELETE FROM users WHERE id = :id', [':id' => $key]);
    }

    public function search_terms($search)
    {
        return $this->query('SELECT * FROM terms WHERE term LIKE :search or defination LIKE :search ', [':search' => '%' . $search . '%']);

    }

    public function add_user($id_number, $name, $phone, $email)
    {
        $this->execute('INSERT INTO users (id_number,name,phone,email) VALUES (:id_number,:name,:phone,:email)', [
            ':id_number' => $id_number,
            ':name' => $name,
            ':phone' => $phone,
            ':email' => $email,
        ]);
    }

    private function query($sql, $sql_params = [])
    {
        $db = $this->connect();

        if ($db == null) {
            //return array to avoid errors
            return [];
        }

        $query = null;

        if (empty($sql_params)) {
            $query = $db->query($sql);
        } else {
            $query = $db->prepare($sql);
            $query->execute($sql_params);
        }
        $data = $query->fetchAll(PDO::FETCH_CLASS, 'user');

        $query = null;
        $db = null;

        return $data;
    }
    private function execute($sql, $sql_params)
    {
        $db = $this->connect();

        if ($db == null) {
            return;
        }
        $smt = $db->prepare($sql);

        $smt->execute($sql_params);

        $smt = null;
        $db = null;
    }
    private function connect()
    {
        try {
            return new PDO($this->source, CONFIG['db_user'], CONFIG['db_password']);
            // return $con;

        } catch (PDOException $e) {
            return "error";
        }
    }
}