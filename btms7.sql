SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*CREATE TABLE*/


CREATE TABLE users (
    user_ID bigint(15) NOT NULL AUTO_INCREMENT,
    first_name varchar(50) NOT NULL,
    middle_name varchar(50) NOT NULL,
    last_name varchar(50) NOT NULL,
    username varchar(30) NOT NULL UNIQUE,
    password varchar(15) NOT NULL,
    position varchar(20) NOT NULL,
    primary key (user_ID))ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
 
/*residents*/
CREATE TABLE residents (
    residentID bigint(15) NOT NULL AUTO_INCREMENT,
    user_ID bigint(15) NOT NULL,
    residentLname varchar(30) NOT NULL,
    residentFName varchar(30) NOT NULL,
    residentMname varchar(30) NOT NULL,
    residentNname varchar(30) NOT NULL,
    residentBdate Date NOT NULL,
    residentPlaceBirth varchar(40) NOT NULL,
    residentAge int NOT NULL,
    residentCivilStatus varchar(15) NOT NULL,
    residentGender varchar(15) NOT NULL,
    residentZoneNumber int(2) NOT NULL,
    residentContactNumber bigint (11) NOT NULL,
    residentOccupation varchar(15) NOT NULL,
    residentCitizenship varchar(20) NOT NULL,
    primary key (residentID),
    foreign key (user_ID) references users(user_ID))ENGINE=InnoDB DEFAULT CHARSET=latin1;
  

/*blotter*/
CREATE TABLE blotters (
    blotterID bigint(50) primary key NOT NULL AUTO_INCREMENT,
    user_ID bigint(15) NOT NULL,
    date_recorded date NOT NULL,
    complainant varchar(50) NOT NULL,
    c_address varchar(100) NOT NULL,
    c_contact varchar(11) NOT NULL,
    person_to_complain varchar(50) NOT NULL,
    p_address varchar(100) NOT NULL,
    p_contact int(11) NOT NULL,
    complaint varchar(100) NOT NULL,
    action_taken varchar(50) NOT NULL,
    complaint_status varchar(50) NOT NULL,
    location_of_incidence varchar(50) NOT NULL,
    foreign key (user_ID) references users(user_ID))ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  
 /*services*/
CREATE TABLE services (
    servicesID bigint(8) NOT NULL AUTO_INCREMENT,
    services varchar(30) NOT NULL,
    price varchar(4) NOT NULL,
    primary key (servicesID))ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
/*transaction*/
CREATE TABLE transactions (
    transactionID bigint(30) NOT NULL AUTO_INCREMENT,
    user_ID bigint(15) NOT NULL,
    residentID bigint(50) NOT NULL,
    servicesID bigint(8) NOT NULL,
    business_name varchar(50) NULL,
    business_address varchar(100) NULL,
    type_of_business varchar(50) NULL,
    pickupdate date NOT NULL,
    purpose varchar(30) NOT NULL,
    dateRecorded date NOT NULL,
    status varchar(20) NOT NULL,
    primary key (transactionID),
    foreign key (residentID) references residents(residentID),
    foreign key (servicesID) references services(servicesID),
    foreign key (user_ID) references users(user_ID))ENGINE=InnoDB DEFAULT CHARSET=latin1;
     
/*payment*/
CREATE TABLE payment (
    paymentID bigint(8) NOT NULL AUTO_INCREMENT,
    amount bigint NOT NULL,
    datePayment date NOT NULL,
    transactionID bigint(8) NOT NULL ,
    primary key (paymentID),
    foreign key (transactionID) references transactions(transactionID))ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
COMMIT;