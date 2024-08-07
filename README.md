# Website Link : https://authgate.selfmade.social

# Security Measures

## 1. Sanitization:

- Username: FILTER_SANITIZE_STRING

- Email: FILTER_SANITIZE_EMAIL

- Phone Number: preg_replace

## 2. Validation:

- Username: Regex pattern matching.

- Password: Length and character type checks.

- Email: FILTER_VALIDATE_EMAIL

- Phone Number: Regex pattern matching.

## 3. Password Security:

Hashing: Using password_hash to securely store passwords.

## 4. SQL Injection Prevention:

The user data is inserted into the database using a prepared statement to prevent SQL injection.

## 5. XSS Prevention:

Sanitized inputs to remove potentially malicious code.

Errors and database messages are encoded using htmlspecialchars to prevent XSS when outputting user data or error messages.

Encode outputs to safely display user-generated content.

## 6.Additional Security measures

Authorized the webpage everytime it reloads by checking parameters like user's ip and user's agent are not changed

It is done to prevent the attacker from using the session by cookie hijacking

## 7. Database Connection Handling:

The database connection is opened using a getDatabaseConnection function and closed properly after use.

