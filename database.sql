CREATE TABLE useraccount (
    ID int(4) AUTO_INCREMENT PRIMARY KEY not null,
    fullname varchar(50) not null,
    address varchar(50) not null,
    contactnumber varchar(50) not null,
    email varchar(50) not null,
    password varchar(50) not null,
);
INSERT INTO useraccount (fullname, address, contactnumber, email, password)
	VALUES ('$fullname', '$address', '$contactnumber', '$email', '$password');
    