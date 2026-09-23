# Online Donation and Charity Management System

A complete BCA final-year PHP + MySQL project reconstructed from the supplied PDF reference.

## Reference implemented
- MySQL database connection (`charity_db`)
- User registration/login with sessions
- Admin dashboard with sidebar, cards, users, donations, campaigns and reports
- Donation form with donor details, amount and payment method (Card/UPI/Net Banking)
- Campaign management
- Volunteer registration/list
- Donation history and item donation recording
- Search/filterable donation report
- Responsive styling

## Requirements
- XAMPP/WAMP/LAMP
- PHP 8+
- MySQL/MariaDB
- Browser

## Installation
1. Copy the `charity_project` folder into `xampp/htdocs/`.
2. Start Apache and MySQL from XAMPP.
3. Open phpMyAdmin and import `sql/charity_db.sql`.
4. Open `http://localhost/charity_project/`.
5. Admin login: **admin@charity.com** / **admin123**
6. Register a normal donor account from the Register page.

## Database configuration
Edit `includes/db.php` if your MySQL username/password differs from the reference setup. The reference PDF uses `localhost`, `root`, blank password and database `charity_db`.

## Important
The payment methods in this academic project record a donation transaction in the database; they do not connect to a live payment gateway.
