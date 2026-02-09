# 🎟️ Event Booking System | Seminar & Venue Management

![Project Status](https://img.shields.io/badge/Status-Completed-success)
![Tech Stack](https://img.shields.io/badge/Stack-PHP%20%7C%20MySQL-blue)
![License](https://img.shields.io/badge/License-MIT-green)

> **A comprehensive web-based platform for managing events, booking tickets, and handling venue logistics.**
> *Designed to streamline the gap between Event Organizers and Attendees with a seamless digital interface.*

---

## 📖 Overview

The **Event Booking System** is a full-stack web application that allows users to browse upcoming seminars, workshops, and entertainment events, and book seats in real-time. 

Unlike standard booking forms, this system implements **Role-Based Access Control (RBAC)**, separating the logic for generic Users (Attendees) and Administrators (Organizers). It solves the problem of manual registration by automating seat allocation and generating digital booking references.

---

## 🚀 Key Features

### 👤 User Module (Attendee)
* **Event Discovery:** Browse events by category (Seminars, Concerts, Workshops).
* **Real-Time Availability:** View seat availability before booking.
* **Instant Booking:** User-friendly form to reserve spots instantly.
* **Booking History:** A dedicated dashboard to view past and upcoming reservations.

### 🛠️ Admin Module (Organizer)
* **Event CRUD:** Create, Read, Update, and Delete event listings.
* **Attendee Management:** View the list of registered users for any specific event.
* **Venue Logic:** Set maximum capacity limits to prevent overbooking.
* **Reporting:** (Optional) Generate simple lists of attendees for check-in.

---

## 🛠️ Technology Stack

| Component | Technology Used |
| :--- | :--- |
| **Frontend** | HTML5, CSS3, Bootstrap (for responsiveness), JavaScript |
| **Backend** | Core PHP |
| **Database** | MySQL (Relational Schema) |
| **Server** | Apache (XAMPP/WAMP) |

---

## 📸 Application Previews

| **Event Catalog** | **Booking Interface** |
|:---:|:---:|
| <img src="screenshots/home_page.png" alt="Home Page" width="400"> | <img src="screenshots/booking_page.png" alt="Booking Page" width="400"> |

| **Admin Dashboard** | **User Profile** |
|:---:|:---:|
| <img src="screenshots/admin_panel.png" alt="Admin Dashboard" width="400"> | <img src="screenshots/user_dashboard.png" alt="User Dashboard" width="400"> |

*(Note: Screenshots are strictly for demonstration. Please clone the repo to view the live application.)*

---

## 💻 Installation Guide

Follow these steps to set up the project locally:

1.  **Clone the Repository**
    ```bash
    git clone [https://github.com/PriteshBD/Event-Booking.git](https://github.com/PriteshBD/Event-Booking.git)
    ```

2.  **Database Setup**
    * Open **phpMyAdmin** (`http://localhost/phpmyadmin`).
    * Create a database named `event_booking_db`.
    * Import the `database.sql` file located in the root directory.

3.  **Configure Connection**
    * Edit the `db_connection.php` file (or equivalent config file):
        ```php
        $conn = mysqli_connect("localhost", "root", "", "event_booking_db");
        ```

4.  **Run the Project**
    * Move the folder to your `htdocs` directory.
    * Visit: `http://localhost/Event-Booking/`

---

## 🧠 System Architecture (MVC Approach)

This project follows a structured architecture to ensure scalability:
* **Database Layer:** Normalized SQL tables for `users`, `events`, and `bookings` to reduce redundancy.
* **Logic Layer:** PHP scripts handle form validation, session security (preventing unauthorized URL access), and SQL injection protection.
* **Presentation Layer:** Responsive frontend that adapts to Mobile, Tablet, and Desktop screens.

---

## 🔮 Roadmap & Future Enhancements

* [ ] **QR Code Integration:** Generate unique QR codes for tickets to be scanned at the venue.
* [ ] **Payment Gateway:** Integrate **Razorpay** or **Stripe** for paid events.
* [ ] **Email Notifications:** Auto-send booking confirmation emails using SMTP.

---

## 👨‍💻 Author

## 💻 Developed By

* **Pritesh Diwale** - *Project Lead & Frontend Development* - [GitHub](https://github.com/PriteshBD) , [LinkedIn](https://www.linkedin.com/in/pritesh-diwale/)
* **Harsh More** - *Backend Development & Database Management* - [GitHub](https://github.com/moreharsh244) , [LinkedIn](https://www.linkedin.com/in/moreharsh244/)

> This project was a collaborative effort to simulate a real-world SDLC (Software Development Life Cycle) environment.
---
