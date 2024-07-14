### Setup Instructions

To set up the application on your local machine, please follow these steps:

1. **Clone the Repository**
   ```bash
   git clone https://github.com/wasimlohar/holiday-calendar.git
   cd holiday-calendar
   ```

2. **Install Dependencies**
   Make sure you have Composer and Node.js installed on your machine.
   ```bash
   composer install
   npm install
   npm run dev
   ```

3. **Environment Configuration**
   Copy the `.env.example` file to `.env` and update the necessary configuration, including your database settings and the Calendarific API key.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   Update the following lines in your `.env` file:
   ```env
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password

   CALENDARIFIC_API_KEY=your_calendarific_api_key
   ```

4. **Run Migrations**
   ```bash
   php artisan migrate
   ```

5. **Fetch Holidays Data**
   Run the command to fetch holidays from the Calendarific API and store them in the database.
   ```bash
   php artisan fetch:holidays
   ```

6. **Serve the Application**
   ```bash
   php artisan serve
   ```

   Open your browser and navigate to `http://localhost:8000/holidays` to view the holiday calendar.

### Database Schema

The `holidays` table schema is as follows:
   ```php
   Schema::create('holidays', function (Blueprint $table) {
       $table->id();
       $table->string('name');
       $table->date('date');
       $table->string('type');
       $table->timestamps();
   });
   ```

---