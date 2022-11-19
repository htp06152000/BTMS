SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*CREATE TABLE*/
CREATE TABLE users (
    user_id bigint(20) PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(1000) NOT NULL,
    role VARCHAR(15) NOT NULL DEFAULT 'USER',
    first_name VARCHAR(255) NOT NULL,
    middle_name VARCHAR(255) NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    address VARCHAR(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`username`, `password`, `role`, `first_name`, `last_name`, `email`, `address`)
VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMINISTRATOR', 'System', 'Administrator', 'email@domai.com', 'Capital City, Iloilo, Philippines 5000');



/*residents*/
CREATE TABLE resident (
    residentID int(15) NOT NULL AUTO_INCREMENT,
    user_id bigint(15) NOT NULL,
    residentFName varchar(30) NOT NULL,
    residentMName varchar(30) NOT NULL,
    residentLName varchar(30) NOT NULL,
    residentBdate date NOT NULL,
    residentAge int NOT NULL,
    residentCivilStatus varchar(15) NOT NULL,
    residentGender varchar(15) NOT NULL,
    residentZoneNumber int(2) NOT NULL,
    residentContactNumber bigint (11) NOT NULL,
    residentOccupation varchar(15) NOT NULL,
    primary key (residentID),
    foreign key (user_id) references users(user_id))ENGINE=InnoDB DEFAULT CHARSET=latin1;


/*blotter*/
CREATE TABLE blotter (
    blotterID int(50) primary key NOT NULL AUTO_INCREMENT,
    user_id bigint(15) NOT NULL,
    residentID int(50) NOT NULL,
    date_recorded date NOT NULL,
    complainant varchar(50) NOT NULL,
    c_address varchar(100) NOT NULL,
    c_contact varchar(11) NOT NULL,
    person_to_complain varchar(50) NOT NULL,
    p_address varchar(100) NOT NULL,
    p_contact int(11) NOT NULL,
    complaint varchar(100) NOT NULL,
    action_taken varchar(50) NOT NULL,
    complaint_status varchar(50) NOT NULL DEFAULT 'Pending',
    location_of_incidence varchar(50) NOT NULL,
    foreign key (residentID) references resident(residentID),
    foreign key (user_id) references users(user_id))ENGINE=InnoDB DEFAULT CHARSET=latin1;
    
    
    /*services*/
CREATE TABLE services (
    servicesID int(8) NOT NULL AUTO_INCREMENT,
    services varchar(30) NOT NULL,
    price varchar(4) NOT NULL,
    primary key (servicesID))ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*transaction*/
CREATE TABLE transaction (
    transactionID int(30) NOT NULL AUTO_INCREMENT,
    user_id bigint(15) NOT NULL,
    residentID int(50) NOT NULL,
    servicesID int(8) NOT NULL,
    business_name varchar(50) NULL,
    business_address varchar(100) NULL,
    type_of_business varchar(50) NULL,
    ornumber int(30) NOT NULL,
    pickupdate date NOT NULL,
    purpose varchar(30) NOT NULL,
    dateRecorded date NOT NULL,
    status varchar(20) NOT NULL,
    primary key (transactionID),
    foreign key (residentID) references resident(residentID),
    foreign key (servicesID) references services(servicesID),
    foreign key (user_id) references users(user_id))ENGINE=InnoDB DEFAULT CHARSET=latin1;
    
/*payment*/
CREATE TABLE payment (
    paymentID int(8) NOT NULL AUTO_INCREMENT,
    amount int NOT NULL,
    datePayment date NOT NULL,
    transactionID int(8) NOT NULL ,
    primary key (paymentID),
    foreign key (transactionID) references transaction(transactionID))ENGINE=InnoDB DEFAULT CHARSET=latin1;
    
COMMIT;