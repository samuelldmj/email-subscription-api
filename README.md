Email Subscription API
A simple Laravel API for subscribing users to an email list, with validation and confirmation emails.
Requirements

PHP 8.3+
Laravel 11+
MySQL or any supported database
Mailtrap (or similar) for email testing

Setup Instructions

Clone the repository:git clone <your-repo-url>
cd email-subscription-api

Install dependencies:composer install

Copy .env.example to .env and configure:
Database credentials (DB*\* variables).
Mailtrap credentials (MAIL*\* variables).

Generate application key:php artisan key:generate

Run migrations:php artisan migrate

Start the server:php artisan serve

API Usage

Endpoint: POST /api/subscribe
Body:{
"email": "user@example.com"
}

Success Response:{
"status": true,
"message": "Subscription successful. Please check your email."
}

Error Response (e.g., validation failure):{
"status": false,
"errors": {
"email": ["This email is already subscribed."]
}
}

Testing

Use Postman to test the /api/subscribe endpoint.
Verify emails in Mailtrap.
Check the subscribers table in your database.

Notes

Validation is handled in the SubscriberController using Laravel’s Validator facade.
