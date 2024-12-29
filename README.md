
# CFL Project

A Laravel-based project to manage cricket fantasy league teams. This project includes features like player management, categories, and API endpoints for seamless interaction.

## Table of Contents
- [Project Overview](#project-overview)
- [Features](#features)
- [Setup Instructions](#setup-instructions)
- [Usage Guide](#usage-guide)
- [API Documentation](#api-documentation)
- [Contributing](#contributing)
- [License](#license)

---

## Project Overview
The CFL (Cricket Fantasy League) project is a Laravel application designed to manage players, categories, and team selection processes for a cricket fantasy league. It features both an admin dashboard and a user-facing interface.

The application also provides RESTful API endpoints to allow interaction with external systems and clients.

---

## Features
- **Admin Dashboard**: Manage players, categories, and team data.
- **User Interface**: Interactive team selection and display of cricket players.
- **RESTful APIs**: Seamless integration with other platforms.
- **Search Functionality**: AJAX-powered search for players.
- **Authentication**: Secure login and user management.
- **Responsive Design**: Works across different devices.

---

## Setup Instructions
Follow these steps to set up the project on your local machine:

### Prerequisites
- PHP >= 8.0
- Composer
- Node.js & npm
- A web server (Apache or Nginx)
- MySQL or any other supported database

### Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/CFL-Project.git
   cd CFL-Project
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   ```

3. Configure the `.env` file:
   - Copy the example file:
     ```bash
     cp .env.example .env
     ```
   - Update the database configuration and other environment variables.

4. Generate an application key:
   ```bash
   php artisan key:generate
   ```

5. Run migrations and seed the database:
   ```bash
   php artisan migrate --seed
   ```

6. Build assets:
   ```bash
   npm run dev
   ```

7. Start the server:
   ```bash
   php artisan serve
   ```

   The application will be accessible at `http://127.0.0.1:8000`.

---

## Usage Guide

### Admin Dashboard
1. Log in to the admin panel.
2. Use the **Players** and **Categories** sections to manage data.
3. Navigate to **Team Selection** to view players.

### API Endpoints
- **Get All Players**: `GET /api/players`
- **Get Player by Category**: `GET /api/players/category/{id}`
- **Search Players**: `GET /api/search-players?query={name}`

For detailed API usage, refer to the [API Documentation](#api-documentation).

### Search Functionality
- Use the search bar in the sidebar to search for players by name or category. Results are updated dynamically using AJAX.

---

## API Documentation

### Authentication
- **Register**: `POST /api/register`
- **Login**: `POST /api/login`
- **Logout**: `POST /api/logout`
- **User Profile**: `GET /api/user`

### Player Management
- **Get All Players**: `GET /api/players`
- **Get Players by Category**: `GET /api/players/category/{id}`
- **Search Players**: `GET /api/search-players?query={name}`

For secured routes, ensure to include the `Authorization: Bearer {token}` header.

---

## Contributing
Contributions are welcome! Please follow these steps:
1. Fork the repository.
2. Create a new branch:
   ```bash
   git checkout -b feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m "Add feature"
   ```
4. Push the branch:
   ```bash
   git push origin feature-name
   ```
5. Submit a Pull Request.

---

## License
This project is open-source and available under the [MIT License](LICENSE).
```

Replace placeholders such as `your-username` with your actual GitHub username or relevant information. Let me know if you'd like further customization!