# 🚚 TruckBackend

Backend API for truck and logistics management built with **Laravel (PHP framework)**.

This project is the server side for managing trucks, deliveries, drivers, routes, and related logistics operations.

---

## 📌 Features

- 🚛 Truck, driver and route management
- 🔐 Authentication (Laravel built-in auth)
- 📍 REST API endpoints
- 📊 Resource controllers
- 📦 Simple scalable architecture
- 🧪 Tested routes

---

## 🧰 Tech Stack

- **Framework:** Laravel (PHP)
- **Language:** PHP
- **Database:** MySQL / PostgreSQL (configurable)
- **Tools:** Composer, Artisan, Laravel Migrations, Seeder

---

## 📁 Project Structure
ruckbackend/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
├── routes/
├── tests/
├── .env.example
├── composer.json
├── README.md


---

## 🚀 Getting Started

### 1️⃣ Clone the repo

```bash
git clone https://github.com/alielgarhi/truckbackend.git
cd truckbackend
composer install
3️⃣ Configure Environment
Copy the example .env.example file to .env:
cp .env.example .env
Set your database credentials:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db
DB_USERNAME=your_user
DB_PASSWORD=your_pass

4️⃣ Generate App Key
php artisan key:generate

5️⃣ Run Migrations
php artisan migrate

6️⃣ Start Server
php artisan serve


Server runs on http://localhost:8000
 by default.

📌 Available Routes (examples)
Method	Endpoint	Description
GET	/api/trucks	List trucks
POST	/api/trucks	Create a new truck
GET	/api/drivers	List drivers
POST	/api/routes	Create a route

(Exact routes depend on how controllers are defined.)

🗂 API Usage

Use tools like Postman or Insomnia to test API routes.

🧪 Testing
php artisan test
