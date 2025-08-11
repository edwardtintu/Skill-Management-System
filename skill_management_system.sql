-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307:3307
-- Generation Time: Nov 20, 2024 at 03:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skill_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback1`
--

CREATE TABLE `feedback1` (
  `id` int(11) NOT NULL,
  `course_rating` int(11) NOT NULL,
  `content_rating` int(11) NOT NULL,
  `overall_rating` int(11) NOT NULL,
  `feedback_comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback1`
--

INSERT INTO `feedback1` (`id`, `course_rating`, `content_rating`, `overall_rating`, `feedback_comments`, `created_at`) VALUES
(1, 3, 4, 4, 'hello', '2024-11-16 17:18:52'),
(2, 5, 5, 5, 'NICE WEBSITE', '2024-11-18 10:09:48'),
(3, 4, 4, 4, 'GOOD', '2024-11-18 10:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `type` enum('quiz','resource') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `message`, `type`, `created_at`) VALUES
(8, 'New Quiz Available', 'There is a new quiz on PHP basics. Start learning now!', 'quiz', '2024-11-17 18:54:20'),
(9, 'New Quiz Available', 'There is a new quiz on PHP basics. Start learning now!', 'quiz', '2024-11-17 18:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `job_role` varchar(255) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `correct_option` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `job_role`, `skill`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES
(1, 'Backend Developer', 'PHP', 'What does PHP stand for?', 'Personal Hypertext Processor', 'PHP: Hypertext Preprocessor', 'Private Hypertext Processor', 'Preprocessor Hypertext PHP', 'B'),
(2, 'Backend Developer', 'PHP', 'Which of the following is used to connect to a MySQL database in PHP?', 'mysqli_connect()', 'mysql_connect()', 'pdo_connect()', 'connect_mysql()', 'A'),
(3, 'Backend Developer', 'PHP', 'Which of the following is the correct syntax for including a file in PHP?', 'include(\"file.php\");', 'import(\"file.php\");', 'require(\"file.php\");', 'load(\"file.php\");', 'A'),
(4, 'Backend Developer', 'PHP', 'What is the correct way to declare an array in PHP?', '$arr = array(1, 2, 3);', '$arr = [1, 2, 3];', '$arr = (1, 2, 3);', '$arr = new array(1, 2, 3);', 'A'),
(5, 'Backend Developer', 'PHP', 'Which PHP function is used to send a header?', 'header()', 'send_header()', 'set_header()', 'response_header()', 'A'),
(6, 'Backend Developer', 'PHP', 'Which of the following is a correct way to open a file for reading in PHP?', 'fopen(\"file.txt\", \"r\");', 'open_file(\"file.txt\", \"r\");', 'file_open(\"file.txt\", \"r\");', 'fopen_file(\"file.txt\", \"r\");', 'A'),
(7, 'Backend Developer', 'PHP', 'Which PHP function can be used to retrieve the length of a string?', 'strlen()', 'length()', 'str_len()', 'str_length()', 'A'),
(8, 'Backend Developer', 'PHP', 'How do you comment a single line in PHP?', '// This is a comment', '/* This is a comment */', '# This is a comment', '## This is a comment', 'A'),
(9, 'Backend Developer', 'PHP', 'Which of the following is used to start a session in PHP?', 'session_start()', 'start_session()', 'initialize_session()', 'begin_session()', 'A'),
(10, 'Backend Developer', 'PHP', 'Which of the following loops is not available in PHP?', 'foreach', 'for', 'while', 'repeat', 'D'),
(11, 'Frontend Developer', 'HTML', 'What does HTML stand for?', 'Hyper Text Markup Language', 'Home Tool Markup Language', 'Hyperlinks and Text Markup Language', 'Hyper Text Marketing Language', 'A'),
(12, 'Frontend Developer', 'HTML', 'Which of the following is the correct HTML element for inserting a line break?', '<br>', '<break>', '<lb>', '<b>', 'A'),
(13, 'Frontend Developer', 'HTML', 'Which tag is used to define an unordered list?', '<ul>', '<ol>', '<li>', '<list>', 'A'),
(14, 'Frontend Developer', 'HTML', 'Which HTML element is used to display a picture?', '<img>', '<image>', '<picture>', '<src>', 'A'),
(15, 'Frontend Developer', 'HTML', 'What is the correct HTML element to define important text?', '<strong>', '<b>', '<i>', '<em>', 'A'),
(16, 'Frontend Developer', 'HTML', 'What is the correct HTML element to define a table row?', '<tr>', '<td>', '<th>', '<table>', 'A'),
(17, 'Frontend Developer', 'HTML', 'Which attribute is used to define the background color in HTML?', 'bgcolor', 'background-color', 'color', 'background', 'A'),
(18, 'Frontend Developer', 'HTML', 'Which tag is used to define a hyperlink?', '<a>', '<link>', '<href>', '<url>', 'A'),
(19, 'Frontend Developer', 'HTML', 'What does the <head> tag define in an HTML document?', 'Metadata about the document', 'Body content of the document', 'Text displayed to the user', 'None of the above', 'A'),
(20, 'Frontend Developer', 'HTML', 'Which of the following is the correct HTML element to define a form?', '<form>', '<input>', '<submit>', '<textarea>', 'A'),
(21, 'Frontend Developer', 'CSS', 'What does CSS stand for?', 'Cascading Style Sheets', 'Creative Style Sheets', 'Colorful Style Sheets', 'Computer Style Sheets', 'A'),
(22, 'Frontend Developer', 'CSS', 'Which property is used to change the background color in CSS?', 'background-color', 'color', 'bg-color', 'background', 'A'),
(23, 'Frontend Developer', 'CSS', 'Which of the following is the correct syntax for linking an external CSS file?', '<link rel=\"stylesheet\" href=\"styles.css\">', '<stylesheet src=\"styles.css\">', '<link href=\"styles.css\">', '<css link=\"styles.css\">', 'A'),
(24, 'Frontend Developer', 'CSS', 'What does the CSS property \"float\" do?', 'It allows an element to float to the left or right of its container.', 'It changes the text alignment', 'It creates a hover effect', 'It floats elements above others', 'A'),
(25, 'Frontend Developer', 'CSS', 'Which property is used to change the font size in CSS?', 'font-size', 'font-style', 'text-size', 'text-style', 'A'),
(26, 'Frontend Developer', 'CSS', 'What does the \"display: none;\" CSS property do?', 'It hides the element', 'It removes the element from the page', 'It makes the element transparent', 'It removes the element from the DOM', 'A'),
(27, 'Frontend Developer', 'CSS', 'Which CSS property is used to change the text color?', 'color', 'text-color', 'font-color', 'background-color', 'A'),
(28, 'Frontend Developer', 'CSS', 'Which CSS property controls the space between the elements?', 'margin', 'padding', 'border', 'spacing', 'A'),
(29, 'Frontend Developer', 'CSS', 'What is the default value of the \"position\" property in CSS?', 'static', 'relative', 'absolute', 'fixed', 'A'),
(30, 'Frontend Developer', 'CSS', 'Which property is used to control the space between lines of text in CSS?', 'line-height', 'spacing', 'text-spacing', 'font-size', 'A'),
(31, 'Backend Developer', 'NodeJS', 'What is Node.js?', 'A JavaScript runtime environment', 'A programming language', 'A web framework', 'A database engine', 'A'),
(32, 'Backend Developer', 'NodeJS', 'Which of the following is used to manage packages in Node.js?', 'npm', 'node', 'express', 'git', 'A'),
(33, 'Backend Developer', 'NodeJS', 'Which built-in module in Node.js allows you to work with file system operations?', 'fs', 'http', 'url', 'events', 'A'),
(34, 'Backend Developer', 'NodeJS', 'What is the default HTTP port in Node.js?', '80', '443', '3000', '8080', 'C'),
(35, 'Backend Developer', 'NodeJS', 'Which of the following commands is used to install a package in Node.js?', 'npm install <package-name>', 'node install <package-name>', 'install <package-name>', 'npm get <package-name>', 'A'),
(36, 'Backend Developer', 'NodeJS', 'Which method is used to create a new HTTP server in Node.js?', 'http.createServer()', 'server.create()', 'http.newServer()', 'server.new()', 'A'),
(37, 'Backend Developer', 'NodeJS', 'What is a callback function in Node.js?', 'A function passed into another function as an argument', 'A function that calls itself', 'A function that is executed at the end of the program', 'A function that runs in parallel', 'A'),
(38, 'Backend Developer', 'NodeJS', 'Which of the following is a popular framework for building web applications in Node.js?', 'Express.js', 'React.js', 'Vue.js', 'Angular', 'A'),
(39, 'Backend Developer', 'NodeJS', 'Which method in Node.js allows you to read data from a file?', 'fs.readFile()', 'fs.read()', 'http.read()', 'file.read()', 'A'),
(40, 'Backend Developer', 'NodeJS', 'What does \"npm run\" do in Node.js?', 'Runs a script defined in the package.json', 'Installs a package', 'Starts the Node.js server', 'Deploys the application', 'A'),
(41, 'Frontend Developer', 'JavaScript', 'What is the correct syntax for referring to an external script called \"script.js\"?', '<script src=\"script.js\">', '<script href=\"script.js\">', '<script ref=\"script.js\">', '<script name=\"script.js\">', 'A'),
(42, 'Frontend Developer', 'JavaScript', 'Which company developed JavaScript?', 'Netscape', 'Microsoft', 'Google', 'Mozilla', 'A'),
(43, 'Frontend Developer', 'JavaScript', 'What does the \"this\" keyword refer to in JavaScript?', 'The current object', 'The previous object', 'A global variable', 'A function', 'A'),
(44, 'Frontend Developer', 'JavaScript', 'Which of the following is the correct way to create an array in JavaScript?', 'var arr = []', 'var arr = {}', 'var arr = ()', 'var arr = \"\"', 'A'),
(45, 'Frontend Developer', 'JavaScript', 'Which JavaScript method is used to write text into an HTML element?', 'document.write()', 'document.innerHTML()', 'document.addText()', 'document.setText()', 'A'),
(46, 'Frontend Developer', 'JavaScript', 'How can you add a comment in a JavaScript code?', '// This is a comment', '/* This is a comment */', '## This is a comment', 'Both A and B', 'D'),
(47, 'Frontend Developer', 'JavaScript', 'What is the output of \"console.log(typeof 42)\" in JavaScript?', 'number', 'string', 'boolean', 'object', 'A'),
(48, 'Frontend Developer', 'JavaScript', 'What is the purpose of the \"setTimeout()\" method in JavaScript?', 'To delay the execution of a function', 'To execute a function at regular intervals', 'To clear an interval', 'To store values for later use', 'A'),
(49, 'Frontend Developer', 'JavaScript', 'Which operator is used to compare both value and type in JavaScript?', '===', '==', '!=', '!==', 'A'),
(50, 'Frontend Developer', 'JavaScript', 'What does JSON stand for?', 'JavaScript Object Notation', 'JavaScript Online Notation', 'Java Syntax Oriented Notation', 'None of the above', 'A'),
(51, 'Full Stack Developer', 'Angular', 'Which of the following is the correct way to bind a property in Angular?', '[property]=\"value\"', 'property=\"value\"', '{{property}}', 'property: value', 'A'),
(52, 'Full Stack Developer', 'Angular', 'Which Angular module is required to use forms?', 'FormsModule', 'ReactiveFormsModule', 'FormControl', 'HttpClientModule', 'A'),
(53, 'Full Stack Developer', 'Angular', 'What is the purpose of the ngOnInit lifecycle hook in Angular?', 'To initialize the component', 'To create a component', 'To update the DOM', 'To destroy the component', 'A'),
(54, 'Full Stack Developer', 'Angular', 'Which command is used to create a new Angular application?', 'ng new', 'ng init', 'ng create', 'ng start', 'A'),
(55, 'Full Stack Developer', 'Angular', 'What is a directive in Angular?', 'A function that executes during component lifecycle', 'A class that manipulates the DOM', 'A type of module', 'A service for HTTP requests', 'B'),
(56, 'Full Stack Developer', 'Angular', 'Which decorator is used to define an Angular component?', '@Component', '@Injectable', '@NgModule', '@Directive', 'A'),
(57, 'Full Stack Developer', 'Angular', 'What is the purpose of the \"ngFor\" directive in Angular?', 'To loop through an array or list', 'To make HTTP requests', 'To format dates', 'To handle user input', 'A'),
(58, 'Full Stack Developer', 'Angular', 'Which of the following is used to inject services into Angular components?', 'Dependency Injection', 'Observable', 'Services', 'ngOnInit', 'A'),
(59, 'Full Stack Developer', 'Angular', 'Which of the following is the correct way to define an Angular service?', '@Injectable()', '@Service()', '@Component()', '@Directive()', 'A'),
(60, 'Full Stack Developer', 'Angular', 'Which module do you need to import to make HTTP requests in Angular?', 'HttpClientModule', 'HttpModule', 'FormsModule', 'BrowserModule', 'A'),
(61, 'Full Stack Developer', 'React', 'What is the purpose of React?', 'To build UI components', 'To manage databases', 'To style webpages', 'To handle HTTP requests', 'A'),
(62, 'Full Stack Developer', 'React', 'Which method is used to update the state in React?', 'this.setState()', 'this.updateState()', 'this.refreshState()', 'this.changeState()', 'A'),
(63, 'Full Stack Developer', 'React', 'What does JSX stand for?', 'JavaScript XML', 'JavaScript X', 'JavaScript Extension', 'JavaScript XHTML', 'A'),
(64, 'Full Stack Developer', 'React', 'Which hook is used to run code when a component is mounted?', 'useEffect', 'useState', 'useContext', 'useReducer', 'A'),
(65, 'Full Stack Developer', 'React', 'What is the default value of the state in a React class component?', 'null', 'undefined', 'empty string', '0', 'B'),
(66, 'Full Stack Developer', 'React', 'What is the key purpose of the virtual DOM in React?', 'To improve performance by minimizing direct DOM manipulations', 'To store data', 'To style components', 'To manage API calls', 'A'),
(67, 'Full Stack Developer', 'React', 'Which of the following is the correct way to pass props to a React component?', '<Component name=\"John\" />', '<Component props=\"name=John\" />', '<Component name: \"John\" />', 'props(Component) = \"John\"', 'A'),
(68, 'Full Stack Developer', 'React', 'What does the React Hook useState() do?', 'Manages local state in functional components', 'Fetches data from the server', 'Updates the component’s props', 'Registers a component event', 'A'),
(69, 'Full Stack Developer', 'React', 'Which React component lifecycle method is used for component cleanup?', 'componentWillUnmount()', 'componentDidMount()', 'componentWillUpdate()', 'componentDidUpdate()', 'A'),
(70, 'Full Stack Developer', 'React', 'What is React Router used for?', 'Handling navigation between different pages in a React app', 'Fetching data from the backend', 'Managing the state of the app', 'Styling the components', 'A'),
(71, 'Data Scientist', 'R', 'Which of the following is used to create a vector in R?', 'c()', 'vector()', 'array()', 'list()', 'A'),
(72, 'Data Scientist', 'R', 'What does the function nrow() do in R?', 'Returns the number of rows in a data frame', 'Returns the number of columns in a data frame', 'Returns the data frame', 'Returns the size of the data frame', 'A'),
(73, 'Data Scientist', 'R', 'Which function in R is used to create a linear model?', 'lm()', 'glm()', 'data.frame()', 'plot()', 'A'),
(74, 'Data Scientist', 'R', 'Which of the following packages is used for data manipulation in R?', 'dplyr', 'ggplot2', 'tidyr', 'lubridate', 'A'),
(75, 'Data Scientist', 'R', 'Which of the following is used for visualizing data in R?', 'ggplot2', 'dplyr', 'tidyr', 'lubridate', 'A'),
(76, 'Data Scientist', 'R', 'How do you install a package in R?', 'install.packages(\"package_name\")', 'library(\"package_name\")', 'download.package(\"package_name\")', 'install.library(\"package_name\")', 'A'),
(77, 'Data Scientist', 'R', 'Which of the following function is used to summarize data in R?', 'summary()', 'summarize()', 'describe()', 'aggregate()', 'A'),
(78, 'Data Scientist', 'R', 'How can you generate random numbers in R?', 'runif()', 'rnorm()', 'sample()', 'random()', 'A'),
(79, 'Data Scientist', 'R', 'Which function is used to import CSV files in R?', 'read.csv()', 'load.csv()', 'import.csv()', 'csv.read()', 'A'),
(80, 'Data Scientist', 'R', 'What is the default method for missing data imputation in R?', 'NA', 'NaN', 'NULL', 'None of the above', 'A'),
(81, 'Data Scientist', 'Python', 'Which of the following is used to create a list in Python?', '[]', '{}', '()', '<>', 'A'),
(82, 'Data Scientist', 'Python', 'What is the output of 3 + 2 * 2 in Python?', '7', '10', '8', '6', 'A'),
(83, 'Data Scientist', 'Python', 'Which of the following is the correct way to define a function in Python?', 'def function_name():', 'function function_name():', 'def: function_name()', 'function def():', 'A'),
(84, 'Data Scientist', 'Python', 'Which Python library is commonly used for data manipulation?', 'pandas', 'numpy', 'matplotlib', 'scikit-learn', 'A'),
(85, 'Data Scientist', 'Python', 'Which of the following is the correct syntax for a while loop in Python?', 'while condition:', 'for condition:', 'loop condition:', 'repeat condition:', 'A'),
(86, 'Data Scientist', 'Python', 'How do you create a tuple in Python?', '()', '{}', '[]', '<>', 'A'),
(87, 'Data Scientist', 'Python', 'Which of the following is used to import a library in Python?', 'import', 'include', 'load', 'require', 'A'),
(88, 'Data Scientist', 'Python', 'Which function is used to read a CSV file in Python?', 'pd.read_csv()', 'open.read_csv()', 'read.csv()', 'csv.read()', 'A'),
(89, 'Data Scientist', 'Python', 'Which of the following methods is used to add an element to the end of a list in Python?', 'append()', 'insert()', 'extend()', 'push()', 'A'),
(90, 'Data Scientist', 'Python', 'Which of the following is the correct way to create a DataFrame in pandas?', 'pd.DataFrame()', 'pd.Data()', 'df.DataFrame()', 'df.create()', 'A'),
(91, 'DevOps Engineer', 'Docker', 'What does Docker use to containerize applications?', 'Images', 'Containers', 'Volumes', 'Networks', 'A'),
(92, 'DevOps Engineer', 'Docker', 'Which of the following commands is used to build a Docker image?', 'docker build', 'docker create', 'docker run', 'docker image', 'A'),
(93, 'DevOps Engineer', 'Docker', 'Which file is used to define the configuration of a Docker container?', 'Dockerfile', 'docker.yml', 'Dockerconfig', 'docker-compose.yml', 'A'),
(94, 'DevOps Engineer', 'Docker', 'Which command is used to view the logs of a running Docker container?', 'docker logs', 'docker ps', 'docker status', 'docker logs -f', 'A'),
(95, 'DevOps Engineer', 'Docker', 'What is the command to list all running Docker containers?', 'docker ps', 'docker ls', 'docker container', 'docker list', 'A'),
(96, 'DevOps Engineer', 'Docker', 'Which of the following is true about Docker images?', 'Docker images are read-only templates', 'Docker images are containers', 'Docker images are mutable', 'Docker images are created at runtime', 'A'),
(97, 'DevOps Engineer', 'Docker', 'Which Docker command is used to remove an image?', 'docker rmi', 'docker rm', 'docker kill', 'docker remove', 'A'),
(98, 'DevOps Engineer', 'Docker', 'What does a Docker container do?', 'Runs an application in isolation', 'Manages system resources', 'Builds Docker images', 'Deploys containers to clusters', 'A'),
(99, 'DevOps Engineer', 'Docker', 'Which of the following is a command to stop a running Docker container?', 'docker stop', 'docker pause', 'docker kill', 'docker shutdown', 'A'),
(100, 'DevOps Engineer', 'Docker', 'Which Docker command is used to run a container in detached mode?', 'docker run -d', 'docker start -d', 'docker container -d', 'docker exec -d', 'A'),
(101, 'DevOps Engineer', 'Kubernetes', 'What is Kubernetes primarily used for?', 'Orchestration of containers', 'Development of applications', 'Deployment of virtual machines', 'Database management', 'A'),
(102, 'DevOps Engineer', 'Kubernetes', 'Which of the following is the main unit of deployment in Kubernetes?', 'Pod', 'Container', 'Cluster', 'Service', 'A'),
(103, 'DevOps Engineer', 'Kubernetes', 'What does a Kubernetes Cluster consist of?', 'Master and Worker Nodes', 'Master and Pods', 'Nodes and Containers', 'Nodes and Clusters', 'A'),
(104, 'DevOps Engineer', 'Kubernetes', 'What is the purpose of the Kubernetes \"kubectl\" command?', 'To manage Kubernetes resources', 'To create Docker containers', 'To build Kubernetes nodes', 'To monitor services', 'A'),
(105, 'DevOps Engineer', 'Kubernetes', 'Which of the following is a key feature of Kubernetes?', 'Self-healing', 'Single-node deployment', 'Limited scalability', 'Built-in continuous integration', 'A'),
(106, 'DevOps Engineer', 'Kubernetes', 'Which object is responsible for ensuring that the specified number of replicas of a Pod are running?', 'ReplicaSet', 'Pod', 'Service', 'Deployment', 'A'),
(107, 'DevOps Engineer', 'Kubernetes', 'What is the purpose of a Kubernetes Service?', 'To expose an application to other services or users', 'To store data for the Pods', 'To maintain logs of Kubernetes Pods', 'To manage security policies', 'A'),
(108, 'DevOps Engineer', 'Kubernetes', 'What does a Kubernetes Ingress resource do?', 'Manage external access to the services', 'Monitor Pods', 'Store configuration files', 'Orchestrate container builds', 'A'),
(109, 'DevOps Engineer', 'Kubernetes', 'Which of the following is a container runtime supported by Kubernetes?', 'Docker', 'VirtualBox', 'Vagrant', 'VMware', 'A'),
(110, 'DevOps Engineer', 'Kubernetes', 'Which command is used to view the status of the Pods in Kubernetes?', 'kubectl get pods', 'kubectl pod status', 'kubectl pods list', 'kubectl status pods', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `education_level` varchar(50) NOT NULL,
  `desired_job_role` varchar(100) NOT NULL,
  `interests` text DEFAULT NULL,
  `current_skills` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`id`, `username`, `email`, `password`, `full_name`, `age`, `education_level`, `desired_job_role`, `interests`, `current_skills`) VALUES
(1, 'username', 'user@gmail.com', '$2y$10$Wrn9wzW/k7EZIyoPzJIleuADffDcYjn0F74OZRO.LyKCDQ3H1qlbm', 'user', 34, 'Postgraduate', 'Backend Developer', 'java', 'java'),
(2, 'username', 'user@gmail.com', '$2y$10$NbyxAOKZ2.0cLmEWKXYwEucfsPMd1Dh8s4RSJT7f7NU.PSK/JcjmO', 'user', 34, 'Postgraduate', 'Backend Developer', 'java', 'java'),
(3, 'username', '123@gmail.com', '$2y$10$YcK50vh.ND4AHFM1QEO.EOtjNd0MVwQxOUmqYoQ3/qhI4m///eyVa', 'edward', 34, 'Graduate', 'Backend Developer', 'java', 'java'),
(4, 'EDWARD', 'edwa@gmail.com', '$2y$10$j/MkIADsTxEnz/5KEvEOJu.XGGZS7TFFWrA9SC3XKz99myniazrsK', 'EDWARD C', 20, 'Postgraduate', 'Software Developer', 'JAVA', 'JAVA'),
(5, '123', '12@gmail.com', '$2y$10$2pxyuhPOcW3/.DT3k/j.jeUxhzVKjBwXHQjte9DS3Svxr6YqRxz.i', '1234', 23, 'Postgraduate', 'Web Developer', '123', '123'),
(6, 'HARIHARAN', '12@gmail.com', '$2y$10$dGWf13Wlje/cIKGKIPcte.Yzeb3oOPNpt.Ibnpr26uFKa9ggP5svS', 'HARIHARAN', 45, '10th', 'UI/UX Designer', 'JAVA', 'HELLO'),
(7, 'SAKTHIVEL', 'sakthi@gmail.com', '$2y$10$cHDxqiiu3OIa6fgvWSsBDOmsw.yeawrptlm0wgmBE/V8cCPBmq4rO', 'SAKTHIVEL N', 20, 'Postgraduate', 'Backend Developer', 'java', 'learning new things'),
(8, 'VARUN', 'varun@gmail.com', '$2y$10$SfPY9sNHuIFY6HWEwygdSOIvae9Yt.vD1m1sQ4lwBJ1O9VzG1opZi', 'varun vijay', 23, 'Postgraduate', 'Full Stack Developer', 'java', 'java,html');

-- --------------------------------------------------------

--
-- Table structure for table `user_progress`
--

CREATE TABLE `user_progress` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_role` varchar(100) NOT NULL,
  `skill` varchar(100) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_progress`
--

INSERT INTO `user_progress` (`id`, `user_id`, `job_role`, `skill`, `completed`) VALUES
(1, 5, 'Web Developer', 'HTML', 1),
(3, 5, 'Web Developer', 'CSS', 1),
(4, 5, 'Data Analyst', 'Python', 1),
(5, 5, 'Data Analyst', 'R', 1),
(8, 5, 'Machine Learning Developer', 'Python', 1),
(12, 7, 'Web Developer', 'HTML', 1),
(13, 7, 'Web Developer', 'CSS', 1),
(14, 8, 'Front-End Developer', 'HTML', 1),
(15, 8, 'Front-End Developer', 'CSS', 1),
(16, 8, 'Front-End Developer', 'JavaScript', 1),
(17, 8, 'Web Developer', 'HTML', 1),
(18, 8, 'Web Developer', 'CSS', 1),
(19, 8, 'Web Developer', 'JavaScript', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_quiz_results`
--

CREATE TABLE `user_quiz_results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_role` varchar(255) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `quiz_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_quiz_results`
--

INSERT INTO `user_quiz_results` (`id`, `user_id`, `job_role`, `skill`, `score`, `total_questions`, `quiz_date`) VALUES
(1, 1, '', '', 1, 0, '2024-11-18 08:16:58'),
(2, 1, 'Frontend Developer', 'HTML', 0, 0, '2024-11-18 08:22:18'),
(3, 1, 'Backend Developer', 'PHP', 5, 0, '2024-11-18 08:22:53'),
(4, 1, 'Full Stack Developer', 'React', 0, 0, '2024-11-18 08:27:54'),
(5, 7, 'Backend Developer', 'PHP', 8, 10, '2024-11-18 10:09:21'),
(6, 8, 'Full Stack Developer', 'React', 6, 10, '2024-11-18 10:42:51'),
(7, 8, 'Frontend Developer', 'JavaScript', 3, 10, '2024-11-18 11:36:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback1`
--
ALTER TABLE `feedback1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_progress` (`user_id`,`job_role`,`skill`);

--
-- Indexes for table `user_quiz_results`
--
ALTER TABLE `user_quiz_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback1`
--
ALTER TABLE `feedback1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_progress`
--
ALTER TABLE `user_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_quiz_results`
--
ALTER TABLE `user_quiz_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD CONSTRAINT `user_progress_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users1` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_quiz_results`
--
ALTER TABLE `user_quiz_results`
  ADD CONSTRAINT `user_quiz_results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users1` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
