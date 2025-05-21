# 👨‍💻 User Authentication System in PHP 

A simple and secure **user login, registration, and profile management system** built using **PHP**, **MySQL**, and **Bootstrap 4**.

---

## ✨ Features

- ✅ User Registration with Email/Username
- ✅ Secure Login using PHP sessions
- ✅ Forgot Password Flow
- ✅ Edit Profile & Upload Profile Picture
- ✅ Change Password
- ✅ Logout
- ✅ Bootstrap 4 Responsive UI
- ✅ Session-based authentication
- ✅ MySQL database integration


---

## ⚙️ Requirements

- PHP 7.x or 8.x
- MySQL/MariaDB
- Apache/Nginx server (XAMPP/LAMP recommended)
- Web browser

---

## 🚀 Setup Instructions

1. **Clone the Repository**
   ```bash
   git clone https://github.com/rockstarmonil/user-auth-php.git
   cd user-auth-php
   
2. **Import the Database**

   * Create a MySQL database (e.g., `user_auth`)
   * Import the SQL file (you may create one if not already):

     ```sql
     CREATE TABLE `users` (
       `id` INT NOT NULL AUTO_INCREMENT,
       `username` VARCHAR(100),
       `fname` VARCHAR(100),
       `lname` VARCHAR(100),
       `email` VARCHAR(100) UNIQUE,
       `password` VARCHAR(255),
       `image` VARCHAR(255),
       PRIMARY KEY (`id`)
     );
     ```

3. **Configure Database**

   * Edit `config.php`:

     ```php
     <?php
     $dbc = mysqli_connect("localhost", "root", "", "user_auth") 
         or die("Database connection failed");
     session_start();
     ?>
     ```

4. **Run the App**

   * Place the project inside your `htdocs` or server root.
   * Visit `http://localhost/user-auth-php/login.php` in your browser.

---



## 🛡️ Security Tips

* Always hash passwords using `password_hash()`
* Use prepared statements to prevent SQL injection (e.g., with PDO or MySQLi)
* Add CSRF tokens in forms
* Enable HTTPS in production

---

## 📌 To-Do / Improvements

* [ ] Use `password_hash()` and `password_verify()` instead of plain passwords
* [ ] Add email verification
* [ ] Use PDO for secure queries
* [ ] Add profile image validation
* [ ] Refactor HTML using components for reuse

---

## 🙌 Credits

Made with ❤️ by [Monil](https://github.com/rockstarmonil)

---

## 📄 License

This open-source project is available under the [MIT License](LICENSE).

### 📝 Notes:
- If you're adding screenshots, create a `screenshots/` folder and upload the images.
- Make sure to add a `LICENSE` file if using MIT or another license.
- Rename the repo appropriately (like `php-auth-system`) if needed.
