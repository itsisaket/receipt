# Deployment configuration

Database dumps and runtime logs are excluded from Git.
Set these variables in the PHP server environment before running:

- PAYMENT_DB_PASSWORD: payment database password.
- RECEIPT2027_DB_PASSWORD: receipt2027 database password.
- RECEIPT_PRINT_DB_PASSWORD: database password used by printH.php.
- PAYMENT_GII_PASSWORD and RECEIPT2027_GII_PASSWORD: Gii passwords, if enabled.

Original local files are unchanged. Import databases privately from local backups.
