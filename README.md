
---

# Learning Management System - Cihuy University

Welcome to the Learning Management System (LMS) for Cihuy University. This project aims to provide a comprehensive platform for online education, enabling students and educators to interact seamlessly.

## Features

- **User Authentication**: Secure login and registration for students and educators.
- **Course Management**: Create, update, and manage courses with ease.
- **Learning Materials**: Upload and access various learning resources like videos, modules, and documents.
- **Interactive Quizzes**: Engage students with quizzes and assessments.
- **Student Dashboard**: Personalized dashboard for students to track their learning progress.
- **Responsive Design**: Accessible on all devices, including desktop, tablet, and mobile.

## Tech Stack

- **Laravel**
- **Bootstrap**

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/Mifta24/Learning-Management-System-Cihuy-University.git
   ```
2. Navigate to the project directory:
   ```bash
   cd Learning-Management-System-Cihuy-University
   ```
3. Install dependencies:
   ```bash
   composer install
   npm install
   ```
4. Set up the environment variables:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
5. Run database migrations:
   ```bash
   php artisan migrate
   ```
6. Start the development server:
   ```bash
   php artisan serve
   ```

## Usage

- **Students**: Log in to access courses, view learning materials, and take quizzes.
- **Educators**: Create and manage courses, upload learning materials, and monitor student progress.

## Contributing

We welcome contributions! Please read our [Contributing Guide](CONTRIBUTING.md) for details on how to get started.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

Feel free to customize it further according to your project's specific needs.
