# Internship Management Web Application

## Overview

This Internship Management Web Application is designed to streamline the process of managing and tracking internship requests. Developed during my internship at the General Directorate of Algérie Poste. The application features a user-friendly interface and robust backend functionalities that cater to the needs of both interns and administrators.

## Project Description

This project is a web application designed for managing and tracking internship requests. It includes several features aimed at improving the efficiency and effectiveness of the internship process:

- **User Privileges**: Assigning specific privileges to each user based on their tasks.
- **Automatic Attendance Recording**: Recording user attendance automatically upon login.
- **Task Tracking**: Ability to assign missions and display the progress level of projects.
- **Secure Database Integration**: Archiving all internship-related information in a secure database.
- **Detailed Statistics**: Providing effective monitoring and evaluation through detailed statistics.
- **Management Interfaces**: Interfaces for managing internships, users, and archiving source code projects with their associated reports.

## Technologies Used

This project utilizes a variety of technologies and tools, including:

- **Backend**:
  - [Laravel](https://laravel.com) for the application framework.
  - [Spatie](https://spatie.be/docs/laravel-permission/v5/introduction) for managing user roles and permissions.
  - Activity Logs for automatically tracking user attendance and activities.
  - SQL Server for the database.
  - Encryption methods to secure user passwords.

- **Frontend**:
  - HTML, CSS, and JavaScript for building the user interface.
  - [Bootstrap](https://getbootstrap.com) for responsive design.

## Getting Started

To get a local copy of this project up and running, follow these steps:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/MahdiDbh/Internship-and-Intern-Management.git

2. **Navigate into the project directory**:
cd Internship-and-Intern-management 

3. **nstall the dependencies:**:
composer install

4. **Set up your .env file**: 
cp .env.example .env

5. **Generate the application key**:
php artisan key:generate

6. **Run the database migrations**:
php artisan migrate

7. **Start the application:**: 
php artisan serve


