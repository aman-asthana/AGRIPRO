# AgriPro - Agricultural Information System

A comprehensive web application for managing agricultural information including crop prices, products, news, and user management.

## Features

- User and Admin authentication
- Product management system
- News management system
- Price updates for agricultural products
- Contact system
- Secure environment variable configuration

## Security Features

- Environment variables for sensitive data
- Database credentials protection
- Email configuration through environment variables
- Secure configuration management

## Directory Structure

```
agripro/
├── public/              # Public accessible files
│   ├── assets/         # Images, fonts, etc.
│   ├── js/            # JavaScript files
│   └── index.php      # Entry point
├── src/                # Source files
│   ├── admin/         # Admin related files
│   ├── auth/          # Authentication related files
│   ├── config/        # Configuration files
│   ├── includes/      # Common includes
│   └── views/         # View files
├── .env               # Environment variables (not tracked by git)
├── .env.example       # Example environment file
└── .gitignore         # Git ignore rules
```

## Installation

1. Clone this repository
   ```bash
   git clone <your-repository-url>
   cd agripro
   ```

2. Copy the example environment file and configure it
   ```bash
   copy .env.example .env
   ```

3. Edit the `.env` file with your actual configuration:
   ```env
   # Database Configuration
   DB_HOST=localhost
   DB_USER=your_db_user
   DB_PASSWORD=your_db_password
   DB_NAME=agriinfo

   # Contact Information
   CONTACT_EMAIL=your_email@example.com
   CONTACT_PHONE="your_phone_number"

   # Security
   APP_SECRET_KEY=your_unique_secret_key_here
   ```

4. Configure your web server to point to the `public` directory

5. Import the database schema (create the `agriinfo` database and required tables)

6. Access the application through your web browser

## Database Setup

Create the following tables in your `agriinfo` database:

- `price` - For storing crop prices
- `products` - For product information
- `news` - For news articles
- `userregistration` - For user accounts
- `adminreg` - For admin accounts

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- XAMPP/WAMP (for local development)

## Security Best Practices

1. **Never commit the `.env` file** - It contains sensitive information
2. **Change default secret keys** - Generate unique secret keys for production
3. **Use strong database passwords** - Especially in production environments
4. **Regular updates** - Keep PHP and database software updated
5. **Input validation** - The application includes SQL injection protection

## Environment Variables

| Variable | Description | Default |
|----------|-------------|---------|
| `DB_HOST` | Database host | localhost |
| `DB_USER` | Database username | root |
| `DB_PASSWORD` | Database password | (empty) |
| `DB_NAME` | Database name | agriinfo |
| `CONTACT_EMAIL` | Contact email address | Required |
| `CONTACT_PHONE` | Contact phone number | Required |
| `APP_SECRET_KEY` | Application secret key | Required |
| `APP_ENV` | Environment (development/production) | development |

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Create a new Pull Request

## Deployment

For production deployment:

1. Set `APP_ENV=production` in your `.env` file
2. Use strong passwords and secret keys
3. Configure proper file permissions
4. Enable HTTPS
5. Set up regular database backups

## License

This project is licensed under the MIT License.