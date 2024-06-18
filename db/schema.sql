CREATE DATABASE IF NOT EXISTS habits;

USE habits;

-- Create habits table
CREATE TABLE habits (
    habit_id INT AUTO_INCREMENT PRIMARY KEY,
    habit_name VARCHAR(100) NOT NULL,
    description TEXT
);

-- Create habit_logs table
CREATE TABLE habit_logs (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    habit_id INT NOT NULL,
    log_date DATE NOT NULL,
    completed BOOLEAN NOT NULL,
    FOREIGN KEY (habit_id) REFERENCES habits(habit_id)
);

