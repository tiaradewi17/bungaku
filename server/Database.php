<?php
error_reporting(1); //error ditampilkan

class Database
{   
    private $host = "localhost";
    private $dbname = "bunga";
    private $user = "root";
    private $password = "";
    private $port = "3306";
    private $conn;

    // function yang pertama kali di-load saat class dipanggil
    public function __construct()
    { //koneksi database
        try
        { 
            $this->conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8", $this->user, $this->password);
        
        } catch (PDOException $e)
        {    
            echo "Koneksi Tidak Berhasil";
        }  
    }

    // Operasi CRUD untuk tabel Customers
    public function tampil_semua_customers()
    {   
        $query = $this->conn->prepare("SELECT customer_id, first_name, last_name, email, phone_number, level_id FROM customers ORDER BY customer_id");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
        return $data;
    }

    // Fungsi untuk menampilkan satu customer berdasarkan customer_id
    public function tampil_customers($customer_id)
    {  
        $query = $this->conn->prepare("SELECT customer_id, first_name, last_name, email, phone_number, level_id FROM customers WHERE customer_id=?");
        $query->execute(array($customer_id));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($customer_id, $data);
    }

    // Fungsi untuk menambah customer
    public function tambah_customers($data)
    {   
        $query = $this->conn->prepare("INSERT INTO customers (customer_id, first_name, last_name, email, phone_number, level_id) VALUES (?,?,?,?,?,?)");
        $query->execute(array($data['customer_id'], $data['first_name'], $data['last_name'], $data['email'], $data['phone_number'], $data['level_id']));
        $query->closeCursor();
        unset($data);
    }

    // Fungsi untuk mengubah data customer
    public function ubah_customers($data)
    {   
        $query = $this->conn->prepare("UPDATE customers SET first_name=?, last_name=?, email=?, phone_number=?, level_id=? WHERE customer_id=?");
        $query->execute(array( $data['first_name'], $data['last_name'], $data['email'], $data['phone_number'], $data['level_id'],$data['customer_id']));
        $query->closeCursor();
        unset($data);
    }

    // Fungsi untuk menghapus customer berdasarkan customer_id
    public function hapus_customers($customer_id)
    {   
        $query = $this->conn->prepare("DELETE FROM customers WHERE customer_id=?");
        $query->execute(array($customer_id));
        $query->closeCursor();
        unset($customer_id);
    }

    // Operasi CRUD untuk tabel Orders
    public function tampil_semua_orders()
    {   
        $query = $this->conn->prepare("SELECT order_id, customer_id, order_date, total_amount, shipping_address, product_id FROM orders ORDER BY order_id");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }
    public function tampil_orders($order_id)
    {  
        $query = $this->conn->prepare("SELECT order_id, customer_id, order_date, total_amount, shipping_address, product_id FROM orders WHERE order_id=?");
        $query->execute(array($order_id));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($order_id, $data);
    }

    public function tambah_orders($data)
    {   
        $query = $this->conn->prepare("INSERT INTO orders (order_id, customer_id, order_date, total_amount, shipping_address, product_id) VALUES (?,?,?,?,?,?)");
        $query->execute(array($data['order_id'], $data['customer_id'], $data['order_date'], $data['total_amount'], $data['shipping_address'],$data['product_id']));
        $query->closeCursor();
        unset($data);
    }

    public function ubah_orders($data)
    {   
        $query = $this->conn->prepare("UPDATE orders SET  customer_id=?, order_date=?, total_amount=?, shipping_address=?, product_id=? WHERE order_id=?");
        $query->execute(array($data['customer_id'], $data['order_date'], $data['total_amount'], $data['shipping_address'], $data['order_id'],$data['order_id']));
        $query->closeCursor();
        unset($data);
    }

    public function hapus_orders($order_id)
    {   
        $query = $this->conn->prepare("DELETE FROM orders WHERE order_id=?");
        $query->execute(array($order_id));
        $query->closeCursor();
        unset($order_id);
    }
    public function tampil_semua_products()
    {   
        $query = $this->conn->prepare("SELECT product_id, product_name, category, price, stock_quantity FROM products ORDER BY product_id");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }
    public function tampil_products($product_id)
    {  
        $query = $this->conn->prepare("SELECT product_id, product_name, category, price, stock_quantity FROM products WHERE product_id=?");
        $query->execute(array($product_id));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($product_id, $data);
    }

    public function tambah_products($data)
    {   
        $query = $this->conn->prepare("INSERT INTO products (product_id, product_name, category, price, stock_quantity) VALUES (?,?,?,?,?)");
        $query->execute(array($data['product_id'], $data['product_name'], $data['category'], $data['price'], $data['stock_quantity']));
        $query->closeCursor();
        unset($data);
    }

    public function ubah_products($data)
    {   
        $query = $this->conn->prepare("UPDATE products SET  product_name=?, category=?, price=?, stock_quantity=? WHERE product_id=?");
        $query->execute(array($data['product_name'], $data['category'], $data['price'], $data['stock_quantity'], $data['product_id']));
        $query->closeCursor();
        unset($data);
    }

    public function hapus_products($product_id)
    {   
        $query = $this->conn->prepare("DELETE FROM products WHERE product_id=?");
        $query->execute(array($product_id));
        $query->closeCursor();
        unset($product_id);
    }
}
?>
