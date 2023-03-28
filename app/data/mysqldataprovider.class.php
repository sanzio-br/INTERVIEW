<?php


class mysqlDataProvider extends DataProvider
{
    function __construct($source)
    {
        $this->source = $source;
    }

    public function get_users()
    {
        return $this->query('SELECT id_number,name,phone,email,SUM(amount) AS contributions ,active FROM `tinypesa` JOIN `users` ON Uid = id GROUP BY Uid, name');
    }
    public function get_all_users()
    {
        return $this->query('SELECT * FROM users');
    }
    public function get_transactions()
    {
        return $this->query('SELECT * FROM tinypesa');
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
    public function update_pass($id, $password)
    {
        $this->execute('UPDATE users SET password = :password  WHERE id = :id', [
            ':password' => $password,
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
    public function get_all_users_transactions($key)
    {
        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $sql = 'SELECT name FROM users FULL JOIN transactions on id = Uid';
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
    public function add_user_transactions($CheckoutRequestID, $ResultCode, $Amount, $MpesaReceiptNumber, $PhoneNumber)
    {
        $id = $this->query('SELECT id FROM `users` WHERE phone = :phone', [":phone" => $PhoneNumber]);
        if (!empty($id[0])) {
            $this->execute('INSERT INTO tinypesa (Uid,CheckoutRequestID,ResultCode,amount,MpesaReceiptNumber,PhoneNumber) VALUES (:Uid,:CheckoutRequestID,:ResultCode,:amount,:MpesaReceiptNumber,:PhoneNumber)', [
                ':Uid' => $id[0]->id,
                ':CheckoutRequestID' => $CheckoutRequestID,
                ':ResultCode' => $ResultCode,
                ':amount' => $Amount,
                ':MpesaReceiptNumber' => $MpesaReceiptNumber,
                ':PhoneNumber' => $PhoneNumber
            ]);

        }
    }
    public function get_users_transactions()
    {
        return $this->query('SELECT id, name, MpesaReceiptNumber, amount, time FROM `users` INNER JOIN `tinypesa` WHERE Uid = id');
    }
    public function get_user_transactions($id)
    {
        return $this->query("SELECT id, name, MpesaReceiptNumber, amount , time FROM `users` INNER JOIN `tinypesa` WHERE Uid = id AND id = $id");
    }
    public function get_all_transactions_totals()
    {
        return $this->query('SELECT SUM(amount) FROM `tinypesa`');
    }
    public function get_user_transactions_totals($id)
    {
        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $sql = 'SELECT SUM(amount) FROM `tinypesa` WHERE Uid = :id';
        $smt = $db->prepare($sql);

        $smt->execute([
            ':id' => $id,
        ]);
        $data = $smt->fetchAll(PDO::FETCH_CLASS, 'user');

        if (empty($data)) {
            return;
        }
        $smt = null;
        $db = null;

        return $data[0];

    }
    public function get_all_user_transactions_totals($id)
    {
        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $sql = 'SELECT SUM(amount) FROM `tinypesa` WHERE Uid = id ';
        $smt = $db->prepare($sql);

        $smt->execute([
            ':id' => $id,
        ]);
        $data = $smt->fetchAll(PDO::FETCH_CLASS, 'user');

        if (empty($data)) {
            return;
        }
        $smt = null;
        $db = null;

        return $data[0];

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