# Skill Management System

A comprehensive web-based platform designed to help users assess, track, and improve their technical skills across various job roles in the technology industry.

## 🚀 Features

### User Management
- **User Registration & Authentication**: Secure user registration and login system with session management
- **Profile Management**: Users can view and update their personal profiles
- **Session Security**: Protected routes with proper session handling

### Skill Assessment
- **Interactive Quizzes**: Role-based skill assessments for various technology positions
- **Multiple Job Roles**: Support for Backend, Frontend, Full Stack, Data Science, and DevOps roles
- **Technology-Specific Tests**: Specialized quizzes for different programming languages and frameworks
- **Real-time Scoring**: Immediate feedback on quiz performance

### Progress Tracking
- **Progress Monitoring**: Track learning progress across different skills
- **Performance Analytics**: Visual representation of skill development over time
- **Achievement Tracking**: Monitor completed assessments and improvements

### Learning Resources
- **Curated Content**: Access to learning materials and resources
- **Skill-based Recommendations**: Targeted resources based on assessment results
- **Continuous Learning**: Support for ongoing skill development

### Additional Features
- **Feedback System**: Collect and manage user feedback
- **Notifications**: User notification system for updates and reminders
- **Lessons Learned**: Documentation and sharing of learning experiences
- **Responsive Design**: Mobile-friendly interface

## 🛠️ Technology Stack

- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Server**: Apache (XAMPP/WAMP)
- **Styling**: Custom CSS with Google Fonts (Roboto)

## 📋 Prerequisites

Before running this project, make sure you have the following installed:

- **XAMPP** or **WAMP** server
- **PHP** 7.4 or higher
- **MySQL** 5.7 or higher
- **Web Browser** (Chrome, Firefox, Safari, etc.)

## ⚙️ Installation & Setup

### 1. Clone the Repository
```bash
git clone https://github.com/edwardtintu/Skill-Management-System.git
cd Skill-Management-System
```

### 2. Database Setup
1. Start your XAMPP/WAMP server
2. Open phpMyAdmin (usually at `http://localhost/phpmyadmin`)
3. Create a new database named `skill_management_system`
4. Import the database schema (you may need to create tables based on the application structure)

### 3. Database Configuration
1. Open `db_connection.php`
2. Update the database credentials if necessary:
```php
$host = "localhost:3307";       // Your server host
$username = "root";             // Your MySQL username
$password = "";                 // Your MySQL password
$database = "skill_management_system"; // Database name
```

### 4. Run the Application
1. Place the project folder in your web server directory (htdocs for XAMPP)
2. Start Apache and MySQL services
3. Open your browser and navigate to `http://localhost/skill-management-system`

## 🗃️ Database Schema

The application requires the following main tables:

- **users1**: User account information
- **quiz_results**: Store quiz scores and results
- **user_progress**: Track user learning progress
- **feedback**: User feedback and suggestions
- **notifications**: System notifications

## 🎯 Supported Job Roles & Skills

### Backend Developer
- PHP
- Node.js

### Frontend Developer
- HTML
- CSS
- JavaScript

### Full Stack Developer
- React
- Angular

### Data Scientist
- Python
- R

### DevOps Engineer
- Docker
- Kubernetes

## 📱 Usage

### For Users
1. **Register**: Create a new account or login with existing credentials
2. **Dashboard**: Access the main dashboard to navigate through features
3. **Take Assessments**: Choose a job role and take skill-specific quizzes
4. **Track Progress**: Monitor your learning journey and improvements
5. **Access Resources**: Explore learning materials and resources
6. **Provide Feedback**: Share your experience and suggestions

### For Administrators
- Monitor user progress and engagement
- Manage quiz content and questions
- Review user feedback
- Send notifications to users

## 🏗️ Project Structure

```
skill-management-system/
├── backend.html              # Backend development resources
├── cyber.html               # Cybersecurity content
├── dashboard.php            # Main user dashboard
├── data_analyst.html        # Data analyst resources
├── db_connection.php        # Database connection configuration
├── feed_back.html          # Feedback form
├── fetch_quiz.php          # Quiz data retrieval
├── full_stack.html         # Full stack development resources
├── learning_resources.html # Learning materials
├── lessons_learned.html    # Lessons learned documentation
├── login.php               # User authentication
├── ml.html                 # Machine learning content
├── mobile.html             # Mobile development resources
├── notification.html       # Notification interface
├── notification.php        # Notification backend
├── process_feedback.php    # Feedback processing
├── profile.php             # User profile management
├── progress_tracker.html   # Progress tracking interface
├── progress_tracker.php    # Progress tracking backend
├── quiz_page.php           # Quiz interface
├── quiz.html               # Quiz templates
├── quiz1.html              # Additional quiz templates
├── register.html           # User registration form
├── register.php            # Registration backend
├── register1.php           # Alternative registration
├── save_progress.php       # Progress saving functionality
├── skill_dashboard.html    # Skill assessment dashboard
├── skill_dashboard.php     # Skill dashboard backend
├── skill_dashboard1.html   # Alternative skill dashboard
├── skill_requirement.html  # Skill requirements
├── submit_feedback.php     # Feedback submission
├── submit_profile.php      # Profile update submission
├── submit_quiz.php         # Quiz submission handling
├── web.html                # Web development resources
└── README.md               # Project documentation
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👨‍💻 Author

**Edward Tintu**
- GitHub: [@edwardtintu](https://github.com/edwardtintu)

## 🙏 Acknowledgments

- Thanks to all contributors who have helped improve this project
- Special thanks to the open-source community for inspiration and resources
- Google Fonts for the Roboto font family

## 📞 Support

If you encounter any issues or have questions, please:
1. Check the existing issues on GitHub
2. Create a new issue with detailed information
3. Contact the maintainer through GitHub

---

**Happy Learning! 🚀**
