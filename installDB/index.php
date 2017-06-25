

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "schoolb";

/////////////////////////////////////////////////////////////////////////////////////////

$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/////////////////////////////////////////////////////////////////////////////////////////

$sql = "CREATE DATABASE schoolb";

mysqli_query($conn, $sql);

// if (mysqli_query($conn, $sql)) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . mysqli_error($conn);
// }

/////////////////////////////////////////////////////////////////////////////////////////

$table1 = "CREATE TABLE `admins` (
  `id` varchar(9) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(10) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  `img` varchar(255) NOT NULL,
  `permission` smallint(6) NOT NULL
)";

$table2 ="CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `length` int(10) UNSIGNED DEFAULT NULL,
  `img` text NOT NULL,
  `description` text NOT NULL
)"; 

$table3 = "CREATE TABLE `permissions` (
  `name_permission` varchar(20) NOT NULL,
  `permission_id` varchar(2) NOT NULL
)";

$table4 ="CREATE TABLE `students` (
  `id` char(9) NOT NULL,
  `name` char(20) NOT NULL,
  `phone` char(11) NOT NULL,
  `age` varchar(10) NOT NULL,
  `course_id` int(11) NOT NULL,
  `img` char(30) NOT NULL
)";

/////////////////////////////////////////////////////////////////////////////////////////

$data1 =  "INSERT INTO `admins` (`id`, `password`, `name`, `last_name`, `email`, `phone`, `birthday`, `img`, `permission`) VALUES
('26549477', '$2y$10$bTj124f6fgV908RN.SjgBe.WZuEYb9.0.ji7pd6F1zSZjtCH4krrO', 'moran', 'sabah', 'moransabah@gmail.com', 0545492991, '11/5/86', '026549477.png', 1),
('344944955', '$2y$10$9.rRTgFl1ZpyfOkTEtb6ROtlepaPhQoRtZbUPirmnzDmqRjyqze1K', 'yaniv', 'bar', 'yaniv@gmail.com', 0526560153, '1/1/1995', '344944955.png', 3),
('38124954', '$2y$10$nMbK5nHFG9BR2bqv7TLXTuWk9wgAcHUNpqS73r6dAa98wlI1gwkE6', 'eliran', 'sabah', 'eliransabah@gmail.com', 0544225582, '12/11/1985', '38124954.png', 2)";

$data2 = "INSERT INTO `courses` (`id`, `name`, `length`, `img`, `description`) VALUES
(3116, 'Technical HelpDesk Support Expert', 20, '3116.png', 'Technical support in an organizational environment, support personnel should be able to solve problems on the ground independently and provide solutions to many companies, from small to large, based on PC workstations and Microsoft operating systems.'),
(4735, 'full stack developer', 475, '4735.png', 'full-stack developers Is built according to the needs of the market and enables its graduates to serve as full-stack developers in the vast and growing range of companies that need efficient and professional web development.'),
(6543, 'my sql', 50, '6543.png', 'Relational databases are now the accepted way to store a lot of information. SQL language is the conventional way to access relational databases.\r\n\r\nWith the development of the Internet, dynamic Web sites and content management systems use databases to store the content of the site itself, and generate the pages by retrieving content from the database.'),
(6553, 'S E O', 99, '6553.png', 'Internet marketing, in general and website promotion, in particular, are among the most sought after and dynamic areas today. The course provides the tools needed to develop a career in Search Engine Optimization (SEO) with an emphasis on building a business.'),
(9117, 'Test Automation Engineer for CI & DevOps', 27, '9117.png', 'DevOps projects focus on process automation between development and operation and provide solutions, tools and methods for automated testing as part of the overall package.\r\n\r\nThis route will help traditional QA professionals make the transition to automated environments. The route focuses on performing automated testing in Java environments for the benefit of web and mobile applications (Android).\r\n.')
";

$data3 = "INSERT INTO `permissions` (`name_permission`, `permission_id`) VALUES
('owner', '1'),
('manager', '2'),
('seles', '3')";

$data4 = "INSERT INTO `students` (`id`, `name`, `phone`, `age`, `course_id`, `img`) VALUES
('102030405', 'israel', '0589987454', '2017-05-20', 6543, '102030405.png'),
('212646478', 'dana', '0589987454', '2017-05-20', 3116, '212646478.png'),
('245245245', 'viki', '0534567890', '2017-05-16', 6553, '245245245.png'),
('294294294', 'koby', '0534567890', '2017-05-16', 6553, '294294294.png'),
('345349349', 'mor', '0545492991', '1987-01-01', 9117, '345349349.png'),
('355355355', 'ofir', '0522225522', '1980-01-01', 4735, '355355355.png'),
('357654159', 'shani', '0534567890', '2017-05-16', 6553, '357654159.png'),
('449988771', 'moshe', '0589987454', '2017-05-20', 3116, '449988771.png'),
('556644884', 'or', '0589987454', '2017-05-20', 3116, '556644884.png'),
('649216787', 'eli', '0544225582', '1985-11-12', 4735, '649216787.png')";

/////////////////////////////////////////////////////////////////////////////////////////

$alter1 = "ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`)";

$alter2 = "ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_idx` (`name`)";

$alter3 = "ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `phone` (`phone`)";

$alter4 = "ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9118";

$alter5 = "ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permission_id`),
  ADD UNIQUE KEY `permission_idx` (`name_permission`)";

/////////////////////////////////////////////////////////////////////////////////////////

$conn = new mysqli($servername, $username, $password, $dbname);


$conn->query($table1);
$conn->query($table2);
$conn->query($table3);
$conn->query($table4);
$conn->query($data1);
$conn->query($data2);
$conn->query($data3);
$conn->query($data4);
$conn->query($alter1);
$conn->query($alter2);
$conn->query($alter3);
$conn->query($alter4);
$conn->query($alter5);

mysqli_close($conn);

/////////////////////////////////////////////////////////////////////////////////////////

echo "The database and all tables and settings were created.";
header("Location: ../view/login.php");
die();
echo " <a href='http://localhost/school_32'>Click here to move to a Project</a>"; 
?>

