# REST API Testing Guide for GST Billing Application

This guide explains how to test the REST API endpoints for the GST Billing application, including user registration, login, and user management (CRUD) using Postman.

---

## 1. Start the Laravel Development Server

Open your terminal and navigate to the project directory:

```bash
cd /Applications/XAMPP/xamppfiles/htdocs/gst_billing\ 2
```

Start the Laravel development server:

```bash
php artisan serve
```

By default, the server will run at `http://127.0.0.1:8000`.

---

## 2. Testing API Endpoints with Postman

Download and install [Postman](https://www.postman.com/downloads/) if you haven't already.

### 2.1 Register a New User (POST)

- URL: `http://127.0.0.1:8000/api/register`
- Method: POST
- Body: Select `raw` and `JSON` format
- JSON Payload example:
```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123",
  "password_confirmation": "password123"
}
```
- Click **Send**.
- Expected: JSON response with status true and auth token.

---

### 2.2 Login (POST)

- URL: `http://127.0.0.1:8000/api/login`
- Method: POST
- Body: Select `raw` and `JSON` format
- JSON Payload example:
```json
x{
  "email": "john@example.com",
  "password": "password123"
}
```
- Click **Send**.
- Expected: JSON response with status true and auth token.

---

### 2.3 Use Auth Token for Protected Routes

- Copy the `token` from login or register response.
- In Postman, go to the **Headers** tab.
- Add a new header:
  - Key: `Authorization`
  - Value: `Bearer YOUR_TOKEN_HERE`

---

### 2.4 Get All Users (GET)

- URL: `http://127.0.0.1:8000/api/users`
- Method: GET
- Headers: Include Authorization header with Bearer token.
- Click **Send**.
- Expected: List of users.

---

### 2.5 Create a New User (POST)

- URL: `http://127.0.0.1:8000/api/users`
- Method: POST
- Headers: Include Authorization header.
- Body: raw JSON
```json
{
  "name": "Jane Smith",
  "email": "jane@example.com",
  "password": "password123",
  "is_role": "user"
}
```
- Click **Send**.
- Expected: User created response.

---

### 2.6 Update a User (PUT)

- URL: `http://127.0.0.1:8000/api/users/{id}`
- Method: PUT
- Headers: Include Authorization header.
- Body: raw JSON (only fields to update)
```json
{
  "name": "Jane Doe",
  "email": "janedoe@example.com"
}
```
- Click **Send**.
- Expected: User updated response.

---

### 2.7 Delete a User (DELETE)

- URL: `http://127.0.0.1:8000/api/users/{id}`
- Method: DELETE
- Headers: Include Authorization header.
- Click **Send**.
- Expected: User deleted response.

---

## 3. Additional Tips

- Always include the Authorization header with Bearer token for protected routes.
- Use the Laravel server terminal to monitor logs and errors.
- For testing logout, send a POST request to `/api/logout` with Authorization header.

---

## 4. Screenshots Guide

To capture screenshots in Postman:

- After setting up the request and before clicking Send, press `Cmd+Shift+4` (Mac) or `Win+Shift+S` (Windows) to capture the request setup.
- After receiving the response, capture the response pane similarly.
- Save screenshots with descriptive names like `post_register_request.png`, `post_register_response.png`, etc.

---

This guide should help you test the REST API endpoints successfully and ensure the application is running correctly.
