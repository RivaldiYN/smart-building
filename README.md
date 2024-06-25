# Smart Building Website

Institut Teknologi Sumatera

## Start the Project

### 1️⃣ Clone Project Repository

Open Terminal and type

```bash
git clone [REPOSITORY_URL](https://github.com/RivaldiYN/smart-building.git)
```

### 2️⃣ Enter the Project Directory

In the terminal, type:

```bash
cd smart-building
code .
```

This will automatically open the project in Visual Studio Code/Code Editor.

### 3️⃣ Configure the Project

Add the JSON file from Firebase.
Copy the .env.example file.
Paste the copied file and rename it to .env.
Adjust the .env file:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smartbuilding
DB_USERNAME=root
DB_PASSWORD=
```

```bash
FIREBASE_DATABASE_URL='${URL_FIREBASE}'
FIREBASE_CREDENTIALS='${FIREBASE_CREDENTIAL}'
```

5. Install/Update Composer:
   "As a tip, make sure to read any errors that occur (usually some configuration is needed in php.ini, such as enabling extension=sodium by removing the ; (semicolon) before the text)."

```bash
composer install
```

6. Generate a Key

```bash
php artisan key:generate
```

7. Install Node Package Manager

```bash
npm install
```

### 4️⃣ Run the Project

Open two terminals:

In the first terminal, run:

```bash
php artisan serve
```

2. In the second terminal, run:

```bash
npm run dev
```

Open the website at http://127.0.0.1:8000/

## Our Team:

-   [ ] Rivaldi Yonathan Nainggolan
-   [ ] Yondika Vio Landa
